<nav x-data="{ mobileMenuOpen: false }" class="sticky top-0 z-50 border-b border-slate-100 bg-white/80 backdrop-blur-xl">
    <div class="mx-auto max-w-7xl px-6">
        <div class="flex h-18 items-center justify-between">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                @if ($siteSettings?->logo)
                    <img src="{{ asset('storage/' . $siteSettings->logo) }}" alt="{{ $siteSettings->site_name }}"
                        class="h-10 w-auto rounded-lg">
                @else
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-linear-to-tr from-blue-600 to-cyan-500 font-bold text-white shadow-md shadow-blue-500/20">
                        R
                    </div>
                @endif

                <div class="leading-tight">
                    <div class="text-xl font-bold tracking-tight bg-linear-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent">
                        {{ $siteSettings?->site_name ?? 'Ryzent' }}
                    </div>
                    @if ($siteSettings?->tagline)
                        <div class="text-[11px] font-medium uppercase tracking-wider text-slate-500">
                            {{ $siteSettings->tagline }}
                        </div>
                    @endif
                </div>
            </a>

            {{-- Desktop Navigation --}}
            <div class="hidden md:flex items-center gap-8 text-sm font-medium">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-blue-600 font-semibold' : 'text-slate-600 hover:text-blue-600' }} transition">
                    Home
                </a>

                <a href="{{ route('services.index') }}" class="{{ request()->routeIs('services.*') ? 'text-blue-600 font-semibold' : 'text-slate-600 hover:text-blue-600' }} transition">
                    Services
                </a>

                <a href="{{ route('portfolio.index') }}" class="{{ request()->routeIs('portfolio.*') ? 'text-blue-600 font-semibold' : 'text-slate-600 hover:text-blue-600' }} transition">
                    Portfolio
                </a>

                <a href="{{ route('blog.index') }}" class="{{ request()->routeIs('blog.*') ? 'text-blue-600 font-semibold' : 'text-slate-600 hover:text-blue-600' }} transition">
                    Blog
                </a>

                <a href="{{ request()->routeIs('home') ? '#contact' : url('/#contact') }}" class="text-slate-600 hover:text-blue-600 transition">
                    Contact
                </a>
            </div>

            {{-- Desktop CTA --}}
            <div class="hidden md:flex items-center gap-4">
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

            {{-- Mobile Hamburger Button --}}
            <div class="flex md:hidden">
                <button type="button"
                        @click="mobileMenuOpen = !mobileMenuOpen"
                        aria-label="Toggle navigation menu"
                        class="inline-flex items-center justify-center rounded-xl p-2.5 text-slate-700 hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
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
         class="md:hidden border-b border-slate-200 bg-white/95 px-6 pt-3 pb-6 shadow-xl backdrop-blur-2xl">
        <div class="flex flex-col space-y-3 font-medium text-slate-700">
            <a href="{{ route('home') }}" @click="mobileMenuOpen = false"
               class="rounded-xl px-4 py-2.5 hover:bg-blue-50 hover:text-blue-600 transition {{ request()->routeIs('home') ? 'bg-blue-50 text-blue-600 font-semibold' : '' }}">
                Home
            </a>
            <a href="{{ route('services.index') }}" @click="mobileMenuOpen = false"
               class="rounded-xl px-4 py-2.5 hover:bg-blue-50 hover:text-blue-600 transition {{ request()->routeIs('services.*') ? 'bg-blue-50 text-blue-600 font-semibold' : '' }}">
                Services
            </a>
            <a href="{{ route('portfolio.index') }}" @click="mobileMenuOpen = false"
               class="rounded-xl px-4 py-2.5 hover:bg-blue-50 hover:text-blue-600 transition {{ request()->routeIs('portfolio.*') ? 'bg-blue-50 text-blue-600 font-semibold' : '' }}">
                Portfolio
            </a>
            <a href="{{ route('blog.index') }}" @click="mobileMenuOpen = false"
               class="rounded-xl px-4 py-2.5 hover:bg-blue-50 hover:text-blue-600 transition {{ request()->routeIs('blog.*') ? 'bg-blue-50 text-blue-600 font-semibold' : '' }}">
                Blog
            </a>
            <a href="{{ request()->routeIs('home') ? '#contact' : url('/#contact') }}" @click="mobileMenuOpen = false"
               class="rounded-xl px-4 py-2.5 hover:bg-blue-50 hover:text-blue-600 transition">
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
