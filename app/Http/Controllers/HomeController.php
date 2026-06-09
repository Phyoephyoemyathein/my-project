<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::orderBy('name')->get();
        $activeCategory = $request->query('category');

        $productsQuery = Product::with('category')->latest();

        // ဒီနေရာမှာ $activeCategory က ID ဂဏန်းဖြစ်ဖြစ်၊ Slug ဖြစ်ဖြစ် နှစ်မျိုးလုံး အလုပ်လုပ်အောင် ဉာဏ်ဆင်ထားပါတယ်ဗျာ
        if ($activeCategory) {
            $productsQuery->where(function($q) use ($activeCategory) {
                $q->where('category_id', $activeCategory)
                  ->orWhereHas('category', function($subQ) use ($activeCategory) {
                      $subQ->where('slug', $activeCategory);
                  });
            });
        }

        return view('welcome', [
            'categories' => $categories,
            'products' => $productsQuery->get(), // အမြဲတမ်း စတော့အလတ်ဆတ်ဆုံး ဒေတာကို အောက်ကနေ ဆွဲထုတ်ပေးပါတယ်
            'activeCategory' => $activeCategory,
        ]);
    }
    }

