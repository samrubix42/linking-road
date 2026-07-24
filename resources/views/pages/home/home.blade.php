{{-- ═══════════════════════════════════════════════════════════
     LINKINGROAD Home Page (dark Material Design theme)
     Livewire component: home.php
═══════════════════════════════════════════════════════════ --}}

<div class="w-full relative z-10">

    {{-- ─── 1. HERO ──────────────────────────────────────────── --}}
    <section class="max-w-[1200px] mx-auto px-5 md:px-6 text-center pt-28 sm:pt-32 pb-16 sm:pb-24">

        {{-- Badge --}}
        <div class="inline-flex mt-6 items-center gap-2 px-4 py-1.5 rounded-full glass-card mb-8 animate-fade-in">
            <span class="w-2 h-2 rounded-full bg-primary-container animate-pulse"></span>
            <span class="text-xs font-bold text-primary tracking-widest uppercase">🚀 Coming Soon</span>
        </div>

        {{-- Headline --}}
        <h1 class="font-bold text-3xl sm:text-5xl lg:text-[72px] tracking-[-0.04em] leading-[1.1] mb-5 sm:mb-6 max-w-4xl mx-auto text-on-surface">
            The Future of Social <br />
            <span class="gradient-text italic inline-block pr-2 pb-1">Automation is Here</span>
        </h1>

        {{-- Sub-headline --}}
        <p class="text-base sm:text-lg text-on-surface-variant max-w-2xl mx-auto leading-relaxed mb-8 sm:mb-12">
            We're putting the finishing touches on something big. LINKINGROAD is an AI-powered platform that turns every Instagram & Facebook comment into real revenue automatically. Be the first to experience it.
        </p>

        {{-- Waitlist form --}}
        <div id="waitlist" class="max-w-md mx-auto mb-6">
            @if($subscribed)
            <div class="p-5 rounded-2xl glass-card border border-white/10 text-sm font-bold flex items-center justify-center gap-3 animate-fade-in">
                <i class="ri-checkbox-circle-fill text-green-400 text-2xl"></i>
                <span class="text-on-surface">🎉 You're on the early access list! We'll notify you at launch.</span>
            </div>
            @else
            <form wire:submit.prevent="subscribe"
                class="flex flex-col sm:flex-row gap-2 p-2 rounded-2xl glass-card border border-white/10 shadow-2xl">
                <div class="relative flex-grow">
                    <i class="ri-mail-line absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant"></i>
                    <input
                        type="email"
                        wire:model="email"
                        placeholder="Enter your business email…"
                        class="w-full bg-transparent border-none focus:ring-0 pl-10 pr-4 py-3 text-on-surface placeholder:text-on-surface-variant/50 text-sm"
                        required />
                </div>
                <button
                    type="submit"
                    wire:loading.attr="disabled"
                    wire:target="subscribe"
                    class="bg-primary-container text-on-primary-container px-8 py-3 rounded-xl text-sm font-bold hover:scale-[1.02] active:scale-95 transition-transform primary-glow whitespace-nowrap disabled:opacity-60 disabled:cursor-not-allowed flex items-center justify-center gap-2">
                    <span wire:loading.remove wire:target="subscribe">Join the Waitlist</span>
                    <span wire:loading wire:target="subscribe" class="flex items-center gap-2">
                        <i class="ri-loader-4-line animate-spin"></i> Submitting…
                    </span>
                </button>
            </form>
            @error('email')
            <span class="text-xs text-red-400 font-bold block mt-2 text-left pl-2">{{ $message }}</span>
            @enderror
            @endif

            {{-- Social proof --}}
            <div class="mt-4 flex items-center justify-center gap-3">
                <div class="flex -space-x-2">
                    <div class="w-8 h-8 rounded-full border-2 border-surface bg-pink-600 flex items-center justify-center text-white text-xs font-bold"><i class="ri-user-line"></i></div>
                    <div class="w-8 h-8 rounded-full border-2 border-surface bg-purple-600 flex items-center justify-center text-white text-xs font-bold"><i class="ri-user-line"></i></div>
                    <div class="w-8 h-8 rounded-full border-2 border-surface bg-indigo-600 flex items-center justify-center text-white text-xs font-bold"><i class="ri-user-line"></i></div>
                </div>
                <p class="text-xs font-semibold text-on-surface-variant">
                    Join {{ number_format($totalSubscribersCount) }}+ growth teams already waiting
                </p>
            </div>
        </div>



        {{-- Trusted by logos --}}
        <div class="mt-16  pt-6">
            <p class="text-xs font-bold uppercase tracking-widest text-on-surface-variant/50 mb-6">Trusted By Next-Generation Growth Teams</p>
            <div class="flex flex-wrap items-center justify-center gap-6 sm:gap-14 font-bold text-on-surface/40 text-base sm:text-xl">
                <span class="flex items-center gap-2 hover:text-on-surface/70 transition-colors"><i class="ri-building-2-line text-primary/60"></i> Acme Corp</span>
                <span class="flex items-center gap-2 hover:text-on-surface/70 transition-colors"><i class="ri-global-line text-secondary/60"></i> GlobalTech</span>
                <span class="flex items-center gap-2 hover:text-on-surface/70 transition-colors"><i class="ri-cpu-line text-tertiary/60"></i> Nexus</span>
                <span class="flex items-center gap-2 hover:text-on-surface/70 transition-colors"><i class="ri-shield-flash-line text-primary/60"></i> Stark Ind</span>
                <span class="flex items-center gap-2 hover:text-on-surface/70 transition-colors"><i class="ri-git-branch-line text-secondary/60"></i> Wayne Ent</span>
                <span class="flex items-center gap-2 hover:text-on-surface/70 transition-colors"><i class="ri-server-line text-tertiary/60"></i> Hooli</span>
            </div>
        </div>
    </section>

    {{-- ─── 2. OUR STORY ──────────────────────────────────────── --}}
   {{-- 
    <section id="story" class="max-w-[1200px] mx-auto px-5 md:px-6 py-24 border-t border-white/5">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full glass-card border border-white/10 text-xs font-bold text-primary">
                    <i class="ri-sparkles-fill text-primary-container"></i> OUR STORY
                </div>
                <h2 class="font-bold text-4xl sm:text-5xl tracking-tight text-on-surface leading-tight">
                    Building the future of <br />
                    <span class="gradient-text">social engagement.</span>
                </h2>
                <p class="text-on-surface-variant text-base leading-relaxed">
                    We're on a mission to replace clunky, fragmented 2015-era tools with a single, high-precision automation engine built for <strong class="text-on-surface">Instagram & Facebook creators</strong>.
                </p>
                <p class="text-on-surface-variant text-base leading-relaxed">
                    Our mission: give you a cinematic canvas to build automations that feel like magic turning your audience into a loyal community while you sleep.
                </p>
                <div class="grid grid-cols-2 gap-4 pt-2">
                    <div class="glass-card bento-card rounded-2xl p-4 flex items-start gap-3">
                        <div class="p-2 rounded-lg bg-primary/10 border border-primary/20 shrink-0">
                            <i class="ri-user-heart-fill text-primary text-lg"></i>
                        </div>
                        <div>
                            <div class="font-bold text-on-surface text-sm mb-1">Creator First</div>
                            <div class="text-xs text-on-surface-variant">Built for modern social media platforms.</div>
                        </div>
                    </div>
                    <div class="glass-card bento-card rounded-2xl p-4 flex items-start gap-3">
                        <div class="p-2 rounded-lg bg-secondary/10 border border-secondary/20 shrink-0">
                            <i class="ri-shield-keyhole-fill text-secondary text-lg"></i>
                        </div>
                        <div>
                            <div class="font-bold text-on-surface text-sm mb-1">Reliable API</div>
                            <div class="text-xs text-on-surface-variant">100% compliant with Meta APIs.</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div class="glass-card bento-card rounded-3xl p-6 sm:p-8 text-center">
                    <i class="ri-flashlight-line text-3xl text-primary mb-2 block"></i>
                    <div class="font-mono text-4xl sm:text-5xl font-extrabold gradient-text mb-2">50M+</div>
                    <div class="text-xs font-bold text-on-surface-variant uppercase tracking-wider">Automations Run</div>
                </div>
                <div class="glass-card bento-card rounded-3xl p-6 sm:p-8 text-center">
                    <i class="ri-user-star-line text-3xl text-secondary mb-2 block"></i>
                    <div class="font-mono text-4xl sm:text-5xl font-extrabold gradient-text mb-2">10k+</div>
                    <div class="text-xs font-bold text-on-surface-variant uppercase tracking-wider">Active Creators</div>
                </div>
                <div class="glass-card bento-card rounded-3xl p-6 sm:p-8 text-center">
                    <i class="ri-time-line text-3xl text-tertiary mb-2 block"></i>
                    <div class="font-mono text-4xl sm:text-5xl font-extrabold gradient-text mb-2">2.5M</div>
                    <div class="text-xs font-bold text-on-surface-variant uppercase tracking-wider">Hours Saved</div>
                </div>
                <div class="glass-card bento-card rounded-3xl p-6 sm:p-8 text-center">
                    <i class="ri-message-3-line text-3xl text-primary mb-2 block"></i>
                    <div class="font-mono text-4xl sm:text-5xl font-extrabold gradient-text mb-2">100M+</div>
                    <div class="text-xs font-bold text-on-surface-variant uppercase tracking-wider">Messages Sent</div>
                </div>
            </div>
        </div>
    </section>
   --}}

    {{-- ─── 3. COMPARISON ─────────────────────────────────────── 
    <section id="features" class="max-w-[1200px] mx-auto px-5 md:px-6 py-24 border-t border-white/5">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full glass-card border border-white/10 text-xs font-bold text-secondary mb-4">
                <i class="ri-contrast-2-fill text-secondary"></i> WHY SWITCH TO LINKINGROAD?
            </div>
            <h2 class="font-bold text-4xl sm:text-5xl text-on-surface mb-4">A platform that feels designed,<br /> not assembled.</h2>
            <p class="text-on-surface-variant text-base">Stop wrestling with outdated tools. See how LINKINGROAD compares.</p>
        </div>

        <div class="glass-card rounded-3xl border border-white/8 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-white/8 text-xs uppercase tracking-wider text-on-surface-variant/60 font-mono" style="background:rgba(255,255,255,0.03);">
                            <th class="p-5 sm:p-6 font-bold">Feature</th>
                            <th class="p-5 sm:p-6 font-bold text-primary text-sm" style="background:rgba(247,81,161,0.06);">
                                <span class="flex items-center gap-1.5"><i class="ri-shield-star-fill text-xl text-primary-container"></i> LINKINGROAD</span>
                            </th>
                            <th class="p-5 sm:p-6 font-bold text-on-surface-variant/60">Manychat</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5 text-sm">
                        <tr class="hover:bg-white/[0.02] transition-colors">
                            <td class="p-5 sm:p-6 font-bold text-on-surface">
                                <span class="flex items-center gap-2"><i class="ri-drag-drop-line text-primary text-lg"></i> Workflow Builder</span>
                            </td>
                            <td class="p-5 sm:p-6 text-primary font-semibold" style="background:rgba(247,81,161,0.04);">
                                <div class="flex items-center justify-between">
                                    <span class="flex items-center gap-1.5"><i class="ri-checkbox-circle-fill text-primary-container"></i> Modern Next-Gen Canvas</span>
                                    <span class="bg-primary-container text-on-primary-container text-[10px] uppercase font-bold px-2 py-0.5 rounded">CRUCIAL</span>
                                </div>
                            </td>
                            <td class="p-5 sm:p-6 text-on-surface-variant">Clunky Linear Steps</td>
                        </tr>
                        <tr class="hover:bg-white/[0.02] transition-colors">
                            <td class="p-5 sm:p-6 font-bold text-on-surface">
                                <span class="flex items-center gap-2"><i class="ri-timer-flash-line text-secondary text-lg"></i> Setup Time</span>
                            </td>
                            <td class="p-5 sm:p-6 text-primary font-semibold" style="background:rgba(247,81,161,0.04);">
                                <span class="flex items-center gap-1.5"><i class="ri-checkbox-circle-fill text-primary-container"></i> Under 2 minutes</span>
                            </td>
                            <td class="p-5 sm:p-6 text-on-surface-variant">Hours of tutorials</td>
                        </tr>
                        <tr class="hover:bg-white/[0.02] transition-colors">
                            <td class="p-5 sm:p-6 font-bold text-on-surface">
                                <span class="flex items-center gap-2"><i class="ri-shield-check-line text-tertiary text-lg"></i> Platform Compliance</span>
                            </td>
                            <td class="p-5 sm:p-6 text-primary font-semibold" style="background:rgba(247,81,161,0.04);">
                                <span class="flex items-center gap-1.5"><i class="ri-checkbox-circle-fill text-primary-container"></i> 100% Official API</span>
                            </td>
                            <td class="p-5 sm:p-6 text-on-surface-variant">Often uses scraping</td>
                        </tr>
                        <tr class="hover:bg-white/[0.02] transition-colors">
                            <td class="p-5 sm:p-6 font-bold text-on-surface">
                                <span class="flex items-center gap-2"><i class="ri-contacts-book-2-line text-primary text-lg"></i> Built-in CRM & Inbox</span>
                            </td>
                            <td class="p-5 sm:p-6 text-primary font-semibold" style="background:rgba(247,81,161,0.04);">
                                <div class="flex items-center justify-between">
                                    <span class="flex items-center gap-1.5"><i class="ri-checkbox-circle-fill text-primary-container"></i> Included natively</span>
                                    <span class="bg-primary-container text-on-primary-container text-[10px] uppercase font-bold px-2 py-0.5 rounded">CRUCIAL</span>
                                </div>
                            </td>
                            <td class="p-5 sm:p-6 text-on-surface-variant">Requires Zapier/Make</td>
                        </tr>
                        <tr class="hover:bg-white/[0.02] transition-colors">
                            <td class="p-5 sm:p-6 font-bold text-on-surface">
                                <span class="flex items-center gap-2"><i class="ri-thumb-up-line text-secondary text-lg"></i> Learning Curve</span>
                            </td>
                            <td class="p-5 sm:p-6 text-primary font-semibold" style="background:rgba(247,81,161,0.04);">
                                <span class="flex items-center gap-1.5"><i class="ri-checkbox-circle-fill text-primary-container"></i> Zero (Intuitive UI)</span>
                            </td>
                            <td class="p-5 sm:p-6 text-on-surface-variant">High (Developer-focused)</td>
                        </tr>
                        <tr class="hover:bg-white/[0.02] transition-colors">
                            <td class="p-5 sm:p-6 font-bold text-on-surface">
                                <span class="flex items-center gap-2"><i class="ri-bar-chart-box-line text-tertiary text-lg"></i> Analytics</span>
                            </td>
                            <td class="p-5 sm:p-6 text-primary font-semibold" style="background:rgba(247,81,161,0.04);">
                                <span class="flex items-center gap-1.5"><i class="ri-checkbox-circle-fill text-primary-container"></i> Cinematic real-time data</span>
                            </td>
                            <td class="p-5 sm:p-6 text-on-surface-variant">Basic text logs</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="p-6 text-center border-t border-white/5" style="background:rgba(211,187,255,0.05);">
                <a href="#waitlist"
                    class="inline-flex items-center gap-2 px-8 py-3.5 rounded-xl text-white font-bold text-sm shadow-md hover:shadow-lg transition-all hover:scale-[1.02]"
                    style="background: linear-gradient(135deg, #f751a1, #5b21b6);">
                    <span>Start Your Free Trial</span>
                    <i class="ri-arrow-right-line"></i>
                </a>
            </div>
        </div>
    </section>
    --}}

    {{-- ─── 4. PLATFORM FEATURES (Bento) ──────────────────────── --}}
    <section id="solutions" class="max-w-[1200px] mx-auto px-5 md:px-6 py-24 border-t border-white/5">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full glass-card border border-white/10 text-xs font-bold text-primary mb-4">
                <i class="ri-sparkles-fill text-primary-container"></i> THE LINKINGROAD PLATFORM
            </div>
            <h2 class="font-bold text-4xl sm:text-5xl text-on-surface mb-4">Everything you need to automate & grow</h2>
            <p class="text-on-surface-variant text-base">Engineered for Instagram & Facebook creators, brands, and agencies.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5 md:gap-6 mb-5 md:mb-6">
            {{-- Comment-to-DM --}}
            <div class="sm:col-span-2 md:col-span-2 bento-card glass-card rounded-3xl p-6 md:p-8 flex flex-col justify-between min-h-[260px] md:h-[320px]">
                <div>
                    <i class="ri-chat-3-fill text-3xl text-primary mb-4 block"></i>
                    <span class="text-[11px] uppercase tracking-wider font-bold text-primary px-3 py-1 rounded-full mb-3 inline-block" style="background:rgba(247,81,161,0.1);">Core Feature</span>
                    <h3 class="font-bold text-xl text-on-surface mb-3">Comment-to-DM Automations</h3>
                    <p class="text-on-surface-variant text-sm leading-relaxed">Automatically sends DMs or lead magnets when users comment specific keywords on Instagram Reels, posts, or stories. Boost reach by 400% overnight.</p>
                </div>
                <div class="text-[11px] font-bold text-primary flex items-center gap-1.5 pt-4 border-t border-white/5">
                    <i class="ri-flashlight-fill"></i> Instantly converts comment traffic
                </div>
            </div>

            {{-- Stat --}}
            <div class="sm:col-span-2 md:col-span-1 bento-card glass-card rounded-3xl p-6 md:p-8 min-h-[200px] md:h-[320px] flex flex-col justify-center text-center" style="background:linear-gradient(135deg,rgba(247,81,161,0.08) 0%,transparent 100%);">
                <div class="text-5xl font-bold gradient-text mb-2">99.9%</div>
                <p class="text-sm font-semibold text-on-surface-variant">Uptime & Reliability</p>
            </div>

            {{-- Visual Workflow --}}
            <div class="bento-card glass-card rounded-3xl p-6 md:p-8 min-h-[260px] md:h-[320px] flex flex-col justify-between">
                <div>
                    <i class="ri-bar-chart-box-fill text-3xl text-secondary mb-4 block"></i>
                    <span class="text-[11px] uppercase tracking-wider font-bold text-secondary px-3 py-1 rounded-full mb-3 inline-block" style="background:rgba(211,187,255,0.1);">No-Code Canvas</span>
                    <h3 class="font-bold text-xl text-on-surface mb-3">Visual Workflow Builder</h3>
                    <p class="text-on-surface-variant text-sm leading-relaxed">Drag-and-drop canvas to build custom automation workflows without writing a single line of code.</p>
                </div>
                <div class="text-[11px] font-bold text-secondary flex items-center gap-1.5 pt-4 border-t border-white/5">
                    <i class="ri-magic-fill"></i> Drag, drop & launch in minutes
                </div>
            </div>

            {{-- Unified AI Inbox --}}
            <div class="sm:col-span-2 md:col-span-2 bento-card glass-card rounded-3xl p-6 md:p-8 min-h-[240px] md:h-[320px] relative overflow-hidden flex flex-col justify-end">
                <div class="absolute top-6 right-6 text-on-surface-variant/10">
                    <i class="ri-robot-2-fill text-8xl"></i>
                </div>
                <div>
                    <span class="text-[11px] uppercase tracking-wider font-bold text-tertiary px-3 py-1 rounded-full mb-3 inline-block" style="background:rgba(196,193,251,0.1);">24/7 AI Agent</span>
                    <h3 class="font-bold text-xl text-on-surface mb-2">Unified AI Inbox</h3>
                    <p class="text-on-surface-variant text-sm leading-relaxed max-w-lg">Routes messages, automates follow-ups, handles customer service from a single dashboard. Define goals AI builds the optimal path.</p>
                </div>
            </div>
        </div>

        {{-- Platform compliance --}}
        <div class="bento-card glass-card rounded-3xl p-8 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
            <div>
                <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-4 text-2xl text-green-400" style="background:rgba(34,197,94,0.15); border:1px solid rgba(34,197,94,0.25);">
                    <i class="ri-shield-check-fill"></i>
                </div>
                <span class="text-[11px] uppercase tracking-wider font-bold text-green-400 px-3 py-1 rounded-full mb-2 inline-block" style="background:rgba(34,197,94,0.1);">Meta Approved</span>
                <h3 class="font-bold text-xl text-on-surface mb-2">Platform Compliance</h3>
                <p class="text-on-surface-variant text-sm max-w-xl">Operates using official APIs. Zero risk of account bans or shadowbans.</p>
            </div>
            <div class="glass-card p-4 rounded-2xl text-xs font-mono font-bold flex flex-col gap-2 shrink-0" style="border:1px solid rgba(34,197,94,0.2);">
                <span class="flex items-center gap-1.5 text-green-400"><i class="ri-checkbox-circle-fill"></i> Official Instagram Graph API</span>
                <span class="flex items-center gap-1.5 text-green-400"><i class="ri-checkbox-circle-fill"></i> Official Messenger API</span>
                <span class="flex items-center gap-1.5 text-green-400"><i class="ri-checkbox-circle-fill"></i> Intelligent Rate Pacing</span>
            </div>
        </div>
    </section>

    {{-- ─── 5. AI INBOX SIMULATOR ─────────────────────────────── --}}
   

    {{-- ─── 6. CASE STUDIES ───────────────────────────────────── --}}
    <section id="case-studies" class="max-w-[1200px] mx-auto px-5 md:px-6 py-24 border-t border-white/5">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full glass-card border border-white/10 text-xs font-bold text-primary mb-4">
                <i class="ri-trophy-fill text-primary-container"></i> CASE STUDIES
            </div>
            <h2 class="font-bold text-4xl sm:text-5xl text-on-surface mb-4">Proven by Top Brands</h2>
            <p class="text-on-surface-variant text-base">See how creators and brands transform engagement using LINKINGROAD.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bento-card glass-card rounded-3xl p-8 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="font-bold text-on-surface text-sm flex items-center gap-1.5">
                            <i class="ri-sparkles-fill text-primary"></i> Lumina Cosmetics
                        </span>
                        <span class="glass-card border border-white/10 text-on-surface-variant font-bold text-xs px-3 py-1 rounded-full">450% DM Increase</span>
                    </div>
                    <h3 class="font-bold text-xl text-on-surface mb-3">Turning Instagram Comments into a $2M Revenue Channel</h3>
                    <p class="text-on-surface-variant text-xs leading-relaxed mb-6">Lumina used Comment-to-DM triggers to automatically send personalized quizzes to followers.</p>
                </div>
                <a href="#solutions" class="text-xs font-bold text-primary hover:underline flex items-center gap-1">
                    Read full story <i class="ri-arrow-right-line"></i>
                </a>
            </div>
            <div class="bento-card glass-card rounded-3xl p-8 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="font-bold text-on-surface text-sm flex items-center gap-1.5">
                            <i class="ri-graduation-cap-fill text-secondary"></i> Creator Academy
                        </span>
                        <span class="glass-card border border-white/10 text-on-surface-variant font-bold text-xs px-3 py-1 rounded-full">25K+ Leads</span>
                    </div>
                    <h3 class="font-bold text-xl text-on-surface mb-3">Automating Webinar Registrations at Scale</h3>
                    <p class="text-on-surface-variant text-xs leading-relaxed mb-6">Creator Academy replaced manual lead collection with automated DM funnels in 30 days.</p>
                </div>
                <a href="#solutions" class="text-xs font-bold text-secondary hover:underline flex items-center gap-1">
                    Read full story <i class="ri-arrow-right-line"></i>
                </a>
            </div>
            <div class="bento-card glass-card rounded-3xl p-8 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="font-bold text-on-surface text-sm flex items-center gap-1.5">
                            <i class="ri-store-2-fill text-tertiary"></i> FitLife Apparel
                        </span>
                        <span class="glass-card border border-white/10 text-on-surface-variant font-bold text-xs px-3 py-1 rounded-full">12hrs Saved/Week</span>
                    </div>
                    <h3 class="font-bold text-xl text-on-surface mb-3">Scaling Customer Support with Smart Auto-Replies</h3>
                    <p class="text-on-surface-variant text-xs leading-relaxed mb-6">FitLife automated repetitive support questions and reduced response time by 90%.</p>
                </div>
                <a href="#solutions" class="text-xs font-bold text-tertiary hover:underline flex items-center gap-1">
                    Read full story <i class="ri-arrow-right-line"></i>
                </a>
            </div>
        </div>
    </section>

  


 

</div>