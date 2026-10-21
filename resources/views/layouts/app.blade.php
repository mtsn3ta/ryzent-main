<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('meta_title', $siteSettings?->meta_title ?: ($siteSettings?->site_name ?? 'Ryzent Cipta Digital'))
    </title>
    <meta name="description" content="@yield('meta_description', $siteSettings?->meta_description ?? 'Ryzent membantu sekolah, organisasi, dan bisnis membangun sistem digital modern berbasis Laravel, AI, dan Cloud Infrastructure.')">
    <meta property="og:type" content="website">

    <meta property="og:title" content="@yield('meta_title', $siteSettings?->meta_title ?: ($siteSettings?->site_name ?? 'Ryzent Cipta Digital'))">
    <meta property="og:description" content="@yield('meta_description', $siteSettings?->meta_description ?? 'Membangun Website, SaaS, dan Solusi AI Modern.')">
    
    @php
        $defaultOg = $siteSettings?->og_image ? asset('storage/' . $siteSettings->og_image) : null;
    @endphp
    @hasSection('og_image')
        <meta property="og:image" content="@yield('og_image')">
        <meta name="twitter:image" content="@yield('og_image')">
    @elseif($defaultOg)
        <meta property="og:image" content="{{ $defaultOg }}">
        <meta name="twitter:image" content="{{ $defaultOg }}">
    @endif

    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('meta_title', $siteSettings?->meta_title ?: ($siteSettings?->site_name ?? 'Ryzent Cipta Digital'))">
    <meta name="twitter:description" content="@yield('meta_description', $siteSettings?->meta_description ?? 'Membangun Website, SaaS, dan Solusi AI Modern.')">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @if ($siteSettings?->favicon)
        <link rel="icon" type="image/png" href="{{ asset('storage/' . $siteSettings->favicon) }}">
    @endif
</head>

<body class="bg-white text-slate-900 antialiased selection:bg-cyan-500 selection:text-white">

    @include('components.navbar')

    <main>
        @yield('content')
    </main>

    @include('components.footer')

    @include('components.floating-whatsapp')

</body>

</html>
