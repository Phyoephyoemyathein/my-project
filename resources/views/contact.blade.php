<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - PHYOE COMPUTER</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght=300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        /* Premium Frosted Glass Effect */
        .glass-card { 
            background: rgba(15, 23, 42, 0.6); 
            backdrop-filter: blur(20px); 
            border: 1px solid rgba(255, 255, 255, 0.08); 
        }

        /* စိတ်ကြိုက်တောင်းဆိုထားသော အဝါရောင်အကွေးနှင့် TH Logo */
        .custom-th-logo {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #0f172a; /* Navigation bar နောက်ခံအရောင်နှင့် တစ်သားတည်း ညှိထားပါသည် */
            position: relative;
        }
        /* အဝါရောင် အကွေးပုံစံ ဖန်တီးခြင်း */
        .custom-th-logo::before {
            content: '';
            position: absolute;
            inset: -3px;
            border-radius: 50%;
            border-top: 2.5px solid #fbbf24; 
            border-left: 2.5px solid #fbbf24; 
            transform: rotate(45deg); /* အကွေးကို ဘယ်/ညာ ဟန်ချက်ညီအောင် လှည့်ပေးထားပါသည် */
        }
        .custom-th-logo-text {
            color: #fbbf24;
            font-weight: 800;
            font-size: 15px;
            letter-spacing: 0.5px;
        }
    </style>
</head>
{{-- justify-between ကို ဖြုတ်ပြီး စနစ်ကျသော Flex Layout အဖြစ် ပြင်ဆင်ထားပါသည် --}}
<body class="min-h-screen bg-[#020617] text-slate-100 antialiased flex flex-col relative overflow-x-hidden">

    <div class="absolute top-[-10%] left-[-10%] h-[500px] w-[500px] rounded-full bg-indigo-600/10 blur-[120px] pointer-events-none"></div>
    <div class="absolute bottom-[-10%] right-[-10%] h-[500px] w-[500px] rounded-full bg-purple-600/10 blur-[120px] pointer-events-none"></div>

    {{-- Top Navigation Bar --}}
    <nav class="bg-[#0f172a] border-b border-white/5 shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center">
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="custom-th-logo">
                    <span class="custom-th-logo-text">TH</span>
                </div>
                <div>
                    <p class="font-extrabold text-white text-sm leading-tight transition group-hover:text-indigo-400">THAN HTWE</p>
                    <i><span class="font-extrabold text-white text-sm leading-tight transition group-hover:text-indigo-400">Laptop Service Technician & Trainer</span></i>
                </div>
            </a>
        </div>
    </nav>

    {{-- Main Centered Contact Card --}}
    {{-- min-h-[70vh] ကို ထည့်သွင်းပေးထားသဖြင့် Content နည်းသော်လည်း Footer ကို အောက်ခြေသို့ တွန်းပို့ပေးထားမည် ဖြစ်သည် --}}
    <main class="flex-1 flex items-center justify-center px-4 py-12 relative z-10 min-h-[70vh]">
        <div class="w-full max-w-2xl glass-card rounded-[2.5rem] shadow-[0_0_50px_-12px_rgba(99,102,241,0.15)] p-6 sm:p-10 md:p-12 text-center transform transition duration-300 hover:scale-[1.005]">
            
            <div class="mb-10">
                <div class="inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-indigo-500/10 text-indigo-400 border border-indigo-500/20 mb-4 shadow-inner">
                    <i class="fa-solid fa-headset text-2xl"></i>
                </div>
                <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight text-white bg-gradient-to-r from-white via-slate-200 to-indigo-300 bg-clip-text text-transparent">
                    Contact Us
                </h1>
                <p class="mt-4 text-sm text-slate-400 leading-relaxed max-w-md mx-auto font-medium">
                    Than Htwe Laptop Service Technician & Trainer မှ ကြိုဆိုပါသည်ဗျာ။ လူကြီးမင်းတို့ သိရှိလိုသည်များကို အောက်ပါအချက်အလက်များအတိုင်း တိုက်ရိုက်ဆက်သွယ်မေးမြန်းနိုင်ပါသည်။
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mb-10 text-center">
                
                <div class="p-5 rounded-2xl bg-slate-900/40 border border-white/5 transition duration-200 hover:border-indigo-500/30 group">
                    <div class="h-11 w-11 rounded-xl bg-indigo-500/10 text-indigo-400 flex items-center justify-center mx-auto text-lg mb-3 border border-indigo-500/10 group-hover:scale-110 transition duration-200">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <h3 class="text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-1">Phone Number</h3>
                    <p class="text-slate-200 font-bold text-xs sm:text-sm break-all">09-773386443<br> 09-965665270<br> 09-262434048</p>
                </div>

                <div class="p-5 rounded-2xl bg-slate-900/40 border border-white/5 transition duration-200 hover:border-emerald-500/30 group">
                    <div class="h-11 w-11 rounded-xl bg-emerald-500/10 text-emerald-400 flex items-center justify-center mx-auto text-lg mb-3 border border-emerald-500/10 group-hover:scale-110 transition duration-200">
                        <i class="fa-regular fa-envelope"></i>
                    </div>
                    <h3 class="text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-1">Email Address</h3>
                    <p class="text-indigo-400 font-bold text-xs sm:text-sm break-all">Htwet550@gmail.com</p>
                </div>

                <div class="p-5 rounded-2xl bg-slate-900/40 border border-white/5 transition duration-200 hover:border-rose-500/30 group">
                    <div class="h-11 w-11 rounded-xl bg-rose-500/10 text-rose-400 flex items-center justify-center mx-auto text-lg mb-3 border border-rose-500/10 group-hover:scale-110 transition duration-200">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <h3 class="text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-1">Our Location</h3>
                    <p class="text-slate-200 font-semibold text-xs leading-relaxed">No-126/4 Floor, 39th Street (Lower Block), Kyauktada Tsp, Yangon</p>
                </div>

            </div>

            <div class="max-w-xs mx-auto p-3.5 rounded-xl bg-indigo-500/5 border border-indigo-500/10 text-slate-400 text-xs flex items-center justify-center gap-2 mb-8">
                <i class="fa-regular fa-clock text-indigo-400"></i>
                <span>Open Daily: <strong>9:00 AM - 6:00 PM</strong></span>
            </div>

            <div class="pt-2">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 justify-center rounded-xl bg-indigo-600 px-8 py-3.5 text-sm font-bold text-white shadow-lg shadow-indigo-600/20 transition-all duration-200 hover:bg-indigo-500 hover:shadow-xl hover:shadow-indigo-500/30 active:scale-[0.97]">
                    <i class="fa-solid fa-house text-xs"></i> Back to Home Store
                </a>
            </div>

        </div>
    </main>

    {{-- Dark Theme အတွက် သီးသန့်ဆောက်ထားသော ဖိုင်ကို လှမ်းခေါ်ခြင်း --}}
    @include('developer-footer-dark')
</body>
</html>