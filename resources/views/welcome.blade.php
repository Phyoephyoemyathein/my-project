<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPMT Computer Shop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Dark Nav Bar ပေါ်တွင် အလွန်တင့်တယ်ပြီး ဝင့်ကြွားနေမည့် Custom TH Logo Style */
        .home-th-logo {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 46px;
            height: 46px;
            border-radius: 50%;
            background: #1e293b; 
            position: relative;
            filter: drop-shadow(0 0 8px rgba(251, 191, 36, 0.5));
        }
        
        .home-th-logo::before {
            content: '';
            position: absolute;
            inset: -3.5px;
            border-radius: 50%;
            border-top: 3.5px solid #fbbf24; 
            border-left: 3.5px solid #fbbf24; 
            transform: rotate(45deg);
        }
        
        .home-th-logo-text {
            color: #fbbf24; 
            font-weight: 900;
            font-size: 16px;
            letter-spacing: 0.5px;
            line-height: 1;
            transform: translateY(0.5px);
            text-shadow: 0px 0px 3px rgba(251, 191, 36, 0.4);
        }
    </style>
</head>
<body class="min-h-screen bg-slate-50 text-slate-900 antialiased">
    {{-- Navigation --}}
    <nav class="sticky top-0 z-40 bg-slate-900/95 backdrop-blur-md border-b border-slate-800 shadow-md text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between gap-4">
                <a href="{{ route('home') }}" class="flex items-center gap-3 shrink-0 group">
                    <div class="home-th-logo">
                        <span class="home-th-logo-text">TH</span>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400 leading-none">THAN HTWE</p>
                        <p class="font-bold text-white leading-tight group-hover:text-amber-400 transition">Laptop Service Technician & Trainer</p>
                    </div>
                </a>

                <div class="hidden md:flex flex-1 max-w-md mx-4">
                    <label for="search" class="sr-only">Search products</label>
                    <div class="relative w-full">
                        <svg class="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M11 18a7 7 0 100-14 7 7 0 000 14z"/>
                        </svg>
                        <input
                            id="search"
                            type="search"
                            placeholder="Search products..."
                            class="w-full rounded-full border border-slate-700 bg-slate-800 py-2 pl-10 pr-4 text-sm text-white placeholder-slate-300 focus:border-amber-500 focus:ring-amber-500 focus:outline-none"
                        >
                    </div>
                </div>

                <div class="flex items-center gap-2 sm:gap-3 shrink-0">
                    <a href="{{ url('/contact') }}" class="text-sm text-slate-200 hover:text-amber-400 font-medium transition">
                        Contact Us
                    </a>

                    @auth
                        <a href="{{ route('dashboard') }}" class="hidden sm:inline text-sm text-slate-200 hover:text-amber-400 font-medium transition">My Account</a>
                        
                        @if(auth()->user()->role === 'admin')
                            <!-- <a href="{{ route('register') }}" class="inline-flex items-center rounded-lg bg-emerald-600 px-3 py-2 text-sm font-medium text-white hover:bg-emerald-700 transition shadow-sm">
                                Register (Admin Only)
                            </a> -->
                            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center rounded-lg bg-indigo-600 px-3 py-2 text-sm font-medium text-white hover:bg-indigo-700 transition shadow-sm">
                                Admin Dashboard
                            </a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="inline-flex items-center rounded-lg bg-amber-500 px-4 py-2 text-sm font-semibold text-slate-950 hover:bg-amber-400 transition shadow-sm">
                            Login
                        </a>
                    @endauth
                </div>
            </div>

            <div class="md:hidden pb-3">
                <input
                    id="search-mobile"
                    type="search"
                    placeholder="Search products..."
                    class="w-full rounded-full border border-slate-700 bg-slate-800 py-2 px-4 text-sm text-white placeholder-slate-300 focus:border-amber-500 focus:ring-amber-500 focus:outline-none"
                >
            </div>
        </div>
    </nav>

    {{-- Hero --}}
    <section class="bg-gradient-to-r from-indigo-600 via-indigo-700 to-slate-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-14">
            <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Your Ultimate Computer Shop</h1>
            <p class="mt-3 text-indigo-100 max-w-2xl text-sm sm:text-base">
                Browse premium laptops, components, and accessories. Filter by category and find the perfect gear for work or play.
            </p>
            <p class="mt-4 text-sm text-indigo-200">
                {{ $products->count() }} product{{ $products->count() !== 1 ? 's' : '' }} available
                @if($activeCategory)
                    in selected category
                @endif
            </p>
        </div>
    </section>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            {{-- Sidebar: Categories --}}
            <aside class="lg:w-64 shrink-0">
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-4 sticky top-24">
                    <h2 class="text-xs font-semibold uppercase tracking-wider text-slate-500 mb-3">Categories</h2>
                    <ul class="space-y-1">
                        <li>
                            <a
                                href="{{ route('home') }}"
                                class="block rounded-lg px-3 py-2.5 text-sm font-medium transition {{ ! $activeCategory ? 'bg-indigo-600 text-white shadow-md' : 'text-slate-700 hover:bg-slate-100' }}"
                            >
                                All Products
                            </a>
                        </li>
                        @foreach($categories as $category)
                            <li>
                                <a
                                    href="{{ route('home', ['category' => $category->slug]) }}"
                                    class="block rounded-lg px-3 py-2.5 text-sm font-medium transition {{ $activeCategory === $category->slug ? 'bg-indigo-600 text-white shadow-md' : 'text-slate-700 hover:bg-slate-100' }}"
                                >
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </aside>

            {{-- Product Grid --}}
            <div class="flex-1 min-w-0">
                @if($products->isEmpty())
                    <div class="bg-white rounded-xl border border-slate-200 p-12 text-center">
                        <p class="text-slate-500 text-lg">No products found in this category.</p>
                        <a href="{{ route('home') }}" class="inline-block mt-4 text-indigo-600 font-medium hover:text-indigo-700">View all products</a>
                    </div>
                @else
                    <div id="product-grid" class="grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
                        @foreach($products as $product)
                            <article
                                class="product-card group bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden hover:shadow-lg hover:border-indigo-200 transition duration-300 cursor-pointer"
                                data-name="{{ strtolower($product->name) }}"
                                data-real-name="{{ $product->name }}"
                                data-description="{{ strtolower($product->description) }}"
                                data-real-description="{{ $product->description }}"
                                data-price="${{ number_format($product->price, 2) }}"
                                data-stock="{{ $product->stock }}"
                                data-category="{{ $product->category ? $product->category->name : '' }}"
                                data-image="{{ $product->image ? asset('storage/' . $product->image) : '' }}"
                            >
                                <div class="aspect-[4/3] bg-slate-100 overflow-hidden relative">
                                    @if($product->image)
                                        <img
                                            src="{{ asset('storage/' . $product->image) }}"
                                            alt="{{ $product->name }}"
                                            class="h-full w-full object-cover group-hover:scale-105 transition duration-500"
                                        >
                                    @else
                                        <div class="h-full w-full flex items-center justify-center text-slate-400">
                                            <svg class="h-16 w-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    @endif
                                    @if($product->category)
                                        <span class="absolute top-3 left-3 inline-flex rounded-full bg-white/95 backdrop-blur px-2.5 py-1 text-xs font-semibold text-indigo-700 shadow-sm">
                                            {{ $product->category->name }}
                                        </span>
                                    @endif
                                </div>

                                <div class="p-5">
                                    <h3 class="font-bold text-slate-900 text-lg leading-snug">{{ $product->name }}</h3>
                                    <p class="mt-2 text-sm text-slate-600 line-clamp-3 leading-relaxed">{{ $product->description }}</p>

                                    <div class="mt-4 flex items-end justify-between gap-3">
                                        <div>
                                            <p class="text-2xl font-extrabold text-indigo-600">${{ number_format($product->price, 2) }}</p>
                                        </div>
                                        @if($product->stock > 0)
                                            <span class="inline-flex rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 px-2.5 py-1 text-xs font-semibold whitespace-nowrap">
                                                {{ $product->stock }} {{ $product->stock === 1 ? 'Item' : 'Items' }} Left
                                            </span>
                                        @else
                                            <span class="inline-flex rounded-full bg-red-50 text-red-700 border border-red-200 px-2.5 py-1 text-xs font-semibold whitespace-nowrap">
                                                Out of Stock
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <p id="no-search-results" class="hidden mt-8 text-center text-slate-500">No products match your search.</p>
                @endif
            </div>
        </div>
    </main>

    {{-- NEW: Product Details Modal (Pop-up Box) --}}
    <div id="product-modal" class="fixed inset-0 z-50 hidden bg-slate-900/60 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-3xl w-full max-h-[90vh] overflow-y-auto shadow-2xl border border-slate-100 flex flex-col md:flex-row relative">
            
            <button id="close-modal-btn" class="absolute top-4 right-4 z-10 bg-white/80 hover:bg-slate-100 p-2 rounded-full text-slate-500 hover:text-slate-800 border border-slate-200 shadow-sm transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            <div class="md:w-1/2 bg-slate-50 flex items-center justify-center p-6 border-b md:border-b-0 md:border-r border-slate-100 aspect-[4/3] md:aspect-auto">
                <div id="modal-image-container" class="w-full h-full min-h-[250px] flex items-center justify-center">
                    </div>
            </div>

            <div class="md:w-1/2 p-6 sm:p-8 flex flex-col justify-between">
                <div>
                    <span id="modal-product-category" class="inline-flex rounded-full bg-indigo-50 text-indigo-700 border border-indigo-100 px-2.5 py-0.5 text-xs font-semibold uppercase tracking-wider mb-3">
                        Category
                    </span>
                    <h2 id="modal-product-name" class="text-xl sm:text-2xl font-bold text-slate-900 leading-tight">
                        Product Title
                    </h2>
                    
                    <div class="mt-4 border-t border-b border-slate-100 py-3 flex items-center justify-between">
                        <span id="modal-product-price" class="text-3xl font-black text-indigo-600">
                            $0.00
                        </span>
                        <span id="modal-product-stock" class="inline-flex rounded-full px-3 py-1 text-xs font-bold whitespace-nowrap">
                            Stock Status
                        </span>
                    </div>

                    <div class="mt-5">
                        <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400">Description</h4>
                        <p id="modal-product-description" class="mt-1.5 text-sm text-slate-600 leading-relaxed max-h-[180px] overflow-y-auto pr-1">
                            Detailed information goes here.
                        </p>
                    </div>
                </div>

                <div class="mt-6">
                    <button id="close-modal-bottom-btn" class="w-full bg-slate-900 hover:bg-slate-800 text-white rounded-xl py-3 text-sm font-semibold shadow-md transition">
                        Back to Products
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer တွင် ဆက်သွယ်ရန်လိပ်စာများပါဝင်သော စနစ်ကျသည့် Developer Profile အပိုင်း --}}
    
    @include('developer-footer')

    <script>
        // Search Setup Logic
        function setupSearch(inputId) {
            const input = document.getElementById(inputId);
            if (!input) return;

            input.addEventListener('input', () => {
                const query = input.value.toLowerCase().trim();
                const cards = document.querySelectorAll('.product-card');
                let visible = 0;

                cards.forEach(card => {
                    const name = card.dataset.name || '';
                    const description = card.dataset.description || '';
                    const match = !query || name.includes(query) || description.includes(query);
                    card.classList.toggle('hidden', !match);
                    if (match) visible++;
                });

                const noResults = document.getElementById('no-search-results');
                if (noResults) {
                    noResults.classList.toggle('hidden', visible > 0 || !query);
                }
            });
        }

        setupSearch('search');
        setupSearch('search-mobile');

        // NEW: Product Modal Interactive Setup
        const modal = document.getElementById('product-modal');
        const cards = document.querySelectorAll('.product-card');
        const closeModalBtn = document.getElementById('close-modal-btn');
        const closeModalBottomBtn = document.getElementById('close-modal-bottom-btn');

        // Target Modal Elements
        const modalImageContainer = document.getElementById('modal-image-container');
        const modalCategory = document.getElementById('modal-product-category');
        const modalName = document.getElementById('modal-product-name');
        const modalPrice = document.getElementById('modal-product-price');
        const modalStock = document.getElementById('modal-product-stock');
        const modalDescription = document.getElementById('modal-product-description');

        // Bind Click Event on Cards
        cards.forEach(card => {
            card.addEventListener('click', () => {
                const name = card.getAttribute('data-real-name');
                const description = card.getAttribute('data-real-description');
                const price = card.getAttribute('data-price');
                const stock = parseInt(card.getAttribute('data-stock')) || 0;
                const category = card.getAttribute('data-category');
                const imageSrc = card.getAttribute('data-image');

                // 1. Render Image Container
                if (imageSrc) {
                    modalImageContainer.innerHTML = `<img src="${imageSrc}" alt="${name}" class="max-h-[300px] md:max-h-[400px] w-full object-contain rounded-xl">`;
                } else {
                    modalImageContainer.innerHTML = `
                        <div class="text-slate-400 flex flex-col items-center">
                            <svg class="h-20 w-20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span class="text-xs mt-2">No Image Available</span>
                        </div>`;
                }

                // 2. Render Textual Content
                modalCategory.textContent = category ? category : 'General';
                modalCategory.classList.toggle('hidden', !category);
                modalName.textContent = name;
                modalPrice.textContent = price;
                modalDescription.textContent = description;

                // 3. Conditional Badge UI for Stock Status
                if (stock > 0) {
                    modalStock.textContent = `${stock} Items Left`;
                    modalStock.className = "inline-flex rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 px-3 py-1 text-xs font-bold whitespace-nowrap";
                } else {
                    modalStock.textContent = "Out of Stock";
                    modalStock.className = "inline-flex rounded-full bg-red-50 text-red-700 border border-red-200 px-3 py-1 text-xs font-bold whitespace-nowrap";
                }

                // Smoothly Show Modal
                modal.classList.remove('hidden');
                document.body.classList.add('overflow-hidden'); // Disable page background scroll
            });
        });

        // Close Modal Handlers
        function closeModal() {
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        closeModalBtn.addEventListener('click', closeModal);
        closeModalBottomBtn.addEventListener('click', closeModal);

        // Close when clicking outside the box (backdrop)
        modal.addEventListener('click', (e) => {
            if (e.target === modal) closeModal();
        });
    </script>
</body>
</html>