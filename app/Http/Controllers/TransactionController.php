<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class TransactionController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $request->merge([
            'product_id' => $request->filled('product_id') ? $request->product_id : null,
            'quantity' => $request->filled('product_id') ? $request->quantity : null,
        ]);

        $validated = $request->validate($this->transactionRules($request));

        if ($validated['type'] !== 'income') {
            $validated['product_id'] = null;
            $validated['quantity'] = null;
        }

        if ($validated['type'] === 'income' && ! empty($validated['product_id'])) {
            $product = Product::findOrFail($validated['product_id']);
            $quantity = (int) $validated['quantity'];

            if ($product->stock < $quantity) {
                throw ValidationException::withMessages([
                    'quantity' => 'Insufficient stock for this product!',
                ]);
            }

            DB::transaction(function () use ($validated, $product, $quantity) {
                Transaction::create($validated);
                $product->decrement('stock', $quantity);
            });

            return redirect()->back()->with('success', 'Transaction recorded and product stock updated.');
        }

        Transaction::create($validated);

        return redirect()->back()->with('success', 'Transaction recorded successfully.');
    }

    public function edit(Transaction $transaction): RedirectResponse
    {
        return redirect()->route('admin.dashboard', [
            'edit_transaction' => $transaction->id,
            'transactions_page' => request('transactions_page'),
        ]);
    }

    public function update(Request $request, Transaction $transaction): RedirectResponse
    {
        $validated = $request->validate($this->transactionRules($request));

        if ($validated['type'] !== 'income') {
            $validated['product_id'] = null;
            $validated['quantity'] = null;
        }

        $transaction->update($validated);

        return redirect()->back()->with('success', 'Transaction updated successfully!');
    }

    public function destroy(Transaction $transaction): RedirectResponse
    {
        DB::transaction(function () use ($transaction) {
            if ($transaction->product_id && $transaction->quantity) {
                Product::where('id', $transaction->product_id)->increment('stock', $transaction->quantity);
            }

            $transaction->delete();
        });

        return redirect()->back()->with('success', 'Transaction deleted successfully. Stock restored if applicable.');
    }

    /**
     * @return array<string, mixed>
     */
    private function transactionRules(Request $request): array
    {
        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'type' => ['required', Rule::in(['income', 'expense'])],
            'amount' => ['required', 'numeric', 'min:0.01', 'max:99999999.99'],
            'notes' => ['nullable', 'string', 'max:1000'],
            'transaction_date' => ['required', 'date', 'before_or_equal:today'],
        ];

        if ($request->input('type') === 'income') {
            $rules['product_id'] = ['nullable', 'integer', Rule::exists('products', 'id')];
            $rules['quantity'] = ['nullable', 'integer', 'min:1', 'required_with:product_id'];
        }

        return $rules;
    }
}
