@extends('layouts.app')

@section('content')

<section class="relative overflow-hidden">
    <div
        class="absolute inset-0 -z-20
    bg-[linear-gradient(to_right,#f1f5f9_1px,transparent_1px),
    linear-gradient(to_bottom,#f1f5f9_1px,transparent_1px)]
    bg-[size:4rem_4rem]"></div>

    <div
        class="absolute -left-40 top-10 -z-10 h-[500px] w-[500px]
    rounded-full bg-blue-500/15 blur-[120px]"></div>

    <div
        class="absolute -right-40 top-20 -z-10 h-[500px] w-[500px]
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
bg-white/80
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

                <h1
                    class="
mt-6
text-6xl
lg:text-7xl
font-bold
tracking-tight
leading-tight
text-slate-900
">
                    Membangun
                    <span class="bg-gradient-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent">
                        Website
                    </span>,
                    SaaS, dan
                    <span class="bg-gradient-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent">
                        Solusi AI
                    </span>
                </h1>

                <p
                    class="mt-6 text-lg text-slate-600">
                    Ryzent membantu sekolah,
                    organisasi olahraga,
                    dan bisnis membangun
                    sistem digital modern
                    berbasis Laravel, AI,
                    dan Cloud Infrastructure.
                </p>

                <div class="mt-10 flex flex-wrap gap-4">

                    <a
                        href="#portfolio"
                        class="
        rounded-2xl
        bg-gradient-to-r
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

                    <a
                        href="#contact"
                        class="
        rounded-2xl
        border
        border-slate-200
        bg-white/70
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
            <div
                x-data="{
        active: 0,
        total: {{ max($portfolios->count(), 1) }}
    }"
                x-init="
        setInterval(() => {
            active = (active + 1) % total
        }, 5000)
    "
                class="relative">

                @foreach($portfolios as $index => $portfolio)

                <div
                    x-show="active === {{ $index }}"
                    x-transition:enter="transition ease-out duration-500"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    class="rounded-[32px] border border-white/40 bg-white/70 p-6 shadow-2xl backdrop-blur-xl">
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
                    <img
                        src="{{ asset('storage/' . $portfolio->thumbnail) }}"
                        alt="{{ $portfolio->title }}"
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

                        <h3
                            class="
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

                    @foreach($portfolios as $index => $portfolio)

                    <button
                        @click="active = {{ $index }}"
                        :class="
                    active === {{ $index }}
                    ? 'bg-blue-600'
                    : 'bg-slate-300'
                "
                        class="h-3 w-3 rounded-full transition"></button>

                    @endforeach

                </div>

            </div>

        </div>

    </div>

</section>

<section id="services" class="relative py-24">
    <div
        class="absolute inset-0 -z-10 bg-gradient-to-b
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
            bg-white/80
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

            <p class="mt-4 text-slate-600">
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
border-white/40
bg-white/70
p-8
shadow-sm
backdrop-blur-xl
transition-all
duration-300
hover:-translate-y-3
hover:shadow-2xl
">
                <div
                    class="
mb-6
h-1.5
w-20
rounded-full
bg-gradient-to-r
from-blue-600
to-cyan-500
">
                </div>

                <h3
                    class="
relative z-10
text-xl
font-bold
tracking-tight
text-slate-900
">
                    {{ $service->title }}
                </h3>

                <p class="relative z-10 mt-4 text-slate-600">
                    {{ $service->excerpt }}
                </p>

                <div class="relative z-10 mt-6">

                    <span
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
                    </span>

                </div>

                @if($service->price_start)
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
bg-gradient-to-br
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
        bg-white/80
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

            <p class="mt-4 text-slate-600">
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
rounded-[32px]
border
border-white/40
bg-white/70
shadow-sm
backdrop-blur-xl
transition-all
duration-300
hover:-translate-y-3
hover:shadow-2xl
">

                @if($portfolio->thumbnail)

                <img
                    src="{{ asset('storage/' . $portfolio->thumbnail) }}"
                    alt="{{ $portfolio->title }}"
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
bg-gradient-to-t
from-black/50
to-transparent
opacity-0
transition
duration-300
group-hover:opacity-100
">
                </div>

                @else

                <div
                    class="flex h-56 items-center justify-center bg-slate-100">
                    No Image
                </div>

                @endif

                <div class="p-6">

                    <h3 class="relative z-10 mt-4 text-xl font-bold text-slate-900">
                        {{ $portfolio->title }}
                    </h3>

                    <p class="relative z-10 mt-3 text-slate-600">
                        {{ $portfolio->excerpt }}
                    </p>

                    <div class="relative z-10 mt-6 flex items-center justify-between">

                        <span
                            class="text-sm text-slate-500">
                            {{ $portfolio->status }}
                        </span>

                        <a
                            href="#"
                            class="font-medium text-blue-600">
                            Detail →
                        </a>

                    </div>
                    <div class="relative z-10 mt-6 flex gap-3">

                        @if($portfolio->demo_url)

                        <a
                            href="{{ $portfolio->demo_url }}"
                            target="_blank"
                            class="
            rounded-xl
            bg-gradient-to-r
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

                        @if($portfolio->github_url)

                        <a
                            href="{{ $portfolio->github_url }}"
                            target="_blank"
                            class="
            rounded-xl
            border
            border-slate-200
            bg-white/70
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
bg-gradient-to-br
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
                bg-white/80
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

            <p class="mt-4 text-slate-600">
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
            border-white/40
            bg-white/70
            shadow-sm
            backdrop-blur-xl
            transition-all
            duration-300
            hover:-translate-y-2
            hover:shadow-2xl
            ">
                @if($post->thumbnail)

                <img
                    src="{{ asset('storage/' . $post->thumbnail) }}"
                    alt="{{ $post->title }}"
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

                    <h3
                        class="
        mt-4
        text-xl
        font-bold
        text-slate-900
        ">
                        {{ $post->title }}
                    </h3>

                    <p class="mt-3 text-slate-600">
                        {{ Str::limit(strip_tags($post->excerpt ?? ''), 120) }}
                    </p>

                    <div class="mt-6 flex items-center justify-between">

                        <span class="text-sm text-slate-500">
                            {{ $post->created_at->format('d M Y') }}
                        </span>

                        <a
                            href="#"
                            class="font-medium text-blue-600">
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
        bg-gradient-to-r
        from-blue-600
        via-blue-500
        to-cyan-500
        "></div>

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
            <h2
                class="
    mt-6
    text-4xl
    lg:text-6xl
    font-bold
    text-white
    ">
                Siap Membangun
                Sistem Digital Anda?
            </h2>
            <p
                class="
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
            <div
                class="
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
            <div
                class="
    mt-10
    flex
    flex-wrap
    justify-center
    gap-4
    ">
                <a
                    href="/contact"
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
                <a
                    href="https://wa.me/6282165684828"
                    target="_blank"
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


@endsection