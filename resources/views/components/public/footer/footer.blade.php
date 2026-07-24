<footer class="w-full border-t border-white/5 bg-surface/80 backdrop-blur-sm mt-20">
    <div class="max-w-[1200px] mx-auto px-5 md:px-8 py-8 flex flex-col sm:flex-row items-center justify-between gap-4">

        <img
            src="{{ asset('logo.png') }}"
            alt="LINKINGROAD"
            class="h-7 w-auto opacity-80 hover:opacity-100 transition-opacity"
        />

        <p class="text-xs text-on-surface-variant/50 text-center">
            © {{ date('Y') }} LINKINGROAD. All rights reserved.
        </p>

        <p class="text-xs text-on-surface-variant/30 flex items-center gap-1.5">
            <i class="ri-shield-check-fill text-green-400/60"></i>
            Built on official Meta APIs.
        </p>

    </div>
</footer>