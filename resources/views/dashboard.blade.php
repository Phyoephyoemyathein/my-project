<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Dashboard</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="min-h-screen bg-slate-50 text-slate-800 antialiased">

    <header class="sticky top-0 z-50 border-b border-slate-200/80 bg-white/80 backdrop-blur-md">
        <div class="mx-auto flex max-w-5xl items-center justify-between px-6 py-4">
            
            <a href="#" 
               onclick="event.preventDefault(); forceExitToStore();" 
               class="group flex items-center gap-3 transition-transform duration-200 active:scale-95"
               title="Exit Dashboard and Return to Store">
                
                <div class="relative flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-slate-900 border-2 border-amber-400 shadow-[0_0_15px_rgba(251,191,36,0.3)] group-hover:border-amber-300 transition-all">
                    <span class="text-amber-400 font-black text-lg tracking-wider">TH</span>
                </div>

                <div class="flex flex-col">
                    <span class="text-base font-black tracking-tight text-slate-900 group-hover:text-indigo-600 transition-colors uppercase">THAN HTWE</span>
                    <span class="text-[10px] font-bold uppercase tracking-widest text-slate-500 group-hover:text-indigo-600 transition-colors">
                        Laptop Service Technician & Trainer
                    </span>
                </div>
            </a>

            <form id="normal-logout-form" action="{{ route('logout') }}" method="POST" class="inline-block">
                @csrf
                <button type="submit" class="inline-flex items-center gap-2 rounded-xl bg-slate-900 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition-all duration-200 hover:bg-red-600 hover:shadow-md hover:shadow-red-600/10 active:scale-95">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Logout
                </button>
            </form>
        </div>
    </header>

    <main class="mx-auto max-w-5xl px-6 py-10">
        
        {{-- Notification Alerts --}}
        @if(session('success'))
            <div class="mb-8 flex items-center gap-3 rounded-2xl border border-emerald-100 bg-emerald-50/60 p-4 text-emerald-800 backdrop-blur-sm">
                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-emerald-500 text-white">
                    <i class="fa-solid fa-check text-sm"></i>
                </span>
                <p class="text-sm font-medium">{{ session('success') }}</p>
            </div>
        @endif

        @if($errors->any())
            <div class="mb-8 rounded-2xl border border-red-100 bg-red-50/60 p-4 text-red-800 text-sm backdrop-blur-sm">
                <div class="flex gap-2 font-semibold text-red-900 mb-1">
                    <i class="fa-solid fa-triangle-exclamation mt-0.5"></i>
                    <span>Please fix the following issues:</span>
                </div>
                <ul class="list-disc list-inside space-y-0.5 pl-1 text-red-700/90">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Welcome Back Info Card --}}
        <div class="relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8 mb-8">
            <div class="absolute right-0 top-0 -mr-16 -mt-16 h-40 w-40 rounded-full bg-indigo-50/50 blur-3xl"></div>
            
            <div class="flex flex-col items-center gap-5 sm:flex-row sm:gap-6">
                <div class="relative">
                    @if(auth()->user()->profile_image)
                        <img
                            src="{{ asset('storage/' . auth()->user()->profile_image) }}"
                            alt="Profile Image"
                            class="h-24 w-24 rounded-2xl object-cover ring-4 ring-indigo-50 shadow-md"
                        >
                    @else
                        <div class="flex h-24 w-24 items-center justify-center rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 text-3xl font-bold text-white shadow-md shadow-indigo-500/20">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                    @endif
                    <span class="absolute bottom-1 right-1 h-3.5 w-3.5 rounded-full border-2 border-white bg-emerald-500"></span>
                </div>

                <div class="text-center sm:text-left flex-1">
                    <span class="inline-flex items-center rounded-md bg-indigo-50 px-2.5 py-0.5 text-xs font-semibold text-indigo-700">Active Member</span>
                    <h2 class="mt-1 text-2xl font-bold text-slate-900 tracking-tight">Welcome, {{ auth()->user()->name }}!</h2>
                    <p class="text-sm text-slate-500 mt-0.5">
                        Logged in as: <span class="font-medium text-slate-700">{{ auth()->user()->email }}</span>
                    </p>
                </div>

                @if(auth()->user()->role === 'admin')
                    <div class="pt-2 sm:pt-0">
                        <a
                            href="{{ route('admin.dashboard') }}"
                            class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-indigo-600 to-violet-600 px-5 py-3 text-xs font-bold text-white shadow-md shadow-indigo-600/10 transition-all duration-200 hover:from-indigo-500 hover:to-violet-500 hover:shadow-lg hover:shadow-indigo-600/20 active:scale-95"
                        >
                            <i class="fa-solid fa-chart-pie text-sm"></i>
                            Go to Admin Dashboard
                        </a>
                    </div>
                @endif
            </div>
        </div>

        {{-- Update Profile Block --}}
        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8 mb-8">
            <div class="border-b border-slate-100 pb-4 mb-6">
                <h3 class="text-lg font-bold text-slate-900 tracking-tight">Update Profile Information</h3>
                <p class="text-xs text-slate-500 mt-0.5">Keep your account details fresh and up to date.</p>
            </div>

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf

                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                    <div>
                        <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1.5">Full Name</label>
                        <input
                            id="name"
                            name="name"
                            type="text"
                            value="{{ old('name', auth()->user()->name) }}"
                            required
                            class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-2.5 text-sm text-slate-900 transition-all focus:border-indigo-500 focus:bg-white focus:outline-none focus:ring-4 focus:ring-indigo-500/10 placeholder:text-slate-400"
                            placeholder="John Doe"
                        >
                    </div>

                    <div>
                        <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1.5">Email Address</label>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email', auth()->user()->email) }}"
                            required
                            class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-2.5 text-sm text-slate-900 transition-all focus:border-indigo-500 focus:bg-white focus:outline-none focus:ring-4 focus:ring-indigo-500/10 placeholder:text-slate-400"
                            placeholder="example@mail.com"
                        >
                    </div>
                </div>

                <div>
                    <label for="profile_image" class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1.5">Profile Picture</label>
                    <div class="mt-1 flex items-center justify-center rounded-2xl border-2 border-dashed border-slate-200 px-6 py-5 transition-colors hover:border-indigo-300">
                        <div class="space-y-1 text-center">
                            <i class="fa-solid fa-cloud-arrow-up text-3xl text-slate-400 mb-2 block"></i>
                            <div class="flex text-sm text-slate-600">
                                <label for="profile_image" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                    <span>Upload a file</span>
                                    <input id="profile_image" name="profile_image" type="file" accept=".jpg,.jpeg,.png" class="sr-only">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-slate-400">PNG, JPG, JPEG up to 2MB</p>
                        </div>
                    </div>
                </div>

                <div class="pt-2 flex justify-end">
                    <button type="submit" class="inline-flex items-center gap-2 rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-sm shadow-indigo-600/10 transition-all duration-200 hover:bg-indigo-500 hover:shadow-md hover:shadow-indigo-500/20 active:scale-95">
                        <i class="fa-solid fa-floppy-disk"></i>
                        Save Changes
                    </button>
                </div>
            </form>
        </div>

        {{-- Update Password Block --}}
<div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
    <div class="border-b border-slate-100 pb-4 mb-6">
        <h3 class="text-lg font-bold text-slate-900 tracking-tight">Update Password</h3>
        <p class="text-xs text-slate-500 mt-0.5">Ensure your account is using a secure, long password.</p>
    </div>

    <form action="{{ route('password.update') }}" method="POST" class="space-y-5" autocomplete="off">
        @csrf
        @method('PUT')

        <div>
            <label for="current_password" class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1.5">Current Password</label>
            <input
                id="current_password"
                name="current_password"
                type="password"
                required
                autocomplete="new-password"
                class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-2.5 text-sm text-slate-900 transition-all focus:border-indigo-500 focus:bg-white focus:outline-none focus:ring-4 focus:ring-indigo-500/10"
                placeholder="••••••••"
            >
        </div>

        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
            <div>
                <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1.5">New Password</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    required
                    autocomplete="new-password"
                    class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-2.5 text-sm text-slate-900 transition-all focus:border-indigo-500 focus:bg-white focus:outline-none focus:ring-4 focus:ring-indigo-500/10"
                    placeholder="••••••••"
                >
            </div>

            <div>
                <label for="password_confirmation" class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1.5">Confirm Password</label>
                <input
                    id="password_confirmation"
                    name="password_confirmation"
                    type="password"
                    required
                    autocomplete="new-password"
                    class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-2.5 text-sm text-slate-900 transition-all focus:border-indigo-500 focus:bg-white focus:outline-none focus:ring-4 focus:ring-indigo-500/10"
                    placeholder="••••••••"
                >
            </div>
        </div>

        <div class="pt-2 flex justify-end">
            <button type="submit" class="inline-flex items-center gap-2 rounded-xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white shadow-sm transition-all duration-200 hover:bg-slate-800 active:scale-95">
                <i class="fa-solid fa-key"></i>
                Update Password
            </button>
        </div>
    </form>
</div>

    </main>

    <script>
        function forceExitToStore() {
            const form = document.getElementById('normal-logout-form');
            
            fetch(form.action, {
                method: 'POST',
                body: new FormData(form),
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            }).then(() => {
                window.location.href = "{{ url('/') }}";
            }).catch(() => {
                window.location.href = "{{ url('/') }}";
            });
        }

        const fileInput = document.getElementById('profile_image');
        if(fileInput) {
            fileInput.addEventListener('change', function(e) {
                const fileName = e.target.files[0]?.name;
                if(fileName) {
                    const textContainer = fileInput.closest('div').querySelector('p.text-slate-400');
                    if(textContainer) textContainer.innerText = "Selected: " + fileName;
                }
            });
        }
    </script>
</body>
</html>