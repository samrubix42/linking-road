
<div>
    <!-- Top Announcement Promo Bar -->
    <div class="bg-gradient-to-r from-purple-900 via-[#4C229E] to-indigo-900 text-white text-xs font-semibold py-2 px-4 text-center flex items-center justify-center space-x-2 shadow-inner">
        <span class="bg-white/20 backdrop-blur-md px-2.5 py-0.5 rounded-full text-[11px] uppercase tracking-wider font-extrabold text-pink-200 flex items-center gap-1">
            <i class="ri-rocket-fill text-pink-300"></i> COMING SOON
        </span>
        <span>LINKINGROAD is launching soon! Join <strong>1,480+ creators</strong> on the early access waitlist.</span>
    </div>

    <!-- Main Navigation Bar -->
    <header x-data="{ mobileMenuOpen: false }" class="glass-nav sticky top-0 z-50 w-full transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Brand Logo -->
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                    <img src="{{ asset('logo.png') }}" alt="LINKINGROAD Logo" class="h-8 sm:h-9 w-auto filter drop-shadow-[0_2px_8px_rgba(236,72,153,0.25)] group-hover:scale-105 transition-transform duration-300" />
                </a>

                <!-- Desktop Navigation Links -->
                <div class="hidden lg:flex items-center space-x-8">
                    <a href="#features" class="text-sm font-semibold text-slate-700 hover:text-purple-700 transition-colors flex items-center gap-1.5">
                        <i class="ri-flashlight-line text-pink-500"></i> Features
                    </a>
                    <a href="#solutions" class="text-sm font-semibold text-slate-700 hover:text-purple-700 transition-colors flex items-center gap-1.5">
                        <i class="ri-flow-chart text-purple-500"></i> Solutions
                    </a>
                    <a href="#story" class="text-sm font-semibold text-slate-700 hover:text-purple-700 transition-colors flex items-center gap-1.5">
                        <i class="ri-sparkles-line text-indigo-500"></i> Our Story
                    </a>
                    <a href="#faq" class="text-sm font-semibold text-slate-700 hover:text-purple-700 transition-colors flex items-center gap-1.5">
                        <i class="ri-questionnaire-line text-slate-500"></i> FAQ's
                    </a>
                </div>

                <!-- Desktop Actions -->
                <div class="hidden md:flex items-center space-x-4">
                    <a href="#waitlist" class="px-6 py-2.5 rounded-full bg-[#4C229E] hover:bg-[#3b197e] text-white font-extrabold text-sm shadow-md shadow-purple-900/20 hover:shadow-lg transition-all duration-300 flex items-center space-x-2">
                        <span>Join Waitlist</span>
                        <i class="ri-arrow-right-line"></i>
                    </a>
                </div>

                <!-- Mobile Hamburger Button -->
                <div class="lg:hidden flex items-center space-x-3">
                    <a href="#waitlist" class="px-4 py-2 rounded-full bg-[#4C229E] text-white text-xs font-extrabold sm:hidden flex items-center gap-1">
                        <span>Join</span>
                        <i class="ri-arrow-right-s-line"></i>
                    </a>
                    <button @click="mobileMenuOpen = !mobileMenuOpen" id="mobile-menu-btn" class="p-2 rounded-lg text-slate-600 hover:text-slate-900 hover:bg-slate-100 focus:outline-none" aria-label="Toggle menu">
                        <i class="ri-menu-3-line text-2xl" x-show="!mobileMenuOpen"></i>
                        <i class="ri-close-line text-2xl" x-show="mobileMenuOpen" x-cloak></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div x-show="mobileMenuOpen" x-cloak @click.away="mobileMenuOpen = false" class="lg:hidden glass-card border-t border-slate-200 px-4 pt-3 pb-6 space-y-4">
            <div class="flex flex-col space-y-3 pt-2">
                <a @click="mobileMenuOpen = false" href="#features" class="text-slate-700 hover:text-purple-700 text-base font-semibold py-1 flex items-center gap-2">
                    <i class="ri-flashlight-line text-pink-500"></i> Features
                </a>
                <a @click="mobileMenuOpen = false" href="#solutions" class="text-slate-700 hover:text-purple-700 text-base font-semibold py-1 flex items-center gap-2">
                    <i class="ri-flow-chart text-purple-500"></i> Solutions
                </a>
                <a @click="mobileMenuOpen = false" href="#story" class="text-slate-700 hover:text-purple-700 text-base font-semibold py-1 flex items-center gap-2">
                    <i class="ri-sparkles-line text-indigo-500"></i> Our Story
                </a>
                <a @click="mobileMenuOpen = false" href="#faq" class="text-slate-700 hover:text-purple-700 text-base font-semibold py-1 flex items-center gap-2">
                    <i class="ri-questionnaire-line text-slate-500"></i> FAQ's
                </a>
                <a @click="mobileMenuOpen = false" href="#waitlist" class="w-full text-center py-3 px-4 rounded-xl bg-[#4C229E] text-white font-bold text-sm shadow-md flex items-center justify-center gap-2">
                    <span>Join Waitlist</span>
                    <i class="ri-arrow-right-line"></i>
                </a>
            </div>
        </div>
    </header>
</div>