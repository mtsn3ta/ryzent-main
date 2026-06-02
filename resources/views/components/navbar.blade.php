<nav class="sticky top-0 z-50 border-b border-white/20 bg-white/70 backdrop-blur-xl">
    <div class="mx-auto max-w-7xl px-6">

        <div class="flex h-16 items-center justify-between">

            <a href="/" class="text-xl font-bold">
                Ry<span class="text-blue-500">zent</span>
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

                <a href="/contact" class="text-slate-600 hover:text-blue-600">
                    Contact
                </a>

            </div>

            <a
                href="/contact"
                class="rounded-xl bg-gradient-to-r from-blue-500 to-cyan-500 px-5 py-2 text-white shadow-lg shadow-blue-500/20 transition hover:scale-105">
                Konsultasi Gratis
            </a>

        </div>

    </div>
</nav>