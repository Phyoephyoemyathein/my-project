<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\AdminController;

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// [အသစ်ထည့်သွင်းမှု] Contact Us စာမျက်နှာအတွက် လမ်းကြောင်း (လူတိုင်း ဝင်ကြည့်လို့ရအောင် အပြင်မှာ ထားပါတယ်)
Route::get('/contact', function () {
    return view('contact');
});

// Guest တွေအတွက် သီးသန့် (Login မဝင်ရသေးသူများသာ)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
});

// Login ဝင်ထားသူ အားလုံးအတွက် (User ရော Admin ရော)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::post('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::put('/profile/password', [PasswordController::class, 'update'])->name('password.update');
    
});

// Password Reset Routes
// Route::get('/forgot-password', function () {
//     return view('forgot-password'); // သင်ဖန်တီးထားသော view ဖိုင်လမ်းကြောင်း
// })->name('password.request');

// // Password Reset Email Send Route
// Route::post('/forgot-password', function (Request $request) {
//     // ဒီနေရာမှာ သင့်ရဲ့ Logic ကို ရေးပါ (သို့မဟုတ် Laravel Breeze သုံးထားရင် အဲဒီ Controller ကို ခေါ်ပါ)
// })->name('password.email');

// Forgot Password စာမျက်နှာပြရန်
// ၁။ စာမျက်နှာကိုဖွင့်ရန် (GET Method)
Route::get('/forgot-password', [PasswordResetController::class, 'create'])
    ->name('password.request');

// ၂။ Password ပြင်ရန် Form တင်ရန် (POST Method)
Route::post('/forgot-password', [PasswordResetController::class, 'updateDirectly'])
    ->name('password.update.directly');


   // Admin သီးသန့် အပိုင်း
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    
    // [အရေးကြီး ပြင်ဆင်မှု] Register ခလုတ်ကို Admin ဝင်ထားမှသာ အကောင့်ဖွင့်ပေးနိုင်ရန် Guest ထဲကနေ Admin Group ထဲကို ရွှေ့လိုက်ပါတယ်
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');

    // Categories
    Route::post('/admin/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::delete('/admin/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    // Products
    Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::put('/admin/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');

    // Transactions
    Route::post('/admin/transactions', [TransactionController::class, 'store'])->name('admin.transactions.store');
    Route::get('/admin/transactions/{transaction}/edit', [TransactionController::class, 'edit'])->name('admin.transactions.edit');
    Route::put('/admin/transactions/{transaction}', [TransactionController::class, 'update'])->name('admin.transactions.update');
    Route::delete('/admin/transactions/{transaction}', [TransactionController::class, 'destroy'])->name('admin.transactions.destroy');

   
});