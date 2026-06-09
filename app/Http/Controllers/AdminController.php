<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        $query = Transaction::query();

        // SQLite Filter Logic (LIKE စနစ်)
        if ($request->filled('year') && $request->filled('month')) {
            $month = sprintf('%02d', $request->month);
            $query->where('transaction_date', 'like', "{$request->year}-{$month}-%");
        } elseif ($request->filled('year')) {
            $query->where('transaction_date', 'like', "{$request->year}-%");
        } elseif ($request->filled('month')) {
            $month = sprintf('%02d', $request->month);
            $query->where('transaction_date', 'like', "%-{$month}-%");
        }

        // ကိန်းဂဏန်း တွက်ချက်မှုများ
        $totalIncome = (clone $query)->where('type', 'income')->sum('amount');
        $totalExpense = (clone $query)->where('type', 'expense')->sum('amount');
        $netProfit = $totalIncome - $totalExpense;
        
        // Blade ဇယားများနှင့် Form များအတွက် လိုအပ်သော Variables များ

        $categories = Category::withCount('products')->get(); 
        $productsForSale = Product::all(); 
        $products = Product::latest()->paginate(10); 
        $transactions = $query->latest()->paginate(10); 

        return view('admin.dashboard', compact(
            'totalIncome', 
            'totalExpense', 
            'netProfit', 
            'categories', 
            'productsForSale',
            'products',
            'transactions'
        ));
    }

    public function users()
    {
        $users = User::paginate(10); // User အားလုံးကို ဆွဲထုတ်မယ်
        return view('admin.users', compact('users')); // 'users' variable ကိုပို့မယ်
    }
}