<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - PHYOE COMPUTER</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .glass-card { 
            background: rgba(15, 23, 42, 0.45); 
            backdrop-filter: blur(24px); 
            border: 1px solid rgba(255, 255, 255, 0.08); 
        }
    </style>
</head>
<body class="min-h-screen bg-[#020617] text-slate-100 antialiased flex flex-col justify-between relative overflow-x-hidden p-4 sm:p-6">

    <div class="absolute top-[-20%] left-[-10%] h-[600px] w-[600px] rounded-full bg-indigo-600/10 blur-[130px] pointer-events-none"></div>
    <div class="absolute bottom-[-20%] right-[-10%] h-[600px] w-[600px] rounded-full bg-purple-600/10 blur-[130px] pointer-events-none"></div>

    <div class="w-full max-w-7xl mx-auto flex justify-end relative z-20">
        <a href="{{ url('/') }}" class="inline-flex items-center gap-2 rounded-xl border border-slate-800 bg-slate-900/50 px-4 py-2.5 text-xs font-bold text-slate-400 shadow-sm transition-all duration-200 hover:bg-slate-800 hover:text-white hover:border-slate-700 active:scale-95 backdrop-blur-md">
            <i class="fa-solid fa-arrow-left text-[10px]"></i> Back to Store
        </a>
    </div>

    <main class="flex-1 flex items-center justify-center relative z-10 my-8">
        <div class="w-full max-w-md glass-card rounded-[2.5rem] shadow-[0_0_60px_-15px_rgba(99,102,241,0.2)] p-8 sm:p-10 text-center">
            
            <div class="mb-8">
                <div class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-indigo-500/10 text-indigo-400 border border-indigo-500/20 mb-4 shadow-inner">
                    <i class="fa-solid fa-laptop-code text-xl"></i>
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-white">Welcome Back!</h1>
                <p class="mt-2 text-xs text-slate-400 font-medium">Please enter your account details to sign in.</p>
            </div>

            @if(session('success'))
                <div class="mb-5 flex items-center gap-3 rounded-2xl border border-emerald-500/20 bg-emerald-500/10 p-4 text-emerald-400 backdrop-blur-md text-left">
                    <p class="text-xs font-semibold">{{ session('success') }}</p>
                </div>
            @endif

            @if($errors->any())
                <div class="mb-5 rounded-2xl border border-red-500/20 bg-red-50/10 p-4 text-red-400 text-sm backdrop-blur-md text-left">
                    <ul class="list-disc list-inside text-xs">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-5 text-left">
                @csrf

                <div class="space-y-1.5">
                    <label for="email" class="block text-[11px] font-extrabold uppercase tracking-widest text-slate-400">Email Address</label>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-500"><i class="fa-regular fa-envelope"></i></span>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required 
                            class="w-full rounded-xl border border-slate-800 bg-slate-900/60 pl-11 pr-4 py-3.5 text-sm text-white focus:border-indigo-500 focus:outline-none focus:ring-4 focus:ring-indigo-500/20"
                            placeholder="name@example.com">
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label for="password" class="block text-[11px] font-extrabold uppercase tracking-widest text-slate-400">Password</label>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-500"><i class="fa-solid fa-lock"></i></span>
                        <input id="password" name="password" type="password" required 
                            class="w-full rounded-xl border border-slate-800 bg-slate-900/60 pl-11 pr-4 py-3.5 text-sm text-white focus:border-indigo-500 focus:outline-none focus:ring-4 focus:ring-indigo-500/20"
                            placeholder="••••••••">
                    </div>
                </div>

                {{-- Remember Me & Forgot Password Section --}}
                <div class="flex items-center justify-between pt-1">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox" class="h-4 w-4 rounded-md border-slate-800 bg-slate-900 text-indigo-600 cursor-pointer">
                        <label for="remember" class="ml-2 text-xs font-bold text-slate-400 cursor-pointer hover:text-slate-300">Remember me</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="text-xs font-bold text-indigo-400 hover:text-indigo-300 transition-colors">
                        Forgot Password?
                    </a>
                </div>

                <div class="pt-2">
                    <button type="submit" 
                        class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 py-3.5 text-sm font-bold text-white shadow-lg transition-all active:scale-95 hover:bg-indigo-500">
                        Sign In <i class="fa-solid fa-arrow-right text-xs"></i>
                    </button>
                </div>
            </form>
        </div>
    </main>

    @include('developer-footer-dark')

</body>
</html>