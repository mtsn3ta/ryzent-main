@extends('layouts.app')

@section('content')

<section class="relative overflow-hidden py-24">

    {{-- Glow Background --}}
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

            <h1
                class="
                text-5xl
                lg:text-6xl
                font-bold
                tracking-tight
                text-slate-900
                ">
                Insight & Artikel
            </h1>

            <p class="mt-6 text-slate-600">
                Tips teknologi, AI, website,
                dan transformasi digital.
            </p>

        </div>

        {{-- Articles --}}
        <div class="mt-16 grid gap-8 md:grid-cols-2 lg:grid-cols-3">

            @forelse($posts as $post)

            <article
                class="
                    group
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

                    <h2
                        class="
                            mt-4
                            text-xl
                            font-bold
                            text-slate-900
                            ">
                        {{ $post->title }}
                    </h2>

                    <p class="mt-4 text-slate-600">
                        {{ Str::limit(strip_tags($post->excerpt ?? ''), 120) }}
                    </p>

                    <div
                        class="
                            mt-6
                            flex
                            items-center
                            justify-between
                            ">

                        <span class="text-sm text-slate-500">
                            {{ $post->created_at->format('d M Y') }}
                        </span>

                        <a
                            href="{{ route('blog.show', $post->slug) }}"
                            class="
                                font-medium
                                text-blue-600
                                transition
                                group-hover:translate-x-1
                                ">
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

        {{-- Pagination --}}
        <div class="mt-16">
            {{ $posts->links() }}
        </div>

    </div>

</section>

@endsection