@extends('layouts.app')

@section('content')

<section class="relative overflow-hidden py-24">

    {{-- Glow --}}
    <div
        class="
        absolute
        -left-40
        top-0
        h-[500px]
        w-[500px]
        rounded-full
        bg-blue-500/10
        blur-[120px]
        "></div>

    <div
        class="
        absolute
        -right-40
        top-0
        h-[500px]
        w-[500px]
        rounded-full
        bg-cyan-500/10
        blur-[120px]
        "></div>

    <div class="relative max-w-7xl mx-auto px-6">

        {{-- Header --}}
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

            <h1
                class="
                text-5xl
                lg:text-6xl
                font-bold
                tracking-tight
                text-slate-900
                ">
                Featured Projects
            </h1>

            <p class="mt-6 text-slate-600">
                Beberapa proyek yang telah kami bangun
                untuk sekolah, organisasi, dan bisnis modern.
            </p>

        </div>

        {{-- Grid --}}
        <div class="mt-16 grid gap-8 md:grid-cols-2 lg:grid-cols-3">

            @forelse($portfolios as $portfolio)

            <article
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
                    hover:-translate-y-2
                    hover:shadow-2xl
                    ">

                @if($portfolio->thumbnail)

                <div class="overflow-hidden">

                    <img
                        src="{{ asset('storage/' . $portfolio->thumbnail) }}"
                        alt="{{ $portfolio->title }}"
                        class="
                                h-64
                                w-full
                                object-cover
                                transition
                                duration-700
                                group-hover:scale-110
                                ">

                </div>

                @endif

                <div class="p-6">

                    <div
                        class="
                            inline-flex
                            rounded-full
                            bg-cyan-50
                            px-3
                            py-1
                            text-xs
                            font-medium
                            text-cyan-700
                            ">
                        {{ $portfolio->category }}
                    </div>

                    <h2
                        class="
                            mt-4
                            text-xl
                            font-bold
                            text-slate-900
                            ">
                        {{ $portfolio->title }}
                    </h2>

                    <p class="mt-4 text-slate-600">
                        {{ Str::limit(strip_tags($portfolio->excerpt), 120) }}
                    </p>

                    <div
                        class="
                            mt-6
                            flex
                            items-center
                            justify-between
                            ">

                        <span
                            class="
                                rounded-full
                                bg-slate-100
                                px-3
                                py-1
                                text-xs
                                ">
                            {{ $portfolio->status }}
                        </span>

                        <a
                            href="{{ route('portfolio.show', $portfolio->slug) }}"
                            class="
                                font-medium
                                text-blue-600
                                ">
                            Detail →
                        </a>

                    </div>

                </div>

            </article>

            @empty

            <div class="col-span-3 text-center text-slate-500">
                Belum ada portfolio.
            </div>

            @endforelse

        </div>

        <div class="mt-16">
            {{ $portfolios->links() }}
        </div>

    </div>

</section>

@endsection