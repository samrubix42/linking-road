
<footer class="w-full border-t border-slate-200 bg-white/85 backdrop-blur-xl py-12 relative z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center pb-8 border-b border-slate-200">
            
            <!-- Column 1: Brand & Tagline -->
            <div class="md:col-span-6 space-y-3">
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group w-fit">
                    <img src="{{ asset('logo.png') }}" alt="LINKINGROAD Logo" class="h-8 w-auto filter drop-shadow-[0_2px_6px_rgba(236,72,153,0.2)]">
                </a>
                <p class="text-xs text-slate-600 max-w-md leading-relaxed">
                    The most powerful AI social automation platform for modern growth teams. Turn every comment into revenue with 100% Meta-approved APIs.
                </p>
                <div class="flex items-center space-x-3 pt-2 text-slate-400 text-lg">
                    <a href="#" class="hover:text-pink-600 transition-colors" aria-label="Twitter"><i class="ri-twitter-x-fill"></i></a>
                    <a href="#" class="hover:text-pink-600 transition-colors" aria-label="LinkedIn"><i class="ri-linkedin-fill"></i></a>
                    <a href="#" class="hover:text-pink-600 transition-colors" aria-label="Instagram"><i class="ri-instagram-fill"></i></a>
                    <a href="#" class="hover:text-pink-600 transition-colors" aria-label="GitHub"><i class="ri-github-fill"></i></a>
                </div>
            </div>

            <!-- Column 2: Status & Quick Links -->
            <div class="md:col-span-6 flex flex-col md:items-end space-y-4">
                <div class="inline-flex items-center space-x-2.5 px-3.5 py-1.5 rounded-full bg-pink-50 border border-pink-200 text-xs text-pink-700 font-medium shadow-xs">
                    <i class="ri-shield-check-fill text-pink-600"></i>
                    <span class="font-mono text-pink-700 font-bold">100% Meta Compliant</span>
                </div>
                <div class="flex flex-wrap md:justify-end items-center gap-4 text-xs text-slate-600 font-semibold">
                    <a href="#features" class="hover:text-pink-600 transition-colors">Features</a>
                    <span>•</span>
                    <a href="#solutions" class="hover:text-pink-600 transition-colors">Solutions</a>
                    <span>•</span>
                    <a href="#story" class="hover:text-pink-600 transition-colors">Our Story</a>
                    <span>•</span>
                    <a href="#faq" class="hover:text-pink-600 transition-colors">FAQ's</a>
                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="pt-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500">
            <p>&copy; {{ date('Y') }} LINKINGROAD • All rights reserved.</p>
            <p class="text-[11px] font-mono text-slate-400 flex items-center gap-1">
                <i class="ri-heart-3-fill text-pink-500"></i> Designed for Modern Social Growth
            </p>
        </div>
    </div>
</footer>