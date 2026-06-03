<footer class="
    relative
    overflow-hidden
    bg-slate-950
    text-slate-300
    ">
    <div
        class="
    absolute
    left-0
    top-0
    h-72
    w-72
    rounded-full
    bg-blue-500/10
    blur-[120px]
    ">
    </div>

    <div
        class="
    absolute
    right-0
    bottom-0
    h-72
    w-72
    rounded-full
    bg-cyan-500/10
    blur-[120px]
    ">
    </div>
    <div class="relative max-w-7xl mx-auto px-6 py-20">
        <div class="grid gap-12 md:grid-cols-2 lg:grid-cols-4">
            <div class="flex items-center gap-3">

                @if ($siteSettings?->logo)
                    <img src="{{ asset('storage/' . $siteSettings->logo) }}" alt="{{ $siteSettings->site_name }}"
                        class="h-10 w-auto">
                @endif

                <div>
                    <h3
                        class="
    text-xl
    font-bold
    bg-gradient-to-r
    from-white
    to-cyan-300
    bg-clip-text
    text-transparent
    ">
                        {{ $siteSettings?->site_name ?? 'Ryzent' }}
                    </h3>

                    @if ($siteSettings?->tagline)
                        <p class="text-sm text-slate-400">
                            {{ $siteSettings?->tagline }}
                        </p>
                    @endif
                </div>

            </div>
            <div>

                <h4 class="font-semibold text-white">
                    Navigation
                </h4>

                <ul class="mt-4 space-y-3">

                    <li>
                        <a href="/">Home</a>
                    </li>

                    <li>
                        <a href="#services">Services</a>
                    </li>

                    <li>
                        <a href="#portfolio">Portfolio</a>
                    </li>

                    <li>
                        <a href="#blog">Blog</a>
                    </li>

                </ul>

            </div>
            <div>

                <h4 class="font-semibold text-white">
                    Contact
                </h4>

                <ul class="mt-4 space-y-3 text-slate-300">

                    @if ($siteSettings?->email)
                        <li>
                            {{ $siteSettings->email }}
                        </li>
                    @endif

                    @if ($siteSettings?->phone)
                        <li>
                            {{ $siteSettings->phone }}
                        </li>
                    @endif

                    @if ($siteSettings?->address)
                        <li>
                            {{ $siteSettings->address }}
                        </li>
                    @endif

                </ul>

            </div>

        </div>
        <div class="
    mt-16
    border-t
    border-slate-800
    pt-8
    ">
            <div
                class="
    flex
    flex-col
    items-center
    justify-between
    gap-4
    text-sm
    text-slate-500
    md:flex-row
    ">

                <p>
                    © {{ date('Y') }}
                    {{ $siteSettings?->site_name ?? 'Ryzent' }}.
                    All rights reserved.
                </p>

                <p>
                    Built with Laravel & Filament
                </p>

            </div>
        </div>
</footer>
