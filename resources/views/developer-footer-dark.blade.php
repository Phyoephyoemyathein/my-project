{{-- Contact Page (အမည်းရောင် Theme) အတွက် သီးသန့် Transparent Footer --}}
<footer class="mt-auto w-full relative z-10 bg-transparent">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        {{-- အပေါ်က သစ်လွင်တဲ့ မျဉ်းကြောင်းပါးပါးလေးပဲ သုံးထားပါတယ် --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center border-t border-white/10 pt-8 pb-6 text-center md:text-left">
            
            <div>
                <div class="flex flex-col sm:flex-row items-center justify-center md:justify-start gap-3">
                    <span class="font-bold text-white text-base tracking-wide">Developed by Phyoe Phyoe Mya Thein</span>
                    <span class="inline-flex rounded-full bg-indigo-500/10 text-indigo-300 border border-indigo-500/20 px-2.5 py-0.5 text-xs font-medium">
                        PHP Laravel Specialist
                    </span>
                </div>
                <p class="text-xs text-slate-400 mt-2 leading-relaxed max-w-md mx-auto md:mx-0">
                    This web application is a full-stack development project built with PHP Laravel Framework and Tailwind CSS.
                </p>
                
                <div class="mt-4 flex flex-wrap items-center justify-center md:justify-start gap-4 text-xs">
                    <a href="viber://chat?number=+959973713442" class="inline-flex items-center gap-1.5 text-slate-300 hover:text-indigo-400 font-medium transition duration-200">
                        Viber: +959973713442
                    </a>
                    <a href="mailto:phyoe572015@gmail.com" class="inline-flex items-center gap-1.5 text-slate-300 hover:text-indigo-400 font-medium transition duration-200">
                        Gmail: phyoe572015@gmail.com
                    </a>
                </div>
            </div>
            
            <!-- <div class="flex justify-center md:justify-end">
                <div class="inline-flex items-center gap-2 rounded-xl bg-white/5 text-amber-200 border border-white/10 p-3 text-xs font-medium text-left max-w-sm shadow-sm">
                    <svg class="w-5 h-5 text-amber-400 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <div>
                        <span class="block font-bold text-amber-300">Best Project Award</span>
                        <span class="text-slate-400 text-[11px]">"Guidelines for Universities"</span>
                    </div>
                </div>
            </div> -->
        </div>
        <div class="pt-4 text-center text-xs text-slate-500">
            &copy; {{ date('Y') }} TH Computer Shop. All rights reserved.
        </div>
    </div>
</footer>