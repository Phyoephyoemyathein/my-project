<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computer Shop Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        nav[role="navigation"] span, nav[role="navigation"] a {
            color: rgb(203 213 225);
        }
        nav[role="navigation"] a:hover {
            color: white;
        }
        nav[role="navigation"] span[aria-current="page"] span {
            background-color: rgb(79 70 229);
            color: white;
            border-color: rgb(99 102 241);
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-900 via-indigo-950 to-slate-900 text-white">
    
<header class="border-b border-white/10 bg-[#0f172a] shadow-md sticky top-0 z-10">
    <div class="flex items-center justify-between h-20 px-6">
    <a href="{{ url('/') }}" class="group flex items-center gap-3 transition-transform duration-200 active:scale-95"> 
        <div class="flex items-center gap-4">
            <div class="relative w-12 h-12 flex items-center justify-center rounded-full bg-[#1e2533] border border-slate-700/40">
                <div class="absolute inset-0 rounded-full border-2 border-t-amber-400 border-l-amber-400 border-r-transparent border-b-transparent drop-shadow-[0_0_8px_rgba(245,158,11,0.75)] rotate-45"></div>
                <span class="text-amber-400 font-black text-lg relative z-10">TH</span>
            </div>
            
            <div class="flex flex-col">
                <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-slate-400">THAN HTWE</p>
                <h1 class="text-base font-bold text-white leading-tight">Laptop Service Technician & Trainer</h1>
            </div>
        </div>
    </a>
        <div class="flex items-center gap-3">
            <span class="hidden lg:inline rounded-full bg-amber-400/20 border border-amber-400/40 px-3 py-1 text-xs font-semibold text-amber-200">ONLY FOR ADMINS</span>
            
            <a href="{{ route('dashboard') }}" class="hidden sm:inline text-sm text-indigo-200 hover:text-white transition">User Dashboard</a>
            
            <div class="relative group">
    <button class="flex items-center gap-2 px-4 py-2 text-sm font-semibold text-slate-300 hover:text-white transition-all">
        <i class="fa-solid fa-users"></i>
        <span>User Management</span>
        <i class="fa-solid fa-chevron-down text-[10px]"></i>
    </button>

    <div class="absolute left-0 mt-2 w-48 rounded-xl bg-[#1a1836] border border-slate-700 shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
        
        <a href="{{ route('register') }}" class="flex items-center gap-3 px-4 py-3 text-sm text-slate-300 hover:bg-[#25234c] hover:text-indigo-400 transition-colors border-b border-slate-700/50">
            <i class="fa-solid fa-user-plus text-xs"></i>
            Register User
        </a>
        
        <a href="{{ route('admin.users') }}" class="flex items-center gap-3 px-4 py-3 text-sm text-slate-300 hover:bg-[#25234c] hover:text-indigo-400 transition-colors">
            <i class="fa-solid fa-list-ul text-xs"></i>
            Registered List
        </a>
    </div>
</div>

            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 rounded-lg bg-gradient-to-r from-emerald-500 to-teal-500 px-4 py-2 text-sm font-semibold text-white shadow-lg hover:from-emerald-400 hover:to-teal-400 transition">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                View Shop
            </a>

            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md text-sm transition">Logout</button>
            </form>
        </div>
    </div>
</header>

    <main class="max-w-7xl mx-auto px-4 py-8 space-y-8">
        @if(session('success'))
            <div id="success-alert" class="flex items-start justify-between gap-4 rounded-lg bg-emerald-600/90 border border-emerald-400/50 p-4 text-white shadow-lg shadow-emerald-900/20" role="alert">
                <div class="flex items-start gap-3">
                    <svg class="h-5 w-5 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p class="text-sm font-medium">{{ session('success') }}</p>
                </div>
                <button type="button" onclick="document.getElementById('success-alert').remove()" class="rounded-md p-1 hover:bg-emerald-500/50 transition" aria-label="Dismiss">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        @endif

        @if($errors->any())
            <div class="rounded-lg bg-red-500/20 border border-red-400/40 p-4 text-red-100 text-sm">
                <p class="font-semibold mb-2">Please fix the following errors:</p>
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


<!-- Monthly,Yearly Money-->
<form action="{{ url('/admin/dashboard') }}" method="GET" class="flex flex-wrap items-end gap-4 mb-8 bg-[#1a1836] p-6 rounded-2xl border border-slate-800 shadow-xl">
    
    <div class="flex-1 min-w-[150px]">
        <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-2">Month</label>
        <select name="month" class="w-full bg-[#25234c] text-white text-sm rounded-xl px-4 py-3 border border-slate-700 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 outline-none transition-all">
            <option value="">All Months</option>
            @foreach(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $index => $monthName)
                <option value="{{ $index + 1 }}" {{ request('month') == ($index + 1) ? 'selected' : '' }}>
                    {{ $monthName }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="flex-1 min-w-[150px]">
        <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-2">Year</label>
        <select name="year" class="w-full bg-[#25234c] text-white text-sm rounded-xl px-4 py-3 border border-slate-700 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 outline-none transition-all">
            <option value="">All Years</option>
            @for ($y = date('Y'); $y >= 2020; $y--)
                <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>{{ $y }}</option>
            @endfor
        </select>
    </div>

    <div class="flex items-center gap-3">
        <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 text-white text-sm font-bold px-6 py-3 rounded-xl transition-all shadow-lg shadow-indigo-900/20 active:scale-95">
            <i class="fa-solid fa-magnifying-glass mr-2"></i> Filter
        </button>
        
        @if(request('month') || request('year'))
            <a href="{{ url('/admin/dashboard') }}" class="text-xs text-slate-500 hover:text-red-400 transition-colors underline decoration-slate-600 underline-offset-4">
                Clear
            </a>
        @endif
    </div>
</form>

 <!-- Income and Expense -->
        <section>
            <h2 class="text-sm font-semibold uppercase tracking-wider text-indigo-300 mb-4">Financial Overview</h2>
            <div class="grid gap-4 sm:grid-cols-3">
                <div class="rounded-xl bg-emerald-500/15 border border-emerald-400/30 p-6">
                    <p class="text-emerald-200 text-sm">Total Income</p>
                    <p class="mt-2 text-3xl font-bold text-emerald-100">${{ number_format($totalIncome, 2) }}</p>
                </div>
                <div class="rounded-xl bg-rose-500/15 border border-rose-400/30 p-6">
                    <p class="text-rose-200 text-sm">Total Expense</p>
                    <p class="mt-2 text-3xl font-bold text-rose-100">${{ number_format($totalExpense, 2) }}</p>
                </div>
                <div class="rounded-xl bg-indigo-500/20 border border-indigo-400/40 p-6">
                    <p class="text-indigo-200 text-sm">Net Profit</p>
                    <p class="mt-2 text-3xl font-bold {{ $netProfit >= 0 ? 'text-indigo-100' : 'text-rose-200' }}">
                        ${{ number_format($netProfit, 2) }}
                    </p>
                </div>
            </div>
        </section>

<!-- Category Section -->
        <section class="grid gap-6 lg:grid-cols-3">
            <div class="rounded-xl bg-white/5 border border-white/10 p-6">
                <h3 class="text-lg font-semibold text-white mb-4">Add Category</h3>
                <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-3">
                    @csrf
                    <div>
                        <label for="category_name" class="block text-sm text-slate-300 mb-1">Category Name</label>
                        <input id="category_name" name="name" type="text" value="{{ old('name') }}" required
                            placeholder="e.g. Laptops"
                            class="w-full rounded-md bg-slate-800/80 border {{ $errors->has('name') ? 'border-red-400' : 'border-white/10' }} px-3 py-2 text-white placeholder-slate-500 focus:border-indigo-400 focus:ring-indigo-400">
                        @error('name')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
                    </div>
                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-md text-sm font-medium transition">
                        Add Category
                    </button>
                </form>

                @if($categories->isNotEmpty())
                    <div class="mt-4 pt-4 border-t border-white/10">
                        <p class="text-xs text-slate-400 mb-2">Existing Categories</p>
                        <ul class="space-y-2 max-h-40 overflow-y-auto">
                            @foreach($categories as $category)
                                <li class="flex items-center justify-between text-sm bg-slate-800/50 rounded px-3 py-2">
                                    <span>{{ $category->name }} <span class="text-slate-500">({{ $category->products_count }})</span></span>
                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Delete this category and all its products?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-rose-400 hover:text-rose-300 text-xs">Delete</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

<!-- Add Product -->
            <div class="rounded-xl bg-white/5 border border-white/10 p-6 lg:col-span-2">
                <h3 class="text-lg font-semibold text-white mb-4">Add Product</h3>
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="grid gap-3 sm:grid-cols-2">
                    @csrf
                    <div class="sm:col-span-2">
                        <label for="category_id" class="block text-sm text-slate-300 mb-1">Category</label>
                        <select id="category_id" name="category_id" required
                            class="w-full rounded-md bg-slate-800/80 border {{ $errors->has('category_id') ? 'border-red-400' : 'border-white/10' }} px-3 py-2 text-white focus:border-indigo-400 focus:ring-indigo-400">
                            <option value="">Select category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="product_name" class="block text-sm text-slate-300 mb-1">Product Name</label>
                        <input id="product_name" name="name" type="text" value="{{ old('name') }}" required
                            class="w-full rounded-md bg-slate-800/80 border {{ $errors->has('name') ? 'border-red-400' : 'border-white/10' }} px-3 py-2 text-white focus:border-indigo-400 focus:ring-indigo-400">
                        @error('name')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="price" class="block text-sm text-slate-300 mb-1">Price ($)</label>
                        <input id="price" name="price" type="number" step="0.01" min="0" value="{{ old('price') }}" required
                            class="w-full rounded-md bg-slate-800/80 border {{ $errors->has('price') ? 'border-red-400' : 'border-white/10' }} px-3 py-2 text-white focus:border-indigo-400 focus:ring-indigo-400">
                        @error('price')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="stock" class="block text-sm text-slate-300 mb-1">Stock</label>
                        <input id="stock" name="stock" type="number" min="0" value="{{ old('stock', 0) }}" required
                            class="w-full rounded-md bg-slate-800/80 border {{ $errors->has('stock') ? 'border-red-400' : 'border-white/10' }} px-3 py-2 text-white focus:border-indigo-400 focus:ring-indigo-400">
                        @error('stock')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="image" class="block text-sm text-slate-300 mb-1">Product Image</label>
                        <input id="image" name="image" type="file" accept=".jpg,.jpeg,.png"
                            class="block w-full text-sm text-slate-300 file:mr-3 file:rounded file:border-0 file:bg-indigo-600 file:px-3 file:py-1.5 file:text-white file:text-xs">
                        @error('image')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="description" class="block text-sm text-slate-300 mb-1">Description / Specs</label>
                        <textarea id="description" name="description" rows="2" required
                            class="w-full rounded-md bg-slate-800/80 border {{ $errors->has('description') ? 'border-red-400' : 'border-white/10' }} px-3 py-2 text-white focus:border-indigo-400 focus:ring-indigo-400">{{ old('description') }}</textarea>
                        @error('description')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
                    </div>
                    <div class="sm:col-span-2">
                        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-md text-sm font-medium transition">
                            Add Product
                        </button>
                    </div>
                </form>
            </div>
        </section>

<!-- Record Income / Expense -->
        <section class="rounded-xl bg-white/5 border border-white/10 p-6">
            <h3 class="text-lg font-semibold text-white mb-4">Record Income / Expense</h3>
            <form action="{{ route('admin.transactions.store') }}" method="POST" class="grid gap-3 sm:grid-cols-2 lg:grid-cols-5">
                @csrf
                <div>
                    <label for="title" class="block text-sm text-slate-300 mb-1">Title</label>
                    <input id="title" name="title" type="text" value="{{ old('title') }}" required
                        placeholder="e.g. Laptop sale"
                        class="w-full rounded-md bg-slate-800/80 border {{ $errors->has('title') ? 'border-red-400' : 'border-white/10' }} px-3 py-2 text-white focus:border-indigo-400 focus:ring-indigo-400">
                    @error('title')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="type" class="block text-sm text-slate-300 mb-1">Type</label>
                    <select id="type" name="type" required
                        class="w-full rounded-md bg-slate-800/80 border {{ $errors->has('type') ? 'border-red-400' : 'border-white/10' }} px-3 py-2 text-white focus:border-indigo-400 focus:ring-indigo-400">
                        <option value="income" @selected(old('type') === 'income')>Income</option>
                        <option value="expense" @selected(old('type') === 'expense')>Expense</option>
                    </select>
                    @error('type')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="amount" class="block text-sm text-slate-300 mb-1">Amount ($)</label>
                    <input id="amount" name="amount" type="number" step="0.01" min="0.01" value="{{ old('amount') }}" required
                        class="w-full rounded-md bg-slate-800/80 border {{ $errors->has('amount') ? 'border-red-400' : 'border-white/10' }} px-3 py-2 text-white focus:border-indigo-400 focus:ring-indigo-400">
                    @error('amount')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="transaction_date" class="block text-sm text-slate-300 mb-1">Date</label>
                    <input id="transaction_date" name="transaction_date" type="date" value="{{ old('transaction_date', now()->toDateString()) }}" required
                        class="w-full rounded-md bg-slate-800/80 border {{ $errors->has('transaction_date') ? 'border-red-400' : 'border-white/10' }} px-3 py-2 text-white focus:border-indigo-400 focus:ring-indigo-400">
                    @error('transaction_date')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
                </div>
                <div class="sm:col-span-2 lg:col-span-1 flex items-end">
                    <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white py-2 rounded-md text-sm font-medium transition">
                        Save Transaction
                    </button>
                </div>
                <div id="product-sale-fields" class="sm:col-span-2 lg:col-span-5 grid gap-3 sm:grid-cols-2 {{ old('type', 'income') === 'income' ? '' : 'hidden' }}">
                    <div>
                        <label for="product_id" class="block text-sm text-slate-300 mb-1">Product Sold (optional)</label>
                        <select id="product_id" name="product_id"
                            class="w-full rounded-md bg-slate-800/80 border {{ $errors->has('product_id') ? 'border-red-400' : 'border-white/10' }} px-3 py-2 text-white focus:border-indigo-400 focus:ring-indigo-400">
                            <option value="">— No product linked —</option>
                            @foreach($productsForSale as $saleProduct)
                                <option value="{{ $saleProduct->id }}" @selected(old('product_id') == $saleProduct->id)>
                                    {{ $saleProduct->name }} ({{ $saleProduct->stock }} in stock)
                                </option>
                            @endforeach
                        </select>
                        @error('product_id')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="quantity" class="block text-sm text-slate-300 mb-1">Quantity Sold</label>
                        <input id="quantity" name="quantity" type="number" min="1" value="{{ old('quantity', 1) }}"
                            placeholder="e.g. 1"
                            class="w-full rounded-md bg-slate-800/80 border {{ $errors->has('quantity') ? 'border-red-400' : 'border-white/10' }} px-3 py-2 text-white focus:border-indigo-400 focus:ring-indigo-400">
                        @error('quantity')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
                    </div>
                </div>
                <div class="sm:col-span-2 lg:col-span-5">
                    <label for="notes" class="block text-sm text-slate-300 mb-1">Notes (optional)</label>
                    <input id="notes" name="notes" type="text" value="{{ old('notes') }}"
                        class="w-full rounded-md bg-slate-800/80 border border-white/10 px-3 py-2 text-white focus:border-indigo-400 focus:ring-indigo-400">
                </div>
            </form>
        </section>


<!-- Product Inventory  -->
    <section class="rounded-xl bg-white/5 border border-white/10 overflow-hidden">
    <div class="px-6 py-4 border-b border-white/10">
        <h3 class="text-lg font-semibold">Products Inventory</h3>
        <p class="text-sm text-slate-400 mt-1">{{ $products->total() }} product(s) total &middot; Page {{ $products->currentPage() }} of {{ $products->lastPage() }}</p>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left">
            <thead class="bg-slate-800/80 text-slate-300 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3">Image</th>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Category</th>
                    <th class="px-6 py-3">Price</th>
                    <th class="px-6 py-3">Stock</th>
                    <th class="px-6 py-3 text-right">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse($products as $product)
                    <tr class="hover:bg-white/5">
                        <td class="px-6 py-4">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" class="h-12 w-12 rounded object-cover border border-white/10">
                            @else
                                <div class="h-12 w-12 rounded bg-slate-700 flex items-center justify-center text-xs text-slate-400">N/A</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 font-medium">{{ $product->name }}</td>
                        <td class="px-6 py-4 text-slate-300">{{ $product->category?->name ?? '—' }}</td>
                        <td class="px-6 py-4">${{ number_format($product->price, 2) }}</td>
                        <td class="px-6 py-4 text-slate-300">{{ $product->stock }}</td>
                        <td class="px-6 py-4 text-right">
                        <button type="button" 
    onclick="openEditProductModal(this)"
    data-update-url="{{ route('admin.products.update', $product) }}"
    data-name="{{ $product->name }}"
    data-category-id="{{ $product->category_id }}"
    data-price="{{ $product->price }}"
    data-stock="{{ $product->stock }}"
    data-description="{{ $product->description }}"
    class="text-indigo-300 hover:text-indigo-100 text-xs font-medium mr-2">
    Edit
</button>
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('Delete this product?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-rose-400 hover:text-rose-300 text-xs font-medium">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-6 py-8 text-center text-slate-400">No products yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>

<div id="editProductModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/60">
    <div class="bg-slate-900 p-6 rounded-xl w-full max-w-lg border border-white/10 shadow-2xl">
        <h3 class="text-white text-lg font-semibold mb-4">Edit Product</h3>
        
        <form id="editProductForm" method="POST" action="" enctype="multipart/form-data">
            @csrf @method('PUT')
            
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="text-slate-400 text-xs uppercase font-bold mb-1 block">Product Name</label>
                    <input type="text" name="name" required class="w-full p-2.5 bg-slate-800 border border-slate-700 text-white rounded">
                </div>
                
                <div>
                    <label class="text-slate-400 text-xs uppercase font-bold mb-1 block">Category</label>
                    <select name="category_id" required class="w-full p-2.5 bg-slate-800 border border-slate-700 text-white rounded">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="text-slate-400 text-xs uppercase font-bold mb-1 block">Price ($)</label>
                        <input type="number" name="price" required class="w-full p-2.5 bg-slate-800 border border-slate-700 text-white rounded">
                    </div>
                    <div>
                        <label class="text-slate-400 text-xs uppercase font-bold mb-1 block">Stock</label>
                        <input type="number" name="stock" required class="w-full p-2.5 bg-slate-800 border border-slate-700 text-white rounded">
                    </div>
                </div>

                <div>
                    <label class="text-slate-400 text-xs uppercase font-bold mb-1 block">Description</label>
                    <textarea name="description" rows="3" class="w-full p-2.5 bg-slate-800 border border-slate-700 text-white rounded"></textarea>
                </div>

                <div>
                    <label class="text-slate-400 text-xs uppercase font-bold mb-1 block">Product Image</label>
                    <input type="file" name="image" class="w-full text-sm text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-slate-800 file:text-white">
                </div>
            </div>

            <div class="flex justify-end gap-3 mt-6">
                <button type="button" onclick="document.getElementById('editProductModal').classList.add('hidden')" class="px-4 py-2 text-slate-400 hover:text-white">Cancel</button>
                <button type="submit" class="px-6 py-2 bg-emerald-600 hover:bg-emerald-500 text-white rounded-lg font-medium">Save Changes</button>
            </div>
        </form>
    </div>
</div>

<!-- Transaction Section -->
  <section class="rounded-xl bg-white/5 border border-white/10 overflow-hidden">
            <div class="px-6 py-4 border-b border-white/10">
                <h3 class="text-lg font-semibold">Transactions</h3>
                <p class="text-sm text-slate-400 mt-1">Income and expense history &middot; Page {{ $transactions->currentPage() }} of {{ $transactions->lastPage() }}</p>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="bg-slate-800/80 text-slate-300 uppercase text-xs">
                        <tr>
                            <th class="px-6 py-3">Date</th>
                            <th class="px-6 py-3">Title</th>
                            <th class="px-6 py-3">Type</th>
                            <th class="px-6 py-3">Amount</th>
                            <th class="px-6 py-3">Notes</th>
                            <th class="px-6 py-3 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @forelse($transactions as $transaction)
                            <tr class="hover:bg-white/5">
                                <td class="px-6 py-4 text-slate-300">{{ $transaction->transaction_date->format('M d, Y') }}</td>
                                <td class="px-6 py-4 font-medium">{{ $transaction->title }}</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex rounded-full px-2.5 py-0.5 text-xs font-semibold {{ $transaction->type === 'income' ? 'bg-emerald-500/20 text-emerald-300' : 'bg-rose-500/20 text-rose-300' }}">
                                        {{ ucfirst($transaction->type) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 font-medium {{ $transaction->type === 'income' ? 'text-emerald-300' : 'text-rose-300' }}">
                                    {{ $transaction->type === 'income' ? '+' : '-' }}${{ number_format($transaction->amount, 2) }}
                                </td>
                                <td class="px-6 py-4 text-slate-400 max-w-xs">
                                    @if($transaction->product_id && $transaction->quantity)
                                        <span class="block text-indigo-300 text-xs font-medium mb-0.5">{{ $transaction->product?->name }} × {{ $transaction->quantity }}</span>
                                    @endif
                                    <span class="truncate block">{{ $transaction->notes ?? '' }}</span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <button
                                            type="button"
                                            onclick="openEditTransactionModal(this)"
                                            data-update-url="{{ route('admin.transactions.update', $transaction) }}"
                                            data-title="{{ $transaction->title }}"
                                            data-type="{{ $transaction->type }}"
                                            data-amount="{{ $transaction->amount }}"
                                            data-transaction-date="{{ $transaction->transaction_date->format('Y-m-d') }}"
                                            data-notes='@json($transaction->notes ?? '')'
                                            class="text-indigo-300 hover:text-indigo-100 text-xs font-medium"
                                        >
                                            Edit
                                        </button>
                                        <form action="{{ route('admin.transactions.destroy', $transaction) }}" method="POST" class="inline" onsubmit="return confirmTransactionDelete(event);">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-rose-400 hover:text-rose-300 text-xs font-medium">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-8 text-center text-slate-400">No transactions recorded yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($transactions->hasPages())
                <div class="px-6 py-4 border-t border-white/10">
                    {{ $transactions->links() }}
                </div>
            @endif
        </section>
    </main>

    {{-- Edit Transaction Modal --}}
    <div id="edit-transaction-modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-black/60 backdrop-blur-sm" aria-modal="true" role="dialog">
        <div class="w-full max-w-lg rounded-xl bg-slate-900 border border-white/10 shadow-2xl">
            <div class="flex items-center justify-between px-6 py-4 border-b border-white/10">
                <h3 class="text-lg font-semibold text-white">Edit Transaction</h3>
                <button type="button" onclick="closeEditTransactionModal()" class="text-slate-400 hover:text-white p-1 rounded-md hover:bg-white/10 transition" aria-label="Close">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <form id="edit-transaction-form" method="POST" class="p-6 space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label for="edit_tx_title" class="block text-sm text-slate-300 mb-1">Title</label>
                    <input id="edit_tx_title" name="title" type="text" required class="w-full rounded-md bg-slate-800/80 border border-white/10 px-3 py-2 text-white focus:border-indigo-400 focus:ring-indigo-400">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="edit_tx_type" class="block text-sm text-slate-300 mb-1">Type</label>
                        <select id="edit_tx_type" name="type" required class="w-full rounded-md bg-slate-800/80 border border-white/10 px-3 py-2 text-white focus:border-indigo-400 focus:ring-indigo-400">
                            <option value="income">Income</option>
                            <option value="expense">Expense</option>
                        </select>
                    </div>
                    <div>
                        <label for="edit_tx_amount" class="block text-sm text-slate-300 mb-1">Amount ($)</label>
                        <input id="edit_tx_amount" name="amount" type="number" step="0.01" min="0.01" required class="w-full rounded-md bg-slate-800/80 border border-white/10 px-3 py-2 text-white focus:border-indigo-400 focus:ring-indigo-400">
                    </div>
                </div>
                <div>
                    <label for="edit_tx_date" class="block text-sm text-slate-300 mb-1">Date</label>
                    <input id="edit_tx_date" name="transaction_date" type="date" required class="w-full rounded-md bg-slate-800/80 border border-white/10 px-3 py-2 text-white focus:border-indigo-400 focus:ring-indigo-400">
                </div>
                <div>
                    <label for="edit_tx_notes" class="block text-sm text-slate-300 mb-1">Notes (optional)</label>
                    <input id="edit_tx_notes" name="notes" type="text" class="w-full rounded-md bg-slate-800/80 border border-white/10 px-3 py-2 text-white focus:border-indigo-400 focus:ring-indigo-400">
                </div>
                <div class="flex gap-3 pt-2">
                    <button type="submit" class="flex-1 bg-emerald-600 hover:bg-emerald-700 text-white py-2 rounded-md text-sm font-medium transition">Save Changes</button>
                    <button type="button" onclick="closeEditTransactionModal()" class="px-4 py-2 rounded-md text-sm text-slate-300 border border-white/10 hover:bg-white/5 transition">Cancel</button>
                </div>
            </form>
        </div>
    </div>

</body>
<script>
    function openEditTransactionModal(button) {
        // ၁။ Modal နဲ့ Form ကို ရှာမယ်
        const modal = document.getElementById('edit-transaction-modal');
        const form = document.getElementById('edit-transaction-form');

        // ၂။ Edit ခလုတ်ထဲမှာ ပါတဲ့ Data အချက်အလက်တွေကို ဆွဲထုတ်မယ်
        const updateUrl = button.getAttribute('data-update-url');
        const title = button.getAttribute('data-title');
        const type = button.getAttribute('data-type');
        const amount = button.getAttribute('data-amount');
        const date = button.getAttribute('data-transaction-date');
        let notes = button.getAttribute('data-notes');

        // Notes က JSON ပုံစံဖြစ်နေရင် ရှင်းလင်းမယ်
        try {
            notes = JSON.parse(notes);
        } catch(e) {}

        // ၃။ Popup Form ထဲက သက်ဆိုင်ရာ ကွက်လပ်တွေထဲကို Data တွေ ဖြည့်ပေးမယ်
        form.setAttribute('action', updateUrl);
        document.getElementById('edit_tx_title').value = title;
        document.getElementById('edit_tx_type').value = type;
        document.getElementById('edit_tx_amount').value = amount;
        document.getElementById('edit_tx_date').value = date;
        document.getElementById('edit_tx_notes').value = notes || '';

        // ၄။ Popup Window ကြီးကို မျက်နှာပြင်ပေါ် ဖော်ပြလိုက်မယ်
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeEditTransactionModal() {
        const modal = document.getElementById('edit-transaction-modal');
        // Popup Window ကို ပြန်ပိတ်ပြီး ဖျောက်ထားမယ်
        modal.classList.remove('flex');
        modal.classList.add('hidden');
    }
</script>
<script>
    function confirmTransactionDelete(event) {
        // အသုံးပြုသူကို အတည်ပြုချက် တောင်းခြင်း
        if (!confirm('ဒီအချက်အလက်ကို တကယ်ဖျက်မှာသေချာပါသလား?')) {
            // Cancel နှိပ်ရင် ဖျက်ခြင်းကို ရပ်တန့်လိုက်မယ်
            event.preventDefault();
            return false;
        }
        // OK နှိပ်ရင်တော့ ဖျက်လိုက်ပါမယ်
        return true;
    }
</script>

<script>
function openEditProductModal(button) {
    const modal = document.getElementById('editProductModal');
    const form = document.getElementById('editProductForm');
    
    // Data ယူခြင်း
    form.action = button.getAttribute('data-update-url');
    modal.querySelector('input[name="name"]').value = button.getAttribute('data-name');
    modal.querySelector('input[name="price"]').value = button.getAttribute('data-price');
    modal.querySelector('input[name="stock"]').value = button.getAttribute('data-stock');
    modal.querySelector('select[name="category_id"]').value = button.getAttribute('data-category-id');
    
    // Description
    const desc = button.getAttribute('data-description');
    modal.querySelector('textarea[name="description"]').value = (desc && desc !== 'null') ? desc : '';
    
    modal.classList.remove('hidden');
}
</script>

</html>