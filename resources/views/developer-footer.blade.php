{{-- Light Theme ရော Dark Theme ပါ အလိုအလျောက် လိုက်ဖက်ညီမည့် Smart Glassmorphism Footer --}}
<footer class="mt-auto w-full relative z-10 border-t border-slate-200/50 dark:border-white/10 bg-slate-100/60 dark:bg-[#0b1329]/50 backdrop-blur-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center border-b border-slate-200/60 dark:border-white/5 pb-6 text-center md:text-left">
            
            <div>
                <div class="flex flex-col sm:flex-row items-center justify-center md:justify-start gap-3">
                    <span class="font-bold text-slate-800 dark:text-white text-base tracking-wide">Developed by Phyoe Phyoe Mya Thein</span>
                    <span class="inline-flex rounded-full bg-indigo-500/10 text-indigo-600 dark:text-indigo-300 border border-indigo-500/20 px-2.5 py-0.5 text-xs font-medium">
                        PHP Laravel Specialist
                    </span>
                </div>
                <p class="text-xs text-slate-600 dark:text-slate-400 mt-2 leading-relaxed max-w-md mx-auto md:mx-0">
                    This web application is a full-stack development project built with PHP Laravel Framework and Tailwind CSS.
                </p>
                
                <div class="mt-4 flex flex-wrap items-center justify-center md:justify-start gap-4 text-xs">
                    <a href="viber://chat?number=+959973713442" class="inline-flex items-center gap-1.5 text-slate-700 dark:text-slate-300 hover:text-indigo-600 dark:hover:text-indigo-400 font-medium transition duration-200">
                        <svg class="w-4 h-4 text-indigo-500 dark:text-indigo-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19.7 1H4.3A3.3 3.3 0 001 4.3v15.4A3.3 3.3 0 004.3 23h15.4a3.3 3.3 0 003.3-3.3V4.3A3.3 3.3 0 0019.7 1zM9.4 17.5a.6.6 0 01-.6-.6v-2a.6.6 0 011.2 0v2a.6.6 0 01-.6.6zm0-4.6a.6.6 0 01-.6-.6V7.7a.6.6 0 011.2 0v4.6a.6.6 0 01-.6.6zm5.8 4.6a.6.6 0 01-.6-.6v-4.6a.6.6 0 011.2 0v4.6a.6.6 0 01-.6.6zm0-7a.6.6 0 01-.6-.6v-2a.6.6 0 011.2 0v2a.6.6 0 01-.6.6z"/>
                        </svg>
                        Viber: +959973713442
                    </a>
                    <a href="mailto:phyoe572015@gmail.com" class="inline-flex items-center gap-1.5 text-slate-700 dark:text-slate-300 hover:text-indigo-600 dark:hover:text-indigo-400 font-medium transition duration-200">
                        <svg class="w-4 h-4 text-slate-500 dark:text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Gmail: phyoe572015@gmail.com
                    </a>
                </div>
            </div>
            
            <!-- <div class="flex justify-center md:justify-end">
                <div class="inline-flex items-center gap-2 rounded-xl bg-amber-500/5 dark:bg-white/5 text-amber-800 dark:text-amber-200 border border-amber-500/10 dark:border-white/10 p-3 text-xs font-medium text-left max-w-sm shadow-sm backdrop-blur-sm">
                    <svg class="w-5 h-5 text-amber-500 dark:text-amber-400 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <div>
                        <span class="block font-bold text-amber-700 dark:text-amber-300">Best Project Award</span>
                        <span class="text-slate-600 dark:text-slate-400 text-[11px]">"Guidelines for Universities"</span>
                    </div>
                </div>
            </div> -->

        </div>
        
        <div class="pt-4 text-center text-xs text-slate-500 dark:text-slate-500">
            &copy; {{ date('Y') }} TH Computer Shop. All rights reserved.
        </div>
    </div>
</footer>