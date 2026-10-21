@extends('layouts.app')

@section('content')
    <section class="relative overflow-hidden">
        <div
            class="absolute inset-0 -z-20
    bg-[linear-gradient(to_right,#f1f5f9_1px,transparent_1px),
    linear-gradient(to_bottom,#f1f5f9_1px,transparent_1px)]
    bg-size-[4rem_4rem]">
        </div>

<div class="absolute -left-40 top-10 -z-10 h-125 w-125
rounded-full bg-blue-500/15 blur-[120px]"></div>

<div class="absolute -right-40 top-20 -z-10 h-125 w-125
rounded-full bg-cyan-500/15 blur-[120px]"></div>
        <div class="max-w-7xl mx-auto px-6 py-24">

            <div class="grid lg:grid-cols-2 gap-16 items-center">

                {{-- LEFT --}}
                <div>

                    <span
                        class="
inline-flex
items-center
gap-2
rounded-full
border
border-blue-200
bg-white/80 dark:bg-slate-900/80
px-4
py-2
text-sm
font-medium
text-blue-700
backdrop-blur-md
">
                        <span class="h-2 w-2 rounded-full bg-cyan-500"></span>
                        Website • SaaS • AI Solutions
                    </span>

                    <h1 class="
mt-6
text-6xl
lg:text-7xl
font-bold
tracking-tight
leading-tight
text-slate-900
">
                        Membangun
                        <span class="bg-linear-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent">
                            Website
                        </span>,
                        SaaS, dan
                        <span class="bg-linear-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent">
                            Solusi AI
                        </span>
                    </h1>

                    <p class="mt-6 text-lg text-slate-600 dark:text-slate-300">
                        Ryzent membantu sekolah,
                        organisasi olahraga,
                        dan bisnis membangun
                        sistem digital modern
                        berbasis Laravel, AI,
                        dan Cloud Infrastructure.
                    </p>

                    <div class="mt-10 flex flex-wrap gap-4">

                        <a href="{{ route('portfolio.index') }}"
                            class="
        rounded-2xl
        bg-linear-to-r
        from-blue-600
        to-cyan-500
        px-7
        py-4
        font-medium
        text-white
        shadow-lg
        shadow-blue-500/20
        transition
        hover:scale-105
        ">
                            Lihat Portfolio
                        </a>

                        <a href="#contact"
                            class="
        rounded-2xl
        border
        border-slate-200
        bg-white/70 dark:bg-slate-900/80
        px-7
        py-4
        font-medium
        backdrop-blur-md
        transition
        hover:bg-white
        ">
                            Konsultasi Gratis
                        </a>

                    </div>

                </div>

                {{-- RIGHT --}}
                <div x-data="{
                    active: 0,
                    total: {{ max($portfolios->count(), 1) }}
                }" x-init="setInterval(() => {
                    active = (active + 1) % total
                }, 5000)" class="relative">

                    @foreach ($portfolios as $index => $portfolio)
                        <div x-show="active === {{ $index }}" x-transition:enter="transition ease-out duration-500"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            class="rounded-4xl border border-white/40 dark:border-slate-800 bg-white/70 dark:bg-slate-900/80 p-6 shadow-2xl backdrop-blur-xl">
                            <div
                                class="
    mb-4
    inline-flex
    items-center
    gap-2
    rounded-full
    bg-slate-100
    px-3
    py-1
    text-xs
    font-medium
    text-slate-600
    ">
                                🚀 Featured Project
                            </div>
                            <img src="{{ asset('storage/' . $portfolio->thumbnail) }}" alt="{{ $portfolio->title }}"
                                class="w-full rounded-2xl">

                            <div class="mt-5">

                                <div
                                    class="
        inline-flex
        rounded-full
        bg-blue-50
        px-3
        py-1
        text-xs
        font-medium
        text-blue-600
        ">
                                    {{ $portfolio->category }}
                                </div>

                                <h3 class="
        mt-3
        text-xl
        font-bold
        text-slate-900
        ">
                                    {{ $portfolio->title }}
                                </h3>

                            </div>

                        </div>
                    @endforeach

                    {{-- Dots --}}
                    <div class="mt-3 flex justify-center gap-2">

                        @foreach ($portfolios as $index => $portfolio)
                            <button @click="active = {{ $index }}"
                                :class="active === {{ $index }} ?
                                    'bg-blue-600' :
                                    'bg-slate-300'"
                                class="h-3 w-3 rounded-full transition"></button>
                        @endforeach

                    </div>

                </div>

            </div>

        </div>

    </section>

    @include('components.home.stats-and-tech')

    <section id="services" class="relative py-24">
        <div class="absolute inset-0 -z-10 bg-linear-to-b
    from-slate-50
    via-white
    to-slate-50"></div>

        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center">

                <div
                    class="
            mb-4
            inline-flex
            items-center
            rounded-full
            border
            border-blue-200
            bg-white/80 dark:bg-slate-900/80
            px-4
            py-2
            text-sm
            text-blue-700
            backdrop-blur-md
            ">
                    Layanan Ryzent
                </div>

                <h2
                    class="
            text-4xl
            lg:text-5xl
            font-bold
            tracking-tight
            text-slate-900
            ">
                    Layanan Kami
                </h2>

                <p class="mt-4 text-slate-600 dark:text-slate-300">
                    Solusi digital untuk sekolah,
                    organisasi, dan bisnis modern.
                </p>

            </div>

            <div class="mt-16 grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                @forelse($services as $service)
                    <div
                        class="
group
relative
overflow-hidden
rounded-[28px]
border
border-white/40 dark:border-slate-800
bg-white/70 dark:bg-slate-900/80
p-8
shadow-sm
backdrop-blur-xl
transition-all
duration-300
hover:-translate-y-3
hover:shadow-2xl
">
                        <div class="
mb-6
h-1.5
w-20
rounded-full
bg-linear-to-r
from-blue-600
to-cyan-500
">
                        </div>

                        <h3 class="
relative z-10
text-xl
font-bold
tracking-tight
text-slate-900
">
                            {{ $service->title }}
                        </h3>

                        <p class="relative z-10 mt-4 text-slate-600 dark:text-slate-300">
                            {{ $service->excerpt }}
                        </p>

                        <div class="relative z-10 mt-6">

                            <a href="{{ route('services.show', $service->slug) }}"
                                class="
    inline-flex
    items-center
    gap-2
    text-sm
    font-medium
    text-blue-600
    transition
    group-hover:gap-3
    ">
                                Pelajari Lebih Lanjut →
                            </a>

                        </div>

                        @if ($service->price_start)
                            <div class="relative z-10 mt-6 text-blue-600 font-bold">
                                Mulai Rp {{ number_format($service->price_start, 0, ',', '.') }}
                            </div>
                        @endif
                        <div
                            class="
absolute
inset-0
opacity-0
transition
duration-300
group-hover:opacity-100
bg-linear-to-br
from-blue-500/5
to-cyan-500/5
">
                        </div>

                    </div>

                @empty

                    <div class="col-span-3 text-center text-slate-500">
                        Belum ada layanan tersedia.
                    </div>
                @endforelse

            </div>

        </div>

    </section>

    @include('components.home.saas-ecosystem')

    <section id="portfolio" class="py-24">

        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center">

                <div
                    class="
        mb-4
        inline-flex
        items-center
        rounded-full
        border
        border-cyan-200
        bg-white/80 dark:bg-slate-900/80
        px-4
        py-2
        text-sm
        text-cyan-700
        backdrop-blur-md
        ">
                    Portfolio Ryzent
                </div>

                <h2
                    class="
        text-4xl
        lg:text-5xl
        font-bold
        tracking-tight
        text-slate-900
        ">
                    Featured Portfolio
                </h2>

                <p class="mt-4 text-slate-600 dark:text-slate-300">
                    Beberapa proyek yang telah kami bangun.
                </p>

            </div>

            <div class="mt-16 grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                @forelse($portfolios as $portfolio)
                    <div
                        class="
group
relative
overflow-hidden
rounded-4xl
border
border-white/40 dark:border-slate-800
bg-white/70 dark:bg-slate-900/80
shadow-sm
backdrop-blur-xl
transition-all
duration-300
hover:-translate-y-3
hover:shadow-2xl
">

                        @if ($portfolio->thumbnail)
                            <img src="{{ asset('storage/' . $portfolio->thumbnail) }}" alt="{{ $portfolio->title }}"
                                class="
        h-56
        w-full
        object-cover
        transition
        duration-700
        group-hover:scale-110
    ">
                            <div
                                class="
absolute
left-4
top-4
rounded-full
bg-white/90
px-3
py-1
text-xs
font-medium
text-slate-800
backdrop-blur-md
">
                                {{ $portfolio->category }}
                            </div>
                            <div
                                class="
absolute
inset-x-0
top-0
h-56
bg-linear-to-t
from-black/50
to-transparent
opacity-0
transition
duration-300
group-hover:opacity-100
">
                            </div>
                        @else
                            <div class="flex h-56 items-center justify-center bg-slate-100">
                                No Image
                            </div>
                        @endif

                        <div class="p-6">

                            <h3 class="relative z-10 mt-4 text-xl font-bold text-slate-900 dark:text-white">
                                {{ $portfolio->title }}
                            </h3>

                            <p class="relative z-10 mt-3 text-slate-600 dark:text-slate-300">
                                {{ $portfolio->excerpt }}
                            </p>

                            <div class="relative z-10 mt-6 flex items-center justify-between">

                                <span class="text-sm text-slate-500">
                                    {{ $portfolio->status }}
                                </span>

                                <a href="{{ route('portfolio.show', $portfolio->slug) }}"
                                    class="font-medium text-blue-600">
                                    Detail →
                                </a>

                            </div>
                            <div class="relative z-10 mt-6 flex gap-3">

                                @if ($portfolio->demo_url)
                                    <a href="{{ $portfolio->demo_url }}" target="_blank"
                                        class="
            rounded-xl
            bg-linear-to-r
            from-blue-600
            to-cyan-500
            px-4
            py-2
            text-sm
            font-medium
            text-white
            ">
                                        Live Demo
                                    </a>
                                @endif

                                @if ($portfolio->github_url)
                                    <a href="{{ $portfolio->github_url }}" target="_blank"
                                        class="
            rounded-xl
            border
            border-slate-200
            bg-white/70 dark:bg-slate-900/80
            px-4
            py-2
            text-sm
            font-medium
            ">
                                        GitHub
                                    </a>
                                @endif

                            </div>

                        </div>

                    </div>
                    <div
                        class="
absolute
inset-0
opacity-0
transition
duration-300
group-hover:opacity-100
bg-linear-to-br
from-blue-500/5
to-cyan-500/5
pointer-events-none
">
                    </div>

                @empty

                    <div class="col-span-3 text-center text-slate-500">
                        Belum ada portfolio.
                    </div>
                @endforelse

            </div>

        </div>

    </section>

    @include('components.home.cost-estimator')

    <section id="blog" class="py-24">

        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center">

                <div
                    class="
                mb-4
                inline-flex
                items-center
                rounded-full
                border
                border-blue-200
                bg-white/80 dark:bg-slate-900/80
                px-4
                py-2
                text-sm
                text-blue-700
                backdrop-blur-md
                ">
                    Blog Ryzent
                </div>

                <h2
                    class="
                text-4xl
                lg:text-5xl
                font-bold
                tracking-tight
                text-slate-900
                ">
                    Insight & Artikel Terbaru
                </h2>

                <p class="mt-4 text-slate-600 dark:text-slate-300">
                    Tips teknologi, AI, website, dan transformasi digital.
                </p>

            </div>
            <div class="mt-16 grid gap-8 md:grid-cols-2 lg:grid-cols-3">

                @forelse($posts as $post)
                    <article
                        class="
            group
            overflow-hidden
            rounded-[28px]
            border
            border-white/40 dark:border-slate-800
            bg-white/70 dark:bg-slate-900/80
            shadow-sm
            backdrop-blur-xl
            transition-all
            duration-300
            hover:-translate-y-2
            hover:shadow-2xl
            ">
                        @if ($post->featured_image ?? $post->thumbnail)
                            <img src="{{ asset('storage/' . ($post->featured_image ?? $post->thumbnail)) }}" alt="{{ $post->title }}"
                                class="
        h-56
        w-full
        object-cover
        transition
        duration-700
        group-hover:scale-105
        ">
                        @endif
                        <div class="p-6">

                            <div
                                class="
        inline-flex
        rounded-full
        bg-blue-50
        px-3
        py-1
        text-xs
        font-medium
        text-blue-600
        ">
                                {{ optional($post->category)->name ?? 'Artikel' }}
                            </div>

                            <h3 class="
        mt-4
        text-xl
        font-bold
        text-slate-900
        ">
                                {{ $post->title }}
                            </h3>

                            <p class="mt-3 text-slate-600 dark:text-slate-300">
                                {{ Str::limit(strip_tags($post->excerpt ?? ''), 120) }}
                            </p>

                            <div class="mt-6 flex items-center justify-between">

                                <span class="text-sm text-slate-500">
                                    {{ $post->created_at->format('d M Y') }}
                                </span>

                                <a href="{{ route('blog.show', $post->slug) }}" class="font-medium text-blue-600">
                                    Baca →
                                </a>

                            </div>

                        </div>

                    </article>

                @empty

                    <div class="col-span-3 text-center text-slate-500">
                        Belum ada artikel.
                    </div>
                @endforelse

            </div>
        </div>
    </section>

    <section class="relative py-24">

        <div
            class="
        absolute
        inset-0
        bg-linear-to-r
        from-blue-600
        via-blue-500
        to-cyan-500
        ">
        </div>

        <div class="relative max-w-5xl mx-auto px-6">

            <div
                class="
            overflow-hidden
            rounded-[40px]
            border
            border-white/20
            bg-white/10
            p-12
            text-center
            backdrop-blur-xl
            ">
                <div
                    class="
    inline-flex
    items-center
    rounded-full
    bg-white/20
    px-4
    py-2
    text-sm
    text-white
    ">
                    🚀 Konsultasi Gratis
                </div>
                <h2 class="
    mt-6
    text-4xl
    lg:text-6xl
    font-bold
    text-white
    ">
                    Siap Membangun
                    Sistem Digital Anda?
                </h2>
                <p class="
    mx-auto
    mt-6
    max-w-3xl
    text-lg
    text-blue-100
    ">
                    Ryzent membantu sekolah, organisasi olahraga,
                    UMKM, dan perusahaan membangun website,
                    SaaS, AI, serta sistem digital modern.
                </p>
                <div class="
    mt-8
    flex
    flex-wrap
    justify-center
    gap-4
    text-white
    ">

                    <span>✓ Website</span>
                    <span>✓ SaaS</span>
                    <span>✓ AI Solutions</span>
                    <span>✓ Cloud Infrastructure</span>

                </div>
                <div class="
    mt-10
    flex
    flex-wrap
    justify-center
    gap-4
    ">
                    <a href="https://wa.me/{{ $siteSettings?->whatsapp }}" target="_blank"
                        class="
    rounded-2xl
    bg-white
    px-8
    py-4
    font-semibold
    text-blue-600
    transition
    hover:scale-105
    ">
                        Konsultasi Gratis
                    </a>
                    <a href="https://wa.me/{{ $siteSettings?->whatsapp }}" target="_blank"
                        class="
    rounded-2xl
    border
    border-white/30
    bg-white/10
    px-8
    py-4
    font-semibold
    text-white
    backdrop-blur-md
    transition
    hover:bg-white/20
    ">
                        WhatsApp
                    </a>
                </div>

            </div>

        </div>

    </section>
    @include('components.home.testimonials')

    {{-- WORKFLOW SECTION --}}
    <section class="py-24 bg-slate-50/70 dark:bg-slate-900/30 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto">
                <div class="inline-flex items-center rounded-full border border-blue-200 bg-white px-4 py-2 text-sm font-medium text-blue-700 shadow-sm">
                    ⚡ Alur Kerja Profesional
                </div>
                <h2 class="mt-6 text-4xl lg:text-5xl font-bold tracking-tight text-slate-900 dark:text-white">
                    Bagaimana Kami Mewujudkan Sistem Digital Anda
                </h2>
                <p class="mt-4 text-lg text-slate-600 dark:text-slate-300">
                    Proses pengembangan terstruktur dari ide awal hingga siap digunakan oleh pengguna dan bisnis Anda.
                </p>
            </div>

            <div class="mt-16 grid gap-8 md:grid-cols-2 lg:grid-cols-4">
                <div class="relative rounded-3xl border border-slate-200/80 bg-white p-8 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-50 text-xl font-bold text-blue-600">
                        01
                    </div>
                    <h3 class="mt-6 text-xl font-bold text-slate-900 dark:text-white">Konsultasi & Blueprint</h3>
                    <p class="mt-3 text-sm text-slate-600 leading-relaxed">
                        Kami mendengarkan kebutuhan proses bisnis Anda, membedah alur sistem, dan merancang arsitektur data yang tepat.
                    </p>
                </div>

                <div class="relative rounded-3xl border border-slate-200/80 bg-white p-8 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-cyan-50 text-xl font-bold text-cyan-600">
                        02
                    </div>
                    <h3 class="mt-6 text-xl font-bold text-slate-900 dark:text-white">UI/UX & Prototipe</h3>
                    <p class="mt-3 text-sm text-slate-600 leading-relaxed">
                        Perancangan antarmuka visual modern, interaktif, dan mudah dipahami oleh staf, siswa, maupun konsumen Anda.
                    </p>
                </div>

                <div class="relative rounded-3xl border border-slate-200/80 bg-white p-8 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-indigo-50 text-xl font-bold text-indigo-600">
                        03
                    </div>
                    <h3 class="mt-6 text-xl font-bold text-slate-900 dark:text-white">Modern Development</h3>
                    <p class="mt-3 text-sm text-slate-600 leading-relaxed">
                        Koding cepat dan aman menggunakan ekosistem Laravel 13, Filament Admin, dan integrasi API AI modern.
                    </p>
                </div>

                <div class="relative rounded-3xl border border-slate-200/80 bg-white p-8 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-50 text-xl font-bold text-emerald-600">
                        04
                    </div>
                    <h3 class="mt-6 text-xl font-bold text-slate-900 dark:text-white">Deploy & Pemeliharaan</h3>
                    <p class="mt-3 text-sm text-slate-600 leading-relaxed">
                        Konfigurasi server cloud, deployment sistem bebas downtime, pelatihan penggunaan, serta garansi perbaikan bug.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ SECTION --}}
    <section class="py-24 relative overflow-hidden" x-data="{ activeFaq: null }">
        <div class="max-w-4xl mx-auto px-6">
            <div class="text-center">
                <div class="inline-flex items-center rounded-full border border-cyan-200 bg-white/80 dark:bg-slate-900/80 px-4 py-2 text-sm font-medium text-cyan-700 backdrop-blur-md">
                    💡 FAQ
                </div>
                <h2 class="mt-6 text-4xl font-bold tracking-tight text-slate-900 dark:text-white">
                    Pertanyaan Yang Sering Diajukan
                </h2>
                <p class="mt-4 text-slate-600 dark:text-slate-300">
                    Informasi penting seputar pengerjaan proyek dan layanan di Ryzent.
                </p>
            </div>

            <div class="mt-12 space-y-4">
                <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm transition">
                    <button type="button" @click="activeFaq = (activeFaq === 1 ? null : 1)"
                            class="flex w-full items-center justify-between text-left font-semibold text-slate-900 dark:text-white">
                        <span class="text-lg">Berapa lama estimasi waktu pengerjaan proyek di Ryzent?</span>
                        <svg class="h-5 w-5 text-slate-500 transition-transform duration-200" :class="{ 'rotate-180': activeFaq === 1 }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="activeFaq === 1" x-cloak class="mt-4 text-sm text-slate-600 leading-relaxed">
                        Waktu pengerjaan bervariasi sesuai kompleksitas sistem. Untuk landing page atau website profil instansi umumnya memakan waktu 1–2 minggu. Untuk sistem informasi terpadu, platform SaaS, atau solusi AI berkisar antara 3–6 minggu dengan timeline yang teratur.
                    </div>
                </div>

                <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm transition">
                    <button type="button" @click="activeFaq = (activeFaq === 2 ? null : 2)"
                            class="flex w-full items-center justify-between text-left font-semibold text-slate-900 dark:text-white">
                        <span class="text-lg">Apakah saya mendapatkan source code dan akses penuh ke server?</span>
                        <svg class="h-5 w-5 text-slate-500 transition-transform duration-200" :class="{ 'rotate-180': activeFaq === 2 }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="activeFaq === 2" x-cloak class="mt-4 text-sm text-slate-600 leading-relaxed">
                        Ya, 100%. Setelah serah terima proyek selesai, Anda akan menerima akses server cloud (VPS/cPanel), repositori source code git, serta kredensial administrator penuh tanpa keterikatan sewa lisensi tersembunyi.
                    </div>
                </div>

                <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm transition">
                    <button type="button" @click="activeFaq = (activeFaq === 3 ? null : 3)"
                            class="flex w-full items-center justify-between text-left font-semibold text-slate-900 dark:text-white">
                        <span class="text-lg">Apakah ada garansi pemeliharaan setelah sistem diluncurkan?</span>
                        <svg class="h-5 w-5 text-slate-500 transition-transform duration-200" :class="{ 'rotate-180': activeFaq === 3 }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="activeFaq === 3" x-cloak class="mt-4 text-sm text-slate-600 leading-relaxed">
                        Tentu saja. Ryzent memberikan garansi perbaikan bug dan pendampingan teknis gratis selama masa pemeliharaan (biasanya 1–3 bulan pertama) untuk memastikan sistem Anda beroperasi tanpa kendala.
                    </div>
                </div>

                <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm transition">
                    <button type="button" @click="activeFaq = (activeFaq === 4 ? null : 4)"
                            class="flex w-full items-center justify-between text-left font-semibold text-slate-900 dark:text-white">
                        <span class="text-lg">Teknologi apa saja yang digunakan oleh tim Ryzent?</span>
                        <svg class="h-5 w-5 text-slate-500 transition-transform duration-200" :class="{ 'rotate-180': activeFaq === 4 }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="activeFaq === 4" x-cloak class="mt-4 text-sm text-slate-600 leading-relaxed">
                        Kami fokus pada stack teknologi modern dan handal: backend Laravel 13 & PHP 8.3+, Filament Admin Panel v4, Tailwind CSS, Alpine.js, integrasi AI API (Gemini/OpenAI), serta deployment Linux Ubuntu VPS dengan Nginx & MySQL/MariaDB.
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CONTACT SECTION --}}
    <section id="contact" class="py-24">

        <div class="max-w-4xl mx-auto px-6">

            <div class="text-center">

                <div
                    class="
                inline-flex
                items-center
                rounded-full
                border
                border-cyan-200
                bg-white/80 dark:bg-slate-900/80
                px-4
                py-2
                text-sm
                text-cyan-700
                ">
                    Contact Ryzent
                </div>

                <h2
                    class="
                mt-6
                text-4xl
                font-bold
                text-slate-900
                ">
                    Mari Diskusikan Proyek Anda
                </h2>

                <p class="mt-4 text-slate-600 dark:text-slate-300">
                    Ceritakan kebutuhan website, SaaS, AI, atau sistem digital yang ingin Anda bangun.
                </p>

            </div>

            <form action="{{ route('contact.store') }}" method="POST"
                class="
            mt-12
            rounded-4xl
            border
            border-white/40 dark:border-slate-800
            bg-white/70 dark:bg-slate-900/80
            p-8
            shadow-xl
            backdrop-blur-xl
            ">

                @csrf

                {{-- Honeypot anti-spam (tersembunyi dari user) --}}
                <div class="hidden" aria-hidden="true">
                    <input type="text" name="website_hp" tabindex="-1" autocomplete="off">
                </div>

                @if (session('success'))
                    <div class="mb-6 rounded-2xl bg-emerald-50 border border-emerald-200 p-4 text-emerald-800 flex items-center gap-3">
                        <svg class="h-5 w-5 text-emerald-600 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-sm font-medium">{{ session('success') }}</span>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-6 rounded-2xl bg-rose-50 border border-rose-200 p-4 text-rose-800">
                        <div class="font-semibold text-sm mb-1">Terdapat kesalahan pada formulir:</div>
                        <ul class="list-disc pl-5 text-xs space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="grid gap-6 md:grid-cols-2">
                    <div>
                        <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-2">Nama Lengkap *</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Contoh: Budi Santoso" required
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-slate-900 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
                    </div>

                    <div>
                        <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-2">Alamat Email *</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="budi@example.com" required
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-slate-900 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
                    </div>
                </div>

                <div class="mt-6">
                    <label for="phone" class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-2">WhatsApp / Nomor HP</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}" placeholder="08123456789"
                        class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-slate-900 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
                </div>

                <div class="mt-6">
                    <label for="subject" class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-2">Topik / Subjek Proyek</label>
                    <input type="text" id="subject" name="subject" value="{{ old('subject') }}" placeholder="Contoh: Pembuatan Website Sekolah & Sistem Pembayaran"
                        class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-slate-900 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
                </div>

                <div class="mt-6">
                    <label for="message" class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-2">Detail Kebutuhan Proyek *</label>
                    <textarea id="message" name="message" rows="5" placeholder="Ceritakan gambaran sistem, perkiraan fitur, atau kendala yang ingin diselesaikan..." required
                        class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-slate-900 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">{{ old('message') }}</textarea>
                </div>

                <button type="submit"
                    class="mt-6 inline-flex items-center gap-2 rounded-2xl bg-linear-to-r from-blue-600 to-cyan-500 px-8 py-4 font-semibold text-white shadow-lg shadow-blue-500/20 transition hover:scale-105 hover:shadow-cyan-500/20">
                    <span>Kirim Pesan Konsultasi</span>
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </button>

            </form>

        </div>

    </section>
@endsection
