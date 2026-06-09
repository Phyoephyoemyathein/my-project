<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Users - Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-[#131129] text-slate-200 antialiased" style="font-family: 'Inter', sans-serif;">

    <header class="border-b border-slate-800 bg-[#1a1836] sticky top-0 z-50">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
            <a href="{{ url('/') }}" class="group flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-slate-900 border border-amber-400">
                    <span class="text-amber-400 font-bold text-sm">TH</span>
                </div>
                <div class="flex flex-col">
                    <span class="text-sm font-bold text-white uppercase">THAN HTWE</span>
                    <span class="text-[9px] uppercase tracking-wider text-slate-400">Laptop Service Technician & Trainer</span>
                </div>
            </a>
            
            <div class="flex items-center gap-4">
                <span class="text-xs bg-[#25234c] px-3 py-1.5 rounded-lg text-amber-400 border border-amber-500/20 font-semibold uppercase">
                    Only For Admins
                </span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-600/90 hover:bg-red-600 text-white text-xs font-semibold px-4 py-2 rounded-xl transition-all">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </header>

    <main class="mx-auto max-w-7xl px-6 py-10">
        
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
            <div>
                <h1 class="text-2xl font-bold text-white tracking-tight">Registered Users List</h1>
                <p class="text-xs text-slate-400 mt-1">Website ထဲတွင် Register လုပ်ထားသော အဖွဲ့ဝင်များအားလုံးကို စီမံခန့်ခွဲရန်။</p>
            </div>
            <div>
                <a href="{{ url('admin/dashboard') }}" class="inline-flex items-center gap-2 justify-center rounded-xl bg-indigo-600 px-8 py-3.5 text-sm font-bold text-white shadow-lg shadow-indigo-600/20 transition-all duration-200 hover:bg-indigo-500 hover:shadow-xl hover:shadow-indigo-500/30 active:scale-[0.97]">
                    <i class="fa-solid fa-arrow-left"></i> Back to Dashboard
                </a>
            </div>
        </div>

        <div class="overflow-hidden rounded-2xl border border-slate-800 bg-[#1a1836] shadow-xl">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-slate-800 bg-[#211f45]/50 text-[11px] font-bold uppercase tracking-wider text-slate-400">
                            <th class="px-6 py-4">No.</th>
                            <th class="px-6 py-4">Name</th>
                            <th class="px-6 py-4">Email Address</th>
                            <th class="px-6 py-4">Role</th>
                            <th class="px-6 py-4">Registered Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/60 text-sm text-slate-300">
                        @forelse($users as $index => $user)
                            <tr class="hover:bg-[#211f45]/30 transition-colors">
                                <td class="px-6 py-4 font-medium text-slate-500">
                                    {{ $users->firstItem() + $index }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-indigo-600/20 text-indigo-400 font-bold text-xs">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                        <span class="font-semibold text-white">{{ $user->name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-slate-400">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-4">
                                    @if($user->role === 'admin')
                                        <span class="inline-flex items-center rounded-md bg-amber-500/10 px-2 py-0.5 text-xs font-medium text-amber-400 border border-amber-500/20">
                                            Admin
                                        </span>
                                    @else
                                        <span class="inline-flex items-center rounded-md bg-blue-500/10 px-2 py-0.5 text-xs font-medium text-blue-400 border border-blue-500/20">
                                            User
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-xs text-slate-400">
                                    {{ $user->created_at->format('d M Y (h:i A)') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-10 text-center text-slate-500">
                                    <i class="fa-solid fa-users-slash text-2xl mb-2 block"></i>
                                    No registered users found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($users->hasPages())
                <div class="border-t border-slate-800 bg-[#211f45]/20 px-6 py-4">
                    {{ $users->links() }}
                </div>
            @endif
        </div>
    </main>

</body>
</html>