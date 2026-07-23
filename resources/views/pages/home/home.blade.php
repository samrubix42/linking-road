
<div class="w-full relative z-10 py-10 md:py-16">
    
    <!-- 1. HERO SECTION -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center pt-4 pb-16">
        <!-- Coming Soon Badge -->
        <div id="hero-badge" class="inline-flex items-center space-x-2 px-4 py-2 rounded-full bg-purple-50 border border-purple-200 text-xs font-bold text-purple-700 backdrop-blur-md mb-8 shadow-xs animate-float">
            <i class="ri-rocket-fill text-purple-600 animate-pulse text-sm"></i>
            <span class="tracking-wider uppercase">🚀 COMING SOON — JOIN EARLY ACCESS WAITLIST</span>
        </div>

        <!-- Main Hero Title -->
        <h1 id="hero-title" class="font-heading font-extrabold text-4xl sm:text-6xl lg:text-7xl tracking-tight text-slate-900 max-w-4xl mx-auto leading-[1.1] mb-6">
            Turn Every <br class="hidden sm:inline" />
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-pink-600 via-purple-600 to-indigo-600">
                Comment Into Revenue
            </span>
        </h1>

        <!-- Hero Subtitle -->
        <p id="hero-subtitle" class="text-base sm:text-xl text-slate-600 max-w-3xl mx-auto leading-relaxed mb-10 font-normal">
            Automate engagement, capture leads, and drive conversions effortlessly. The most powerful AI social automation platform for modern growth teams.
        </p>

        <!-- Early Access Email Subscription Form -->
        <div id="waitlist" class="max-w-xl mx-auto mb-16">
            @if($subscribed)
                <div class="p-5 rounded-2xl bg-emerald-50 border border-emerald-300 text-emerald-900 text-sm font-bold flex items-center justify-center space-x-2 shadow-sm animate-fadeIn">
                    <i class="ri-checkbox-circle-fill text-emerald-600 text-2xl"></i>
                    <span>🎉 You're on the early access list! We'll notify you as soon as LINKINGROAD launches.</span>
                </div>
            @else
                <form wire:submit.prevent="subscribe" class="flex flex-col sm:flex-row items-center gap-3">
                    <div class="relative w-full">
                        <i class="ri-mail-line absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                        <input type="email" wire:model="email" placeholder="Enter your email for early access..." class="w-full pl-11 pr-4 py-4 rounded-2xl bg-white border border-slate-300 text-slate-900 text-sm focus:outline-none focus:border-purple-600 focus:ring-2 focus:ring-purple-600/20 shadow-sm" required />
                    </div>
                    <button type="submit" wire:loading.attr="disabled" wire:target="subscribe" class="w-full sm:w-auto px-8 py-4 rounded-2xl bg-[#4C229E] hover:bg-[#3b197e] text-white font-extrabold text-sm shadow-xl shadow-purple-900/25 hover:shadow-2xl transition-all flex items-center justify-center space-x-2 shrink-0 cursor-pointer disabled:opacity-75 disabled:cursor-not-allowed">
                        <span wire:loading.remove wire:target="subscribe">Get Early Access</span>
                        <i wire:loading.remove wire:target="subscribe" class="ri-arrow-right-line"></i>
                        <span wire:loading wire:target="subscribe" class="flex items-center gap-2">
                            <i class="ri-loader-4-line animate-spin text-lg"></i>
                            <span>Submitting...</span>
                        </span>
                    </button>
                </form>
                @error('email') <span class="text-xs text-rose-600 font-bold block mt-2 text-left pl-2">{{ $message }}</span> @enderror
            @endif
            <p class="text-xs text-slate-500 mt-3 font-medium flex items-center justify-center gap-1.5">
                <i class="ri-shield-check-fill text-emerald-600"></i> Joined by {{ number_format($totalSubscribersCount) }}+ creators • 100% Free • No spam ever
            </p>
        </div>

        <!-- Interactive Live Automation Demo Graphic (Glowing Gradient Border Wrapper) -->
        <div class="max-w-4xl mx-auto p-[1.5px] bg-gradient-to-r from-pink-500 via-purple-500 to-indigo-500 rounded-3xl shadow-2xl shadow-pink-500/15 mb-16 text-left">
            <div class="bg-white/95 backdrop-blur-2xl rounded-[22px] p-6 sm:p-8 relative overflow-hidden">
                <div class="flex items-center justify-between border-b border-slate-100 pb-4 mb-6">
                    <div class="flex items-center space-x-2">
                        <span class="w-3 h-3 rounded-full bg-rose-400"></span>
                        <span class="w-3 h-3 rounded-full bg-amber-400"></span>
                        <span class="w-3 h-3 rounded-full bg-emerald-400"></span>
                        <span class="text-xs font-bold text-slate-500 ml-2 font-mono flex items-center gap-1.5">
                            <i class="ri-terminal-window-line text-pink-500"></i> LIVE AUTOMATION CANVAS
                        </span>
                    </div>
                    <span class="px-3 py-1 rounded-full bg-emerald-100/90 border border-emerald-300 text-emerald-800 text-xs font-bold flex items-center space-x-1.5 shadow-xs">
                        <i class="ri-shield-check-fill text-emerald-600"></i>
                        <span>100% Official API Active</span>
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
                    <!-- Trigger Node -->
                    <div class="bg-slate-50/90 rounded-2xl p-5 border border-pink-200 shadow-sm relative group hover:border-pink-400 hover:bg-white transition-all">
                        <div class="text-[11px] font-bold text-pink-600 uppercase tracking-wider mb-2 flex items-center justify-between">
                            <span class="flex items-center gap-1"><i class="ri-chat-1-fill"></i> 1. Incoming Comment</span>
                            <span class="w-2 h-2 rounded-full bg-pink-500 animate-ping"></span>
                        </div>
                        <div class="flex items-center space-x-3 mb-3">
                            <div class="w-9 h-9 rounded-full bg-gradient-to-tr from-pink-500 to-purple-600 flex items-center justify-center text-white font-bold text-lg shadow-sm">
                                <i class="ri-instagram-fill"></i>
                            </div>
                            <div>
                                <div class="text-xs font-bold text-slate-900">@growth_creator</div>
                                <div class="text-[11px] text-slate-500">Instagram Reel Comment</div>
                            </div>
                        </div>
                        <div class="bg-white p-3 rounded-xl text-xs text-slate-800 font-mono border border-slate-200/90 flex items-center justify-between shadow-2xs">
                            <span>"Send me the link"</span>
                            <i class="ri-corner-down-left-line text-pink-500 font-bold"></i>
                        </div>
                    </div>

                    <!-- Action Node -->
                    <div class="bg-slate-50/90 rounded-2xl p-5 border border-purple-200 shadow-sm relative group hover:border-purple-400 hover:bg-white transition-all">
                        <div class="text-[11px] font-bold text-purple-600 uppercase tracking-wider mb-2 flex items-center justify-between">
                            <span class="flex items-center gap-1"><i class="ri-send-plane-fill"></i> 2. Instant Auto-DM</span>
                            <span class="text-[10px] font-mono bg-purple-100 text-purple-700 px-2 py-0.5 rounded font-extrabold">0.8s</span>
                        </div>
                        <div class="flex items-center space-x-3 mb-3">
                            <div class="w-9 h-9 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center font-bold text-lg border border-purple-200">
                                <i class="ri-flashlight-fill"></i>
                            </div>
                            <div>
                                <div class="text-xs font-bold text-slate-900">Send Lead Magnet</div>
                                <div class="text-[11px] text-slate-500">Auto-Delivered</div>
                            </div>
                        </div>
                        <div class="bg-purple-50/90 p-3 rounded-xl text-xs text-purple-900 font-medium border border-purple-200 flex items-center gap-1.5 shadow-2xs">
                            <i class="ri-gift-2-fill text-pink-600"></i>
                            <span>Here's your exclusive guide!</span>
                        </div>
                    </div>

                    <!-- Result Node -->
                    <div class="bg-gradient-to-br from-pink-600 via-purple-600 to-indigo-600 rounded-2xl p-6 text-white shadow-xl relative transform hover:scale-[1.02] transition-transform">
                        <div class="text-[11px] font-bold text-pink-200 uppercase tracking-wider mb-2 flex items-center gap-1">
                            <i class="ri-line-chart-line"></i> 3. Revenue Result
                        </div>
                        <div class="text-4xl font-extrabold mb-1 font-mono tracking-tight">+42.8%</div>
                        <div class="text-xs text-pink-100 font-medium">Conversion Rate Boost</div>
                        <div class="mt-4 pt-3 border-t border-white/20 text-[11px] text-white/90 font-medium flex items-center gap-1.5">
                            <i class="ri-checkbox-circle-fill text-emerald-300 text-sm"></i>
                            <span>Lead captured to CRM automatically</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Trusted By Logos -->
        <div class="border-t border-slate-200/80 pt-10">
            <p class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-6">Trusted By Next-Generation Growth Teams</p>
            <div class="flex flex-wrap items-center justify-center gap-8 sm:gap-14 opacity-75 font-heading font-extrabold text-slate-500 text-lg sm:text-xl">
                <span class="flex items-center gap-2 hover:text-pink-600 transition-colors"><i class="ri-building-2-line text-pink-500"></i> Acme Corp</span>
                <span class="flex items-center gap-2 hover:text-purple-600 transition-colors"><i class="ri-global-line text-purple-500"></i> GlobalTech</span>
                <span class="flex items-center gap-2 hover:text-indigo-600 transition-colors"><i class="ri-cpu-line text-indigo-500"></i> Nexus</span>
                <span class="flex items-center gap-2 hover:text-pink-600 transition-colors"><i class="ri-shield-flash-line text-pink-600"></i> Stark Ind</span>
                <span class="flex items-center gap-2 hover:text-purple-600 transition-colors"><i class="ri-git-branch-line text-purple-600"></i> Wayne Ent</span>
                <span class="flex items-center gap-2 hover:text-indigo-600 transition-colors"><i class="ri-server-line text-indigo-600"></i> Hooli</span>
            </div>
        </div>
    </section>

    <!-- 2. OUR STORY SECTION -->
    <section id="story" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 border-t border-slate-200/80">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-6 space-y-6">
                <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-pink-50 border border-pink-200 text-xs font-bold text-pink-700">
                    <i class="ri-sparkles-fill text-pink-600"></i>
                    <span>OUR STORY</span>
                </div>
                <h2 class="font-heading text-3xl sm:text-5xl font-extrabold text-slate-900 leading-tight">
                    Building the future of <br class="hidden sm:inline" />
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-pink-600 to-purple-600">social engagement.</span>
                </h2>
                <p class="text-slate-600 text-base leading-relaxed">
                    We started <strong>LINKINGROAD</strong> because we saw creators and brands struggling to keep up with their DMs and comments. Legacy tools were too complex, too clunky, and felt like they belonged in 2015.
                </p>
                <p class="text-slate-600 text-base leading-relaxed">
                    Our mission is simple: to give you a cinematic, intuitive canvas to build automations that feel like magic, turning your audience into a loyal community while you sleep.
                </p>
                
                <div class="grid grid-cols-2 gap-4 pt-4">
                    <div class="p-4 rounded-2xl bg-white border border-slate-200 shadow-xs flex items-start space-x-3 hover:border-pink-300 transition-all">
                        <i class="ri-user-heart-fill text-2xl text-pink-600 shrink-0"></i>
                        <div>
                            <div class="font-bold text-slate-900 text-sm mb-1">Creator First</div>
                            <div class="text-xs text-slate-500">Built specifically for modern social media platforms.</div>
                        </div>
                    </div>
                    <div class="p-4 rounded-2xl bg-white border border-slate-200 shadow-xs flex items-start space-x-3 hover:border-purple-300 transition-all">
                        <i class="ri-shield-keyhole-fill text-2xl text-purple-600 shrink-0"></i>
                        <div>
                            <div class="font-bold text-slate-900 text-sm mb-1">Reliable API</div>
                            <div class="text-xs text-slate-500">100% compliant with platform rules & Meta APIs.</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Counter Grid -->
            <div class="lg:col-span-6">
                <div class="grid grid-cols-2 gap-6">
                    <div class="glass-card rounded-3xl p-6 sm:p-8 text-center border border-pink-200 shadow-lg shadow-pink-500/5 hover:border-pink-400 hover:-translate-y-1 transition-all">
                        <i class="ri-flashlight-line text-3xl text-pink-600 mb-2 block"></i>
                        <div class="font-mono text-4xl sm:text-5xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-pink-600 to-purple-600 mb-2">50M+</div>
                        <div class="text-xs font-bold text-slate-700 uppercase tracking-wider">Automations Run</div>
                    </div>
                    <div class="glass-card rounded-3xl p-6 sm:p-8 text-center border border-purple-200 shadow-lg shadow-purple-500/5 hover:border-purple-400 hover:-translate-y-1 transition-all">
                        <i class="ri-user-star-line text-3xl text-purple-600 mb-2 block"></i>
                        <div class="font-mono text-4xl sm:text-5xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-purple-600 to-indigo-600 mb-2">10k+</div>
                        <div class="text-xs font-bold text-slate-700 uppercase tracking-wider">Active Creators</div>
                    </div>
                    <div class="glass-card rounded-3xl p-6 sm:p-8 text-center border border-indigo-200 shadow-lg shadow-indigo-500/5 hover:border-indigo-400 hover:-translate-y-1 transition-all">
                        <i class="ri-time-line text-3xl text-indigo-600 mb-2 block"></i>
                        <div class="font-mono text-4xl sm:text-5xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-pink-600 mb-2">2.5M</div>
                        <div class="text-xs font-bold text-slate-700 uppercase tracking-wider">Hours Saved</div>
                    </div>
                    <div class="glass-card rounded-3xl p-6 sm:p-8 text-center border border-rose-200 shadow-lg shadow-rose-500/5 hover:border-rose-400 hover:-translate-y-1 transition-all">
                        <i class="ri-message-3-line text-3xl text-rose-600 mb-2 block"></i>
                        <div class="font-mono text-4xl sm:text-5xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-pink-600 to-rose-600 mb-2">100M+</div>
                        <div class="text-xs font-bold text-slate-700 uppercase tracking-wider">Messages Sent</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. COMPARISON SECTION -->
    <section id="features" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 border-t border-slate-200/80">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-purple-50 border border-purple-200 text-xs font-bold text-purple-700 mb-4">
                <i class="ri-contrast-2-fill text-purple-600"></i>
                <span>WHY SWITCH TO LINKINGROAD?</span>
            </div>
            <h2 class="font-heading text-3xl sm:text-5xl font-extrabold text-slate-900 mb-4">
                A platform that feels designed, not assembled.
            </h2>
            <p class="text-slate-600 text-base">
                Stop wrestling with outdated tools. See how LINKINGROAD compares to legacy automation platforms.
            </p>
        </div>

        <div class="p-[1.5px] bg-gradient-to-r from-pink-400 via-purple-500 to-indigo-500 rounded-3xl shadow-xl">
            <div class="bg-white/95 backdrop-blur-2xl rounded-[22px] overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-100/90 border-b border-slate-200 text-xs uppercase tracking-wider text-slate-600 font-mono">
                                <th class="p-5 sm:p-6 font-bold">Feature</th>
                                <th class="p-5 sm:p-6 font-bold text-pink-600 bg-pink-50/80 flex items-center gap-1.5 text-sm">
                                    <i class="ri-shield-star-fill text-xl text-pink-600"></i> LINKINGROAD
                                </th>
                                <th class="p-5 sm:p-6 font-bold text-slate-500">Manychat</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 text-sm">
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="p-5 sm:p-6 font-bold text-slate-900 flex items-center gap-2">
                                    <i class="ri-drag-drop-line text-pink-500 text-lg"></i> Workflow Builder
                                </td>
                                <td class="p-5 sm:p-6 bg-pink-50/40 text-pink-700 font-semibold flex items-center justify-between">
                                    <span class="flex items-center gap-1.5"><i class="ri-checkbox-circle-fill text-pink-600"></i> Modern Next-Gen Canvas</span>
                                    <span class="bg-pink-600 text-white text-[10px] uppercase font-bold px-2 py-0.5 rounded shadow-xs">CRUCIAL</span>
                                </td>
                                <td class="p-5 sm:p-6 text-slate-500">Clunky Linear Steps</td>
                            </tr>
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="p-5 sm:p-6 font-bold text-slate-900 flex items-center gap-2">
                                    <i class="ri-timer-flash-line text-purple-500 text-lg"></i> Setup Time
                                </td>
                                <td class="p-5 sm:p-6 bg-pink-50/40 text-emerald-700 font-bold flex items-center gap-1.5">
                                    <i class="ri-check-line font-bold"></i> Under 2 minutes
                                </td>
                                <td class="p-5 sm:p-6 text-slate-500">Hours of tutorials</td>
                            </tr>
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="p-5 sm:p-6 font-bold text-slate-900 flex items-center gap-2">
                                    <i class="ri-shield-check-line text-indigo-500 text-lg"></i> Instagram & FB Compliant
                                </td>
                                <td class="p-5 sm:p-6 bg-pink-50/40 text-pink-700 font-semibold flex items-center gap-1.5">
                                    <i class="ri-shield-fill text-pink-600"></i> 100% Official API
                                </td>
                                <td class="p-5 sm:p-6 text-slate-500">Often uses scraping</td>
                            </tr>
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="p-5 sm:p-6 font-bold text-slate-900 flex items-center gap-2">
                                    <i class="ri-contacts-book-2-line text-pink-500 text-lg"></i> Built-in CRM & Inbox
                                </td>
                                <td class="p-5 sm:p-6 bg-pink-50/40 text-pink-700 font-semibold flex items-center justify-between">
                                    <span class="flex items-center gap-1.5"><i class="ri-checkbox-circle-fill text-pink-600"></i> Included natively</span>
                                    <span class="bg-pink-600 text-white text-[10px] uppercase font-bold px-2 py-0.5 rounded shadow-xs">CRUCIAL</span>
                                </td>
                                <td class="p-5 sm:p-6 text-slate-500">Requires Zapier/Make</td>
                            </tr>
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="p-5 sm:p-6 font-bold text-slate-900 flex items-center gap-2">
                                    <i class="ri-thumb-up-line text-purple-500 text-lg"></i> Learning Curve
                                </td>
                                <td class="p-5 sm:p-6 bg-pink-50/40 text-emerald-700 font-bold flex items-center gap-1.5">
                                    <i class="ri-check-line font-bold"></i> Zero (Intuitive UI)
                                </td>
                                <td class="p-5 sm:p-6 text-slate-500">High (Developer focused)</td>
                            </tr>
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="p-5 sm:p-6 font-bold text-slate-900 flex items-center gap-2">
                                    <i class="ri-bar-chart-box-line text-indigo-500 text-lg"></i> Analytics
                                </td>
                                <td class="p-5 sm:p-6 bg-pink-50/40 text-pink-700 font-semibold flex items-center gap-1.5">
                                    <i class="ri-line-chart-fill text-pink-600"></i> Cinematic real-time data
                                </td>
                                <td class="p-5 sm:p-6 text-slate-500">Basic text logs</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="p-6 bg-pink-50/80 text-center border-t border-pink-200/90">
                    <a href="#solutions" class="inline-flex items-center space-x-2 px-8 py-3.5 rounded-xl bg-gradient-to-r from-pink-600 to-purple-600 hover:from-pink-500 hover:to-purple-500 text-white font-bold text-sm shadow-md hover:shadow-lg transition-all">
                        <span>Start Your Free Trial</span>
                        <i class="ri-arrow-right-line text-base"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. CORE PLATFORM PILLARS & SCREENSHOT SHOWCASE -->
    <section id="solutions" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 border-t border-slate-200/80">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-pink-50 border border-pink-200 text-xs font-bold text-pink-700 mb-4">
                <i class="ri-sparkles-fill text-pink-600"></i>
                <span>THE LINKINGROAD PLATFORM</span>
            </div>
            <h2 class="font-heading text-3xl sm:text-5xl font-extrabold text-slate-900 mb-4">
                Everything you need to automate & grow
            </h2>
            <p class="text-slate-600 text-base">
                Engineered specifically for Instagram & Facebook creators, brands, and agencies looking to turn engagement into loyal customers.
            </p>
        </div>

        <!-- 5 Key Platform Pillars Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            <!-- Pillar 1: Comment-to-DM Automations -->
            <div class="glass-glow-card rounded-3xl p-8 flex flex-col justify-between hover:-translate-y-1 transition-all">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-pink-500 to-rose-500 text-white font-bold flex items-center justify-center mb-6 text-2xl shadow-md shadow-pink-500/20">
                        <i class="ri-chat-3-fill"></i>
                    </div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 font-extrabold text-[11px] uppercase tracking-wider mb-3 inline-block">Core Feature</span>
                    <h3 class="font-heading text-xl font-extrabold text-slate-900 mb-3">Comment-to-DM Automations</h3>
                    <p class="text-slate-600 text-xs leading-relaxed">
                        Automatically sends direct messages or lead magnets (such as links or resources) when users comment specific keywords on Instagram Reels, posts, or stories.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-100 text-[11px] font-bold text-pink-600 flex items-center gap-1.5">
                    <i class="ri-flashlight-fill"></i> Instantly converts comment traffic
                </div>
            </div>

            <!-- Pillar 2: Visual Workflow Builder -->
            <div class="glass-glow-card rounded-3xl p-8 flex flex-col justify-between hover:-translate-y-1 transition-all">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-purple-500 to-indigo-500 text-white font-bold flex items-center justify-center mb-6 text-2xl shadow-md shadow-purple-500/20">
                        <i class="ri-drag-drop-fill"></i>
                    </div>
                    <span class="px-3 py-1 rounded-full bg-purple-100 text-purple-700 font-extrabold text-[11px] uppercase tracking-wider mb-3 inline-block">No-Code Canvas</span>
                    <h3 class="font-heading text-xl font-extrabold text-slate-900 mb-3">Visual Workflow Builder</h3>
                    <p class="text-slate-600 text-xs leading-relaxed">
                        A drag-and-drop canvas used to build custom automation workflows without requiring any coding skills.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-100 text-[11px] font-bold text-purple-600 flex items-center gap-1.5">
                    <i class="ri-magic-fill"></i> Drag, drop, & launch in minutes
                </div>
            </div>

            <!-- Pillar 3: Unified AI Inbox -->
            <div class="glass-glow-card rounded-3xl p-8 flex flex-col justify-between hover:-translate-y-1 transition-all">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-indigo-500 to-pink-500 text-white font-bold flex items-center justify-center mb-6 text-2xl shadow-md shadow-indigo-500/20">
                        <i class="ri-robot-2-fill"></i>
                    </div>
                    <span class="px-3 py-1 rounded-full bg-indigo-100 text-indigo-700 font-extrabold text-[11px] uppercase tracking-wider mb-3 inline-block">24/7 AI Agent</span>
                    <h3 class="font-heading text-xl font-extrabold text-slate-900 mb-3">Unified AI Inbox</h3>
                    <p class="text-slate-600 text-xs leading-relaxed">
                        Routes messages, automates follow-ups, handles customer service, and assists support teams from a single dashboard.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-100 text-[11px] font-bold text-indigo-600 flex items-center gap-1.5">
                    <i class="ri-customer-service-2-fill"></i> Smart routing & live AI support
                </div>
            </div>

            <!-- Pillar 4: CRM & Tool Integration -->
            <div class="glass-glow-card rounded-3xl p-8 flex flex-col justify-between hover:-translate-y-1 transition-all">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-pink-600 to-purple-600 text-white font-bold flex items-center justify-center mb-6 text-2xl shadow-md shadow-pink-500/20">
                        <i class="ri-pie-chart-2-fill"></i>
                    </div>
                    <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 font-extrabold text-[11px] uppercase tracking-wider mb-3 inline-block">Integrations</span>
                    <h3 class="font-heading text-xl font-extrabold text-slate-900 mb-3">CRM & Tool Integration</h3>
                    <p class="text-slate-600 text-xs leading-relaxed">
                        Connects with external tools and features built-in lead capture and analytics tracking.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-100 text-[11px] font-bold text-pink-600 flex items-center gap-1.5">
                    <i class="ri-links-fill"></i> Syncs natively with your tech stack
                </div>
            </div>

            <!-- Pillar 5: Platform Compliance -->
            <div class="glass-glow-card rounded-3xl p-8 flex flex-col justify-between hover:-translate-y-1 transition-all md:col-span-2 lg:col-span-2">
                <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-emerald-500 to-teal-500 text-white font-bold flex items-center justify-center mb-4 text-2xl shadow-md shadow-emerald-500/20">
                            <i class="ri-shield-check-fill"></i>
                        </div>
                        <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 font-extrabold text-[11px] uppercase tracking-wider mb-2 inline-block">Meta Approved</span>
                        <h3 class="font-heading text-xl font-extrabold text-slate-900 mb-2">Platform Compliance</h3>
                        <p class="text-slate-600 text-xs leading-relaxed max-w-xl">
                            Operates using official APIs designed to keep social media accounts safe. Zero risk of account bans or shadowbans.
                        </p>
                    </div>
                    <div class="bg-emerald-50 border border-emerald-200 p-4 rounded-2xl text-emerald-900 text-xs font-mono font-bold flex flex-col gap-1 shrink-0">
                        <span class="flex items-center gap-1.5 text-emerald-700"><i class="ri-checkbox-circle-fill text-emerald-600"></i> Official Instagram Graph API</span>
                        <span class="flex items-center gap-1.5 text-emerald-700"><i class="ri-checkbox-circle-fill text-emerald-600"></i> Official Messenger API</span>
                        <span class="flex items-center gap-1.5 text-emerald-700"><i class="ri-checkbox-circle-fill text-emerald-600"></i> Intelligent Rate Pacing</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- High-Resolution Platform Screenshot Gallery -->
        <div class="space-y-16">
            <!-- Screenshot 1: Workflow Builder -->
            <div class="p-[1.5px] bg-gradient-to-r from-pink-500 via-purple-500 to-indigo-500 rounded-3xl shadow-2xl overflow-hidden">
                <div class="bg-white/95 backdrop-blur-2xl p-6 sm:p-10">
                    <div class="flex flex-col lg:flex-row items-center justify-between gap-8 mb-8">
                        <div>
                            <span class="px-3.5 py-1.5 rounded-full bg-pink-100 text-pink-700 font-bold text-xs uppercase tracking-wider">Visual Workflow Canvas</span>
                            <h3 class="font-heading text-2xl sm:text-4xl font-extrabold text-slate-900 mt-2 mb-2">Drag & Drop Automation Builder</h3>
                            <p class="text-slate-600 text-sm max-w-2xl">Design complex triggers, condition filters, and automated responses effortlessly without writing code.</p>
                        </div>
                        <a href="#story" class="px-6 py-3 rounded-xl bg-gradient-to-r from-pink-600 to-purple-600 text-white font-bold text-xs shadow-md shrink-0 flex items-center gap-2">
                            <span>Explore Builder</span>
                            <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                    <div class="rounded-2xl overflow-hidden border border-slate-200 shadow-xl">
                        <img src="/images/workflow_builder.png" alt="LINKINGROAD Visual Workflow Builder Dashboard Screenshot" class="w-full h-auto object-cover hover:scale-[1.01] transition-transform duration-500" />
                    </div>
                </div>
            </div>

            <!-- Screenshot 2 & 3 Dual Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Unified Inbox Screenshot -->
                <div class="p-[1.5px] bg-gradient-to-r from-purple-500 to-indigo-500 rounded-3xl shadow-xl overflow-hidden flex flex-col justify-between">
                    <div class="bg-white/95 backdrop-blur-2xl p-6 sm:p-8 flex-grow">
                        <span class="px-3 py-1 rounded-full bg-purple-100 text-purple-700 font-bold text-xs uppercase tracking-wider">AI Inbox Dashboard</span>
                        <h4 class="font-heading text-xl font-bold text-slate-900 mt-2 mb-2">Unified Customer Communications</h4>
                        <p class="text-slate-600 text-xs mb-6">Manage all DMs across accounts, assign team agents, and let AI reply instantly.</p>
                        <div class="rounded-2xl overflow-hidden border border-slate-200 shadow-lg">
                            <img src="/images/unified_inbox.png" alt="LINKINGROAD Unified AI Inbox Screenshot" class="w-full h-auto object-cover" />
                        </div>
                    </div>
                </div>

                <!-- Analytics & CRM Screenshot -->
                <div class="p-[1.5px] bg-gradient-to-r from-pink-500 to-purple-500 rounded-3xl shadow-xl overflow-hidden flex flex-col justify-between">
                    <div class="bg-white/95 backdrop-blur-2xl p-6 sm:p-8 flex-grow">
                        <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 font-bold text-xs uppercase tracking-wider">Analytics & Integrations</span>
                        <h4 class="font-heading text-xl font-bold text-slate-900 mt-2 mb-2">Real-Time Lead & Conversion Analytics</h4>
                        <p class="text-slate-600 text-xs mb-6">Track revenue growth, conversion rates, and sync contact profiles directly to your CRM.</p>
                        <div class="rounded-2xl overflow-hidden border border-slate-200 shadow-lg">
                            <img src="/images/analytics_crm.png" alt="LINKINGROAD Analytics and CRM Integration Screenshot" class="w-full h-auto object-cover" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. UNIFIED INBOX & AI SHOWCASE (Interactive Live Simulator) -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 border-t border-slate-200/80">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <!-- Left Narrative -->
            <div class="lg:col-span-5 space-y-6">
                <h2 class="font-heading text-3xl sm:text-4xl font-extrabold text-slate-900 leading-tight">
                    Automate Conversations <br />
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-pink-600 to-purple-600">At Scale</span>
                </h2>
                <p class="text-slate-600 text-base leading-relaxed">
                    A unified inbox powered by AI. Route messages, automate follow-ups, and close deals without ever leaving the dashboard.
                </p>
                <div class="space-y-3 pt-2">
                    <div class="flex items-center space-x-3 text-sm font-semibold text-slate-800">
                        <span class="w-6 h-6 rounded-full bg-pink-100 text-pink-600 flex items-center justify-center text-xs"><i class="ri-check-line font-bold"></i></span>
                        <span>Automated inbox replies</span>
                    </div>
                    <div class="flex items-center space-x-3 text-sm font-semibold text-slate-800">
                        <span class="w-6 h-6 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center text-xs"><i class="ri-check-line font-bold"></i></span>
                        <span>Trigger-based routing</span>
                    </div>
                    <div class="flex items-center space-x-3 text-sm font-semibold text-slate-800">
                        <span class="w-6 h-6 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center text-xs"><i class="ri-check-line font-bold"></i></span>
                        <span>Sequential messaging & AI assistant</span>
                    </div>
                </div>
            </div>

            <!-- Right Interactive Chat Simulator Box -->
            <div 
                x-data="{
                    activePrompt: 'discount',
                    userText: 'Send me the 20% discount code!',
                    aiReply: '🎁 Boom! Use coupon code DISCOUNT at checkout to unlock 20% OFF instantly!',
                    setPrompt(type, userMsg, aiMsg) {
                        this.activePrompt = type;
                        this.userText = userMsg;
                        this.aiReply = aiMsg;
                    }
                }"
                class="lg:col-span-7 p-[1.5px] bg-gradient-to-r from-pink-500 via-purple-500 to-indigo-500 rounded-3xl shadow-2xl"
            >
                <div class="bg-white/95 backdrop-blur-2xl rounded-[22px] p-6 text-left">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-4 mb-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-9 h-9 rounded-full bg-gradient-to-tr from-pink-600 to-purple-600 text-white font-bold flex items-center justify-center text-base shadow-sm">
                                <i class="ri-robot-2-fill"></i>
                            </div>
                            <div>
                                <div class="text-xs font-bold text-slate-900">LINKINGROAD AI Simulator</div>
                                <div class="text-[10px] text-emerald-600 font-semibold flex items-center gap-1">
                                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-ping"></span> AI Active 24/7
                                </div>
                            </div>
                        </div>
                        <span class="text-xs font-mono text-slate-400">Try Interactive Prompts</span>
                    </div>

                    <!-- Prompt Selector Buttons -->
                    <div class="flex flex-wrap gap-2 mb-4">
                        <button 
                            @click="setPrompt('discount', 'Send me the 20% discount code!', '🎁 Boom! Use coupon code DISCOUNT at checkout to unlock 20% OFF instantly!')"
                            class="px-3 py-1.5 rounded-lg text-xs font-bold transition-all cursor-pointer"
                            :class="activePrompt === 'discount' ? 'bg-pink-600 text-white shadow-xs' : 'bg-slate-100 text-slate-700 hover:bg-slate-200'"
                        >
                            🎁 Discount Code
                        </button>
                        <button 
                            @click="setPrompt('lead', 'I want the growth playbook PDF', '⚡ Here is your free 2026 Social Growth Playbook PDF! Click here to download.')"
                            class="px-3 py-1.5 rounded-lg text-xs font-bold transition-all cursor-pointer"
                            :class="activePrompt === 'lead' ? 'bg-purple-600 text-white shadow-xs' : 'bg-slate-100 text-slate-700 hover:bg-slate-200'"
                        >
                            📥 Lead Magnet
                        </button>
                        <button 
                            @click="setPrompt('demo', 'How do I book a live strategy call?', '📅 Select your preferred calendar slot: https://calendly.com/linkingroad/demo')"
                            class="px-3 py-1.5 rounded-lg text-xs font-bold transition-all cursor-pointer"
                            :class="activePrompt === 'demo' ? 'bg-indigo-600 text-white shadow-xs' : 'bg-slate-100 text-slate-700 hover:bg-slate-200'"
                        >
                            📅 Book Call
                        </button>
                    </div>

                    <!-- Live Message Simulation Area -->
                    <div class="space-y-4 mb-6 text-xs min-h-[120px] bg-slate-50 p-4 rounded-2xl border border-slate-200/80">
                        <!-- Lead Message -->
                        <div class="flex items-start space-x-3">
                            <div class="w-7 h-7 rounded-full bg-slate-300 flex items-center justify-center font-bold text-slate-700 text-xs">U</div>
                            <div class="bg-white p-3 rounded-2xl rounded-tl-none max-w-md text-slate-800 border border-slate-200 shadow-2xs font-medium" x-text="userText"></div>
                        </div>

                        <!-- AI Bot Reply -->
                        <div class="flex items-start justify-end space-x-3">
                            <div class="bg-gradient-to-r from-pink-600 to-purple-600 text-white p-3.5 rounded-2xl rounded-tr-none max-w-md shadow-md font-medium" x-text="aiReply"></div>
                            <div class="w-7 h-7 rounded-full bg-purple-600 text-white font-bold flex items-center justify-center text-xs">
                                <i class="ri-robot-2-fill"></i>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-2 pt-2 border-t border-slate-100">
                        <input type="text" :value="userText" class="flex-grow px-4 py-2.5 rounded-xl bg-slate-50 border border-slate-200 text-xs focus:outline-none" readonly />
                        <button class="px-4 py-2.5 rounded-xl bg-pink-600 text-white font-bold text-xs flex items-center gap-1 shadow-xs">
                            <span>Auto-Sent</span> <i class="ri-check-double-line"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Metrics Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 pt-16">
            <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-xs flex items-start space-x-4 hover:border-pink-300 transition-all">
                <i class="ri-mail-send-fill text-3xl text-pink-600 shrink-0"></i>
                <div>
                    <div class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Email Collection</div>
                    <div class="text-3xl font-extrabold text-pink-600 font-mono mb-1">+120%</div>
                    <div class="text-xs text-slate-500">Capture rate vs landing pages</div>
                </div>
            </div>
            <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-xs flex items-start space-x-4 hover:border-purple-300 transition-all">
                <i class="ri-contacts-fill text-3xl text-purple-600 shrink-0"></i>
                <div>
                    <div class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Contact Capture</div>
                    <div class="text-3xl font-extrabold text-purple-600 font-mono mb-1">10k+</div>
                    <div class="text-xs text-slate-500">Profiles enriched monthly</div>
                </div>
            </div>
            <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-xs flex items-start space-x-4 hover:border-indigo-300 transition-all">
                <i class="ri-pie-chart-2-fill text-3xl text-indigo-600 shrink-0"></i>
                <div>
                    <div class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Funnel Tracking</div>
                    <div class="text-3xl font-extrabold text-indigo-600 font-mono mb-1">24/7</div>
                    <div class="text-xs text-slate-500">Real-time analytics syncing</div>
                </div>
            </div>
            <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-xs flex items-start space-x-4 hover:border-emerald-300 transition-all">
                <i class="ri-shield-user-fill text-3xl text-emerald-600 shrink-0"></i>
                <div>
                    <div class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Account Protection</div>
                    <div class="text-3xl font-extrabold text-emerald-600 font-mono mb-1">100%</div>
                    <div class="text-xs text-slate-500">Queue & traffic pacing safety</div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. CASE STUDIES SECTION -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 border-t border-slate-200/80">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-pink-50 border border-pink-200 text-xs font-bold text-pink-700 mb-4">
                <i class="ri-trophy-fill text-pink-600"></i>
                <span>CASE STUDIES</span>
            </div>
            <h2 class="font-heading text-3xl sm:text-5xl font-extrabold text-slate-900 mb-4">
                Proven by Top brands
            </h2>
            <p class="text-slate-600 text-base">
                See how creators and brands transform engagement and revenue using LINKINGROAD automations.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Case Study 1 -->
            <div class="glass-card rounded-3xl p-8 border border-slate-200 shadow-lg flex flex-col justify-between hover:border-pink-300 hover:-translate-y-1 transition-all">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="font-bold text-slate-900 text-sm flex items-center gap-1.5"><i class="ri-sparkles-fill text-pink-600"></i> Lumina Cosmetics</span>
                        <span class="px-3 py-1 rounded-full bg-pink-100 text-pink-700 font-bold text-xs">450% DM Increase</span>
                    </div>
                    <h3 class="font-heading text-xl font-bold text-slate-900 mb-3">Turning Instagram Comments into a $2M Revenue Channel</h3>
                    <p class="text-slate-600 text-xs leading-relaxed mb-6">
                        Lumina used LINKINGROAD's Comment-to-DM triggers to automatically send personalized quizzes to followers.
                    </p>
                </div>
                <a href="#solutions" class="text-xs font-bold text-pink-600 hover:underline flex items-center space-x-1">
                    <span>Read full story</span>
                    <i class="ri-arrow-right-line"></i>
                </a>
            </div>

            <!-- Case Study 2 -->
            <div class="glass-card rounded-3xl p-8 border border-slate-200 shadow-lg flex flex-col justify-between hover:border-purple-300 hover:-translate-y-1 transition-all">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="font-bold text-slate-900 text-sm flex items-center gap-1.5"><i class="ri-graduation-cap-fill text-purple-600"></i> Creator Academy</span>
                        <span class="px-3 py-1 rounded-full bg-purple-100 text-purple-700 font-bold text-xs">25K+ Leads</span>
                    </div>
                    <h3 class="font-heading text-xl font-bold text-slate-900 mb-3">Automating Webinar Registrations at Scale</h3>
                    <p class="text-slate-600 text-xs leading-relaxed mb-6">
                        Creator Academy replaced manual lead collection with automated DM funnels in 30 days.
                    </p>
                </div>
                <a href="#solutions" class="text-xs font-bold text-purple-600 hover:underline flex items-center space-x-1">
                    <span>Read full story</span>
                    <i class="ri-arrow-right-line"></i>
                </a>
            </div>

            <!-- Case Study 3 -->
            <div class="glass-card rounded-3xl p-8 border border-slate-200 shadow-lg flex flex-col justify-between hover:border-indigo-300 hover:-translate-y-1 transition-all">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="font-bold text-slate-900 text-sm flex items-center gap-1.5"><i class="ri-store-2-fill text-indigo-600"></i> FitLife Apparel</span>
                        <span class="px-3 py-1 rounded-full bg-indigo-100 text-indigo-700 font-bold text-xs">12hrs Saved Weekly</span>
                    </div>
                    <h3 class="font-heading text-xl font-bold text-slate-900 mb-3">Scaling Customer Support with Smart Auto-Replies</h3>
                    <p class="text-slate-600 text-xs leading-relaxed mb-6">
                        FitLife automated repetitive support questions and reduced response time by 90%.
                    </p>
                </div>
                <a href="#solutions" class="text-xs font-bold text-indigo-600 hover:underline flex items-center space-x-1">
                    <span>Read full story</span>
                    <i class="ri-arrow-right-line"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- 7. TESTIMONIALS SECTION -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 border-t border-slate-200/80">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="font-heading text-3xl sm:text-4xl font-extrabold text-slate-900 mb-3">
                Loved By Growth Teams
            </h2>
            <p class="text-slate-600 text-sm">See what creators and founders have to say about LINKINGROAD.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="glass-card rounded-3xl p-8 border border-slate-200 shadow-md hover:border-pink-300 transition-all">
                <div class="text-amber-400 mb-4 flex items-center gap-1">
                    <i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i>
                </div>
                <p class="text-slate-700 text-sm italic mb-6 leading-relaxed">
                    "LINKINGROAD completely changed how we handle inbound leads. We generate 3x more calls directly from Instagram comments now."
                </p>
                <div class="font-bold text-slate-900 text-sm">Sarah Jenkins</div>
                <div class="text-xs text-slate-500">Growth Head, StartupX</div>
            </div>

            <div class="glass-card rounded-3xl p-8 border border-slate-200 shadow-md hover:border-purple-300 transition-all">
                <div class="text-amber-400 mb-4 flex items-center gap-1">
                    <i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i>
                </div>
                <p class="text-slate-700 text-sm italic mb-6 leading-relaxed">
                    "The visual workflow builder is lightyears ahead of anything else. It feels like magic when you see the automations run."
                </p>
                <div class="font-bold text-slate-900 text-sm">David Chen</div>
                <div class="text-xs text-slate-500">Founder, CreatorBrand</div>
            </div>

            <div class="glass-card rounded-3xl p-8 border border-slate-200 shadow-md hover:border-indigo-300 transition-all">
                <div class="text-amber-400 mb-4 flex items-center gap-1">
                    <i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i>
                </div>
                <p class="text-slate-700 text-sm italic mb-6 leading-relaxed">
                    "We replaced three different tools with LINKINGROAD. The unified inbox and AI routing saves our team 20 hours a week."
                </p>
                <div class="font-bold text-slate-900 text-sm">Michael Ross</div>
                <div class="text-xs text-slate-500">VP Marketing, EcomLabs</div>
            </div>
        </div>
    </section>

    <!-- 9. FAQ SECTION -->
    <section id="faq" x-data="{ active: null }" class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-20 border-t border-slate-200/80">
        <div class="text-center mb-12">
            <h2 class="font-heading text-3xl font-extrabold text-slate-900 mb-3 flex items-center justify-center gap-2">
                <i class="ri-questionnaire-fill text-pink-600"></i> Frequently Asked Questions
            </h2>
            <p class="text-slate-600 text-sm">Everything you need to know about the product and automation platform.</p>
        </div>

        <div class="space-y-4">
            <!-- Q1 -->
            <div class="glass-card rounded-2xl border border-slate-200/90 overflow-hidden shadow-xs">
                <button 
                    @click="active = (active === 1 ? null : 1)" 
                    class="w-full px-6 py-5 text-left flex items-center justify-between focus:outline-none"
                >
                    <span class="font-heading font-bold text-slate-900 text-base sm:text-lg flex items-center gap-2">
                        <i class="ri-question-line text-pink-600"></i> What happens if I hit my automation limits?
                    </span>
                    <i class="ri-arrow-down-s-line text-2xl text-pink-600 transform transition-transform duration-300" :class="{ 'rotate-180': active === 1 }"></i>
                </button>
                <div x-show="active === 1" x-cloak class="px-6 pb-6 text-sm text-slate-600 border-t border-slate-100 pt-4 leading-relaxed">
                    If you exceed your monthly automation limit, we'll notify you via email. Automations will continue to run for an overage fee, or you can upgrade your plan at any time.
                </div>
            </div>

            <!-- Q2 -->
            <div class="glass-card rounded-2xl border border-slate-200/90 overflow-hidden shadow-xs">
                <button 
                    @click="active = (active === 2 ? null : 2)" 
                    class="w-full px-6 py-5 text-left flex items-center justify-between focus:outline-none"
                >
                    <span class="font-heading font-bold text-slate-900 text-base sm:text-lg flex items-center gap-2">
                        <i class="ri-shield-check-line text-purple-600"></i> Is it safe to use with my Instagram account?
                    </span>
                    <i class="ri-arrow-down-s-line text-2xl text-pink-600 transform transition-transform duration-300" :class="{ 'rotate-180': active === 2 }"></i>
                </button>
                <div x-show="active === 2" x-cloak class="px-6 pb-6 text-sm text-slate-600 border-t border-slate-100 pt-4 leading-relaxed">
                    Yes! LINKINGROAD uses 100% official, Meta-approved APIs with built-in rate limit pacing to keep your accounts completely safe and fully compliant.
                </div>
            </div>

            <!-- Q3 -->
            <div class="glass-card rounded-2xl border border-slate-200/90 overflow-hidden shadow-xs">
                <button 
                    @click="active = (active === 3 ? null : 3)" 
                    class="w-full px-6 py-5 text-left flex items-center justify-between focus:outline-none"
                >
                    <span class="font-heading font-semibold text-slate-900 text-base sm:text-lg flex items-center gap-2">
                        <i class="ri-links-line text-indigo-600"></i> Can I connect my own CRM?
                    </span>
                    <i class="ri-arrow-down-s-line text-2xl text-pink-600 transform transition-transform duration-300" :class="{ 'rotate-180': active === 3 }"></i>
                </button>
                <div x-show="active === 3" x-cloak class="px-6 pb-6 text-sm text-slate-600 border-t border-slate-100 pt-4 leading-relaxed">
                    Yes, we offer native integrations with HubSpot, Salesforce, ActiveCampaign, as well as Webhooks and Zapier for custom workflows.
                </div>
            </div>

            <!-- Q4 -->
            <div class="glass-card rounded-2xl border border-slate-200/90 overflow-hidden shadow-xs">
                <button 
                    @click="active = (active === 4 ? null : 4)" 
                    class="w-full px-6 py-5 text-left flex items-center justify-between focus:outline-none"
                >
                    <span class="font-heading font-semibold text-slate-900 text-base sm:text-lg flex items-center gap-2">
                        <i class="ri-code-s-slash-line text-pink-600"></i> Do I need coding skills to build workflows?
                    </span>
                    <i class="ri-arrow-down-s-line text-2xl text-pink-600 transform transition-transform duration-300" :class="{ 'rotate-180': active === 4 }"></i>
                </button>
                <div x-show="active === 4" x-cloak class="px-6 pb-6 text-sm text-slate-600 border-t border-slate-100 pt-4 leading-relaxed">
                    Zero coding required. Our visual drag-and-drop workflow canvas makes building complex automations simple and intuitive for anyone.
                </div>
            </div>
        </div>
    </section>

    <!-- 10. FINAL BOTTOM CTA BANNER -->
    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="p-[1.5px] bg-gradient-to-r from-pink-500 via-purple-500 to-indigo-500 rounded-3xl shadow-2xl">
            <div class="bg-white/95 backdrop-blur-2xl rounded-[22px] p-10 sm:p-14 text-center relative overflow-hidden">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-tr from-pink-500 to-purple-600 text-white font-bold flex items-center justify-center mx-auto mb-6 text-3xl shadow-lg shadow-pink-500/25">
                    <i class="ri-rocket-2-fill"></i>
                </div>
                <h2 class="font-heading text-3xl sm:text-5xl font-extrabold text-slate-900 mb-4">
                    Be First to Experience LINKINGROAD
                </h2>
                <p class="text-slate-600 text-base max-w-2xl mx-auto mb-8">
                    We're putting the finishing touches on the ultimate AI social automation platform. Request early access today.
                </p>
                <div class="max-w-md mx-auto">
                    @if($subscribed)
                        <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-300 text-emerald-900 text-sm font-bold flex items-center justify-center space-x-2">
                            <i class="ri-checkbox-circle-fill text-emerald-600 text-xl"></i>
                            <span>You're on the waitlist! We'll email you at launch.</span>
                        </div>
                    @else
                        <form wire:submit.prevent="subscribe" class="flex flex-col sm:flex-row items-center gap-3">
                            <input type="email" wire:model="email" placeholder="Enter your email address..." class="w-full px-4 py-3.5 rounded-xl bg-slate-50 border border-slate-300 text-slate-900 text-sm focus:outline-none focus:border-purple-600" required />
                            <button type="submit" wire:loading.attr="disabled" wire:target="subscribe" class="w-full sm:w-auto px-6 py-3.5 rounded-xl bg-[#4C229E] hover:bg-[#3b197e] text-white font-extrabold text-sm shadow-md transition-all shrink-0 cursor-pointer disabled:opacity-75 disabled:cursor-not-allowed">
                                <span wire:loading.remove wire:target="subscribe">Get Early Access</span>
                                <span wire:loading wire:target="subscribe" class="flex items-center gap-2">
                                    <i class="ri-loader-4-line animate-spin"></i>
                                    <span>Submitting...</span>
                                </span>
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>