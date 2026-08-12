<div class="w-full">
    <div class="glass-card rounded-2xl border border-white/10 p-8 shadow-2xl relative overflow-hidden">
        <!-- Accent light source on card -->
        <div class="absolute -top-10 -right-10 w-24 h-24 bg-primary/20 rounded-full blur-2xl pointer-events-none"></div>
        <div class="absolute -bottom-10 -left-10 w-24 h-24 bg-secondary/20 rounded-full blur-2xl pointer-events-none"></div>

        <div class="text-center mb-8 relative">
            <h2 class="text-2xl font-bold text-on-surface tracking-tight">Welcome back</h2>
            <p class="text-xs text-on-surface-variant/70 mt-1.5">Sign in to manage your AI social automations</p>
        </div>

        <form wire:submit="login" class="space-y-5 relative">
            <!-- Email Field -->
            <div>
                <label for="email" class="block text-xs font-semibold text-on-surface-variant/90 mb-2">
                    Email Address
                </label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-on-surface-variant/50">
                        <i class="ri-mail-line text-base"></i>
                    </span>
                    <input 
                        wire:model="email" 
                        type="email" 
                        id="email" 
                        placeholder="admin@linkingroad.com" 
                        class="w-full rounded-xl border @error('email') border-error focus:ring-error/50 focus:border-error @else border-white/10 focus:border-primary-container focus:ring-primary-container/20 @enderror bg-white/[0.02] py-3 pl-10 pr-4 text-sm text-on-surface placeholder:text-on-surface-variant/30 focus:bg-white/[0.05] focus:outline-none focus:ring-4 transition-all duration-200"
                        required
                        autocomplete="email"
                        autofocus
                    />
                </div>
                @error('email')
                    <span class="text-error text-xs mt-1.5 flex items-center gap-1">
                        <i class="ri-error-warning-line text-sm"></i>
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <!-- Password Field -->
            <div>
                <div class="flex items-center justify-between mb-2">
                    <label for="password" class="block text-xs font-semibold text-on-surface-variant/90">
                        Password
                    </label>
                </div>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-on-surface-variant/50">
                        <i class="ri-lock-line text-base"></i>
                    </span>
                    <input 
                        wire:model="password" 
                        type="password" 
                        id="password" 
                        placeholder="••••••••" 
                        class="w-full rounded-xl border @error('password') border-error focus:ring-error/50 focus:border-error @else border-white/10 focus:border-primary-container focus:ring-primary-container/20 @enderror bg-white/[0.02] py-3 pl-10 pr-4 text-sm text-on-surface placeholder:text-on-surface-variant/30 focus:bg-white/[0.05] focus:outline-none focus:ring-4 transition-all duration-200"
                        required
                        autocomplete="current-password"
                    />
                </div>
                @error('password')
                    <span class="text-error text-xs mt-1.5 flex items-center gap-1">
                        <i class="ri-error-warning-line text-sm"></i>
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between pt-1">
                <label class="flex items-center gap-2 cursor-pointer group select-none">
                    <input 
                        wire:model="remember" 
                        type="checkbox" 
                        class="rounded border-white/10 bg-white/[0.02] text-primary-container focus:ring-offset-background focus:ring-primary-container/30 h-4 w-4 transition-all"
                    />
                    <span class="text-xs text-on-surface-variant/70 group-hover:text-on-surface transition-colors">
                        Remember this device
                    </span>
                </label>
            </div>

            <!-- Submit Button -->
            <div class="pt-2">
                <button 
                    type="submit" 
                    wire:loading.attr="disabled"
                    class="w-full bg-primary-container hover:bg-primary-container/90 text-white font-bold py-3 px-4 rounded-xl shadow-lg focus:outline-none transition-all primary-glow hover:scale-[1.01] active:scale-[0.99] flex items-center justify-center gap-2 cursor-pointer disabled:opacity-70 disabled:cursor-not-allowed"
                >
                    <!-- Spinner when loading -->
                    <span wire:loading wire:target="login" class="inline-block animate-spin h-4 w-4 border-2 border-white border-t-transparent rounded-full mr-1"></span>
                    <span>Sign In</span>
                </button>
            </div>
        </form>
    </div>
</div>