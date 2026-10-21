<nav x-data="{
        mobileMenuOpen: false,
        isDark: document.documentElement.classList.contains('dark'),
        toggleTheme() {
            this.isDark = !this.isDark;
            if (this.isDark) {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            }
        }
    }"
    class="sticky top-0 z-50 border-b border-slate-100 bg-white/80 backdrop-blur-xl dark:border-slate-800/80 dark:bg-slate-950/80 transition-colors duration-200">
    <div class="mx-auto max-w-7xl px-6">
        <div class="flex h-18 items-center justify-between">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                @if ($siteSettings?->logo)
                    <img src="{{ asset('storage/' . $siteSettings->logo) }}" alt="{{ $siteSettings->site_name }}"
                        width="40" height="40" fetchpriority="high"
                        class="h-10 w-auto rounded-lg">
                @else
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-linear-to-tr from-blue-600 to-cyan-500 font-bold text-white shadow-md shadow-blue-500/20">
                        R
                    </div>
                @endif

                <div class="leading-tight">
                    <div class="text-xl font-bold tracking-tight bg-linear-to-r from-blue-600 to-cyan-500 dark:from-blue-400 dark:to-cyan-300 bg-clip-text text-transparent">
                        {{ $siteSettings?->site_name ?? 'Ryzent' }}
                    </div>
                    @if ($siteSettings?->tagline)
                        <div class="text-[11px] font-medium uppercase tracking-wider text-slate-500 dark:text-slate-400">
                            {{ $siteSettings->tagline }}
                        </div>
                    @endif
                </div>
            </a>

            {{-- Desktop Navigation --}}
            <div class="hidden md:flex items-center gap-7 text-sm font-medium">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-blue-600 dark:text-cyan-400 font-semibold' : 'text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-cyan-400' }} transition">
                    Home
                </a>

                <a href="{{ route('services.index') }}" class="{{ request()->routeIs('services.*') ? 'text-blue-600 dark:text-cyan-400 font-semibold' : 'text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-cyan-400' }} transition">
                    Services
                </a>

                <a href="{{ request()->routeIs('home') ? '#ecosystem' : url('/#ecosystem') }}" class="text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-cyan-400 transition">
                    Ekosistem
                </a>

                <a href="{{ request()->routeIs('home') ? '#estimator' : url('/#estimator') }}" class="text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-cyan-400 transition flex items-center gap-1.5">
                    <span>Estimator</span>
                    <span class="rounded-full bg-cyan-100 dark:bg-cyan-900/60 px-2 py-0.5 text-[10px] font-semibold text-cyan-700 dark:text-cyan-300">Biaya</span>
                </a>

                <a href="{{ route('portfolio.index') }}" class="{{ request()->routeIs('portfolio.*') ? 'text-blue-600 dark:text-cyan-400 font-semibold' : 'text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-cyan-400' }} transition">
                    Portfolio
                </a>

                <a href="{{ route('blog.index') }}" class="{{ request()->routeIs('blog.*') ? 'text-blue-600 dark:text-cyan-400 font-semibold' : 'text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-cyan-400' }} transition">
                    Blog
                </a>

                <a href="{{ request()->routeIs('home') ? '#contact' : url('/#contact') }}" class="text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-cyan-400 transition">
                    Contact
                </a>
            </div>

            {{-- Desktop Actions & Dark Mode Toggle --}}
            <div class="hidden md:flex items-center gap-3">
                {{-- Theme Switcher Button --}}
                <button type="button"
                        @click="toggleTheme()"
                        aria-label="Toggle dark/light mode"
                        class="flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 bg-white/70 text-slate-700 shadow-sm backdrop-blur-md transition hover:bg-slate-100 dark:border-slate-800 dark:bg-slate-900 dark:text-slate-300 dark:hover:bg-slate-800">
                    <template x-if="!isDark">
                        <svg class="h-5 w-5 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </template>
                    <template x-if="isDark">
                        <svg class="h-5 w-5 text-cyan-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                    </template>
                </button>

                {{-- CTA Button --}}
                @if($siteSettings?->whatsapp)
                    @php $cleanPhone = preg_replace('/[^0-9]/', '', $siteSettings->whatsapp); @endphp
                    <a href="https://wa.me/{{ $cleanPhone }}?text={{ rawurlencode('Halo Ryzent, saya ingin berkonsultasi mengenai proyek...') }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="rounded-xl bg-linear-to-r from-blue-600 to-cyan-500 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-blue-500/20 transition hover:scale-105 hover:shadow-cyan-500/20">
                        Konsultasi Gratis
                    </a>
                @else
                    <a href="{{ request()->routeIs('home') ? '#contact' : url('/#contact') }}"
                       class="rounded-xl bg-linear-to-r from-blue-600 to-cyan-500 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-blue-500/20 transition hover:scale-105">
                        Hubungi Kami
                    </a>
                @endif
            </div>

            {{-- Mobile Buttons (Theme Toggle + Hamburger) --}}
            <div class="flex items-center gap-2 md:hidden">
                <button type="button"
                        @click="toggleTheme()"
                        aria-label="Toggle dark mode"
                        class="flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 bg-white/70 text-slate-700 shadow-sm transition hover:bg-slate-100 dark:border-slate-800 dark:bg-slate-900 dark:text-slate-300">
                    <template x-if="!isDark">
                        <svg class="h-5 w-5 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </template>
                    <template x-if="isDark">
                        <svg class="h-5 w-5 text-cyan-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                    </template>
                </button>

                <button type="button"
                        @click="mobileMenuOpen = !mobileMenuOpen"
                        aria-label="Toggle navigation menu"
                        :aria-expanded="mobileMenuOpen.toString()"
                        class="inline-flex items-center justify-center rounded-xl p-2.5 text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <svg x-show="!mobileMenuOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="mobileMenuOpen" x-cloak class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    {{-- Mobile Menu Drawer --}}
    <div x-show="mobileMenuOpen"
         x-cloak
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         @click.away="mobileMenuOpen = false"
         class="md:hidden border-b border-slate-200 bg-white/95 px-6 pt-3 pb-6 shadow-xl backdrop-blur-2xl dark:border-slate-800 dark:bg-slate-900/95">
        <div class="flex flex-col space-y-3 font-medium text-slate-700 dark:text-slate-200">
            <a href="{{ route('home') }}" @click="mobileMenuOpen = false"
               class="rounded-xl px-4 py-2.5 hover:bg-blue-50 dark:hover:bg-slate-800 hover:text-blue-600 dark:hover:text-cyan-400 transition {{ request()->routeIs('home') ? 'bg-blue-50 dark:bg-slate-800 text-blue-600 dark:text-cyan-400 font-semibold' : '' }}">
                Home
            </a>
            <a href="{{ route('services.index') }}" @click="mobileMenuOpen = false"
               class="rounded-xl px-4 py-2.5 hover:bg-blue-50 dark:hover:bg-slate-800 hover:text-blue-600 dark:hover:text-cyan-400 transition {{ request()->routeIs('services.*') ? 'bg-blue-50 dark:bg-slate-800 text-blue-600 dark:text-cyan-400 font-semibold' : '' }}">
                Services
            </a>
            <a href="{{ request()->routeIs('home') ? '#ecosystem' : url('/#ecosystem') }}" @click="mobileMenuOpen = false"
               class="rounded-xl px-4 py-2.5 hover:bg-blue-50 dark:hover:bg-slate-800 hover:text-blue-600 dark:hover:text-cyan-400 transition">
                Ekosistem SaaS (NEST)
            </a>
            <a href="{{ request()->routeIs('home') ? '#estimator' : url('/#estimator') }}" @click="mobileMenuOpen = false"
               class="rounded-xl px-4 py-2.5 hover:bg-blue-50 dark:hover:bg-slate-800 hover:text-blue-600 dark:hover:text-cyan-400 transition flex items-center justify-between">
                <span>Kalkulator Estimasi Biaya</span>
                <span class="rounded-full bg-cyan-100 dark:bg-cyan-900/60 px-2 py-0.5 text-[10px] font-semibold text-cyan-700 dark:text-cyan-300">Interaktif</span>
            </a>
            <a href="{{ route('portfolio.index') }}" @click="mobileMenuOpen = false"
               class="rounded-xl px-4 py-2.5 hover:bg-blue-50 dark:hover:bg-slate-800 hover:text-blue-600 dark:hover:text-cyan-400 transition {{ request()->routeIs('portfolio.*') ? 'bg-blue-50 dark:bg-slate-800 text-blue-600 dark:text-cyan-400 font-semibold' : '' }}">
                Portfolio
            </a>
            <a href="{{ route('blog.index') }}" @click="mobileMenuOpen = false"
               class="rounded-xl px-4 py-2.5 hover:bg-blue-50 dark:hover:bg-slate-800 hover:text-blue-600 dark:hover:text-cyan-400 transition {{ request()->routeIs('blog.*') ? 'bg-blue-50 dark:bg-slate-800 text-blue-600 dark:text-cyan-400 font-semibold' : '' }}">
                Blog
            </a>
            <a href="{{ request()->routeIs('home') ? '#contact' : url('/#contact') }}" @click="mobileMenuOpen = false"
               class="rounded-xl px-4 py-2.5 hover:bg-blue-50 dark:hover:bg-slate-800 hover:text-blue-600 dark:hover:text-cyan-400 transition">
                Contact
            </a>

            <div class="pt-2">
                @if($siteSettings?->whatsapp)
                    @php $cleanPhone = preg_replace('/[^0-9]/', '', $siteSettings->whatsapp); @endphp
                    <a href="https://wa.me/{{ $cleanPhone }}?text={{ rawurlencode('Halo Ryzent, saya ingin berkonsultasi mengenai proyek...') }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="block w-full text-center rounded-xl bg-linear-to-r from-blue-600 to-cyan-500 py-3 text-sm font-semibold text-white shadow-lg shadow-blue-500/20">
                        Konsultasi Gratis
                    </a>
                @else
                    <a href="{{ url('/#contact') }}" @click="mobileMenuOpen = false"
                       class="block w-full text-center rounded-xl bg-linear-to-r from-blue-600 to-cyan-500 py-3 text-sm font-semibold text-white shadow-lg shadow-blue-500/20">
                        Hubungi Kami
                    </a>
                @endif
            </div>
        </div>
    </div>
</nav>
