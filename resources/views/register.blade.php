<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-tr from-slate-900 via-indigo-950 to-slate-900 flex items-center justify-center px-4 py-10">
    
    <div class="w-full max-w-md bg-white/10 backdrop-blur-md border border-white/20 shadow-[0_0_50px_-12px_rgba(99,102,241,0.3)] rounded-2xl p-8 relative">
        
        <a href="{{ route('admin.dashboard') }}" class="absolute top-6 left-6 text-slate-400 hover:text-white transition-all duration-300 transform hover:-translate-x-1" title="Back to Dashboard">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>
        </a>

        <h1 class="text-3xl font-extrabold text-white text-center tracking-tight mb-2 mt-4">Get Started</h1>
        <p class="text-slate-400 text-center text-sm mb-8">Create your account to explore more.</p>

        @if($errors->any())
            <div class="mb-5 rounded-xl bg-red-500/10 border border-red-500/20 p-4 text-red-300 text-sm backdrop-blur-sm">
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.store') }}" method="POST" class="space-y-5">
            @csrf
            
            <div>
                <label for="name" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Name</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" required 
                       class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-300">
            </div>

            <div>
                <label for="email" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Email Address</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required 
                       class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-300">
            </div>

            <div>
                <label for="password" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Password</label>
                <input id="password" name="password" type="password" required 
                       class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-300">
            </div>

            <div>
                <label for="password_confirmation" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required 
                       class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-300">
            </div>

            <button type="submit" class="w-full mt-2 bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-semibold py-3 px-4 rounded-xl shadow-lg shadow-indigo-500/20 hover:shadow-indigo-500/40 hover:from-indigo-600 hover:to-purple-700 active:scale-[0.98] transition-all duration-200">
                Create Account
            </button>
        </form>

        <p class="mt-8 text-center text-sm text-slate-400">
            Already have an account? 
            <a href="{{ route('login') }}" class="text-indigo-400 hover:text-indigo-300 font-semibold underline underline-offset-4 decoration-2 transition">Login</a>
        </p>
    </div>

</body>
</html>