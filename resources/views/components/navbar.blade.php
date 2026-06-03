<nav class="sticky top-0 z-50 border-b border-white/20 bg-white/70 backdrop-blur-xl">
    <div class="mx-auto max-w-7xl px-6">

        <div class="flex h-16 items-center justify-between">

            <a href="/" class="flex items-center gap-3">

                @if ($siteSettings?->logo)
                    <img src="{{ asset('storage/' . $siteSettings->logo) }}" alt="{{ $siteSettings->site_name }}"
                        class="h-11 w-auto rounded-lg">
                @endif

                <div class="leading-tight">

                    <div
                        class="
    text-lg
    font-bold
    tracking-tight
    bg-gradient-to-r
    from-blue-600
    to-cyan-500
    bg-clip-text
    text-transparent
    ">
                        {{ $siteSettings?->site_name ?? 'Ryzent' }}
                    </div>

                    @if ($siteSettings?->tagline)
                        <div
                            class="
                text-xs
                font-medium
                uppercase
                tracking-wider
                text-slate-500
                ">
                            {{ $siteSettings->tagline }}
                        </div>
                    @endif

                </div>

            </a>

            <div class="hidden md:flex items-center gap-8">

                <a href="/" class="text-slate-600 hover:text-blue-600">
                    Home
                </a>

                <a href="{{ route('services.index') }}" class="text-slate-600 hover:text-blue-600">
                    Services
                </a>

                <a href="/portfolio" class="text-slate-600 hover:text-blue-600">
                    Portfolio
                </a>

                <a href="/blog" class="text-slate-600 hover:text-blue-600">
                    Blog
                </a>

                <a href="#contact" class="text-slate-600 hover:text-blue-600">
                    Contact
                </a>

            </div>

            <a href="https://wa.me/{{ $siteSettings?->whatsapp }}" target="_blank"
                class="rounded-xl bg-gradient-to-r from-blue-500 to-cyan-500 px-5 py-2 text-white shadow-lg shadow-blue-500/20 transition hover:scale-105">
                Konsultasi Gratis
            </a>

        </div>

    </div>
</nav>
