{{-- ═══════════════════════════════════════════════════════════
     LINKINGROAD Home Page (dark Material Design theme)
     Livewire component: home.php
═══════════════════════════════════════════════════════════ --}}

<div class="w-full relative z-10">

    {{-- ─── 1. HERO ──────────────────────────────────────────── --}}
    <section  class="max-w-[1200px] mx-auto px-5 md:px-6 text-center pt-28 sm:pt-32 pb-16 sm:pb-24">

        {{-- Badge --}}
        <div class="inline-flex mt-6 items-center gap-2 px-4 py-1.5 rounded-full glass-card mb-8 animate-fade-in">
            <span class="w-2 h-2 rounded-full bg-primary-container animate-pulse"></span>
            <span class="text-xs font-bold text-primary tracking-widest uppercase">🚀 Coming Soon</span>
        </div>

        {{-- Headline --}}
        <h1 id="waitlist" class="font-bold text-3xl sm:text-5xl lg:text-[72px] tracking-[-0.04em] leading-[1.1] mb-5 sm:mb-6 max-w-4xl mx-auto text-on-surface">
            The Future of Social <br />
            <span class="gradient-text italic inline-block pr-2 pb-1">Automation is Here</span>
        </h1>

        {{-- Sub-headline --}}
        <p class="text-base sm:text-lg text-on-surface-variant max-w-2xl mx-auto leading-relaxed mb-8 sm:mb-12">
            We're putting the finishing touches on something big. LINKINGROAD is an AI-powered platform that turns every Instagram & Facebook comment into real revenue automatically. Be the first to experience it.
        </p>

        {{-- Waitlist form --}}
        <div  class="max-w-md mx-auto mb-6">
            @if($subscribed)
            <div class="p-5 rounded-2xl glass-card border border-white/10 text-sm font-bold flex items-center justify-center gap-3 animate-fade-in">
                <i class="ri-checkbox-circle-fill text-green-400 text-2xl"></i>
                <span class="text-on-surface">🎉 You're on the early access list! We'll notify you at launch.</span>
            </div>
            @else
            <form wire:submit.prevent="subscribe"
                class="flex flex-col sm:flex-row gap-2 p-2 rounded-2xl glass-card border border-white/10 shadow-2xl">
                <div  class="relative flex-grow">
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


</div>