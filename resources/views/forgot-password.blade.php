<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - TH COMPUTER</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .glass-card { background: rgba(15, 23, 42, 0.45); backdrop-filter: blur(24px); border: 1px solid rgba(255, 255, 255, 0.08); }
    </style>
</head>
<body class="min-h-screen bg-[#020617] text-slate-100 flex items-center justify-center p-4">

    <div class="w-full max-w-md glass-card rounded-[2.5rem] p-8 sm:p-10 text-center">
        <div class="mb-8">
            <div class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-indigo-500/10 text-indigo-400 border border-indigo-500/20 mb-4">
                <i class="fa-solid fa-lock text-xl"></i>
            </div>
            <h1 class="text-2xl font-extrabold text-white">Reset Password</h1>
            <p class="mt-2 text-xs text-slate-400">Enter your email and new password to reset.</p>
        </div>

        @if (session('status'))
            <div class="mb-4 text-xs text-emerald-400 bg-emerald-500/10 p-3 rounded-xl border border-emerald-500/20">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 text-xs text-red-400 bg-red-500/10 p-3 rounded-xl border border-red-500/20 text-left">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif

        <form action="{{ route('password.update.directly') }}" method="POST">
    @csrf
   
            <div class="space-y-1.5">
                <label class="block text-[11px] font-extrabold uppercase tracking-widest text-slate-400" style="text-align: left;">Email Address</label>
                <input type="email" name="email" required class="w-full rounded-xl border border-slate-800 bg-slate-900/60 p-3.5 text-sm text-white focus:border-indigo-500 focus:outline-none" placeholder="name@example.com">
            </div><br>

            <div class="space-y-1.5">
                <label class="block text-[11px] font-extrabold uppercase tracking-widest text-slate-400" style="text-align: left;">New Password</label>
                <input type="password" name="password" required class="w-full rounded-xl border border-slate-800 bg-slate-900/60 p-3.5 text-sm text-white focus:border-indigo-500 focus:outline-none" placeholder="••••••••">
            </div><br>

            <div class="space-y-1.5">
                <label class="block text-[11px] font-extrabold uppercase tracking-widest text-slate-400" style="text-align: left;">Confirm Password</label>
                <input type="password" name="password_confirmation" required class="w-full rounded-xl border border-slate-800 bg-slate-900/60 p-3.5 text-sm text-white focus:border-indigo-500 focus:outline-none" placeholder="••••••••">
            </div>
<br>
            <button type="submit" class="w-full rounded-xl bg-indigo-600 py-3.5 text-sm font-bold text-white transition-all hover:bg-indigo-500 active:scale-95">
                Update Password
            </button>

            <div class="text-center pt-2">
                <a href="{{ route('login') }}" class="text-xs font-bold text-slate-400 hover:text-white transition">Back to Login</a>
            </div>
        </form>
    </div>
</body>
</html>