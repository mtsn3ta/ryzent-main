<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        {{ $title ?? ($siteSettings?->meta_title ?: $siteSettings?->site_name) }}
    </title>
    <meta name="description" content="{{ $siteSettings?->meta_description }}">
    <meta property="og:type" content="website">

    <meta property="og:title" content="{{ $siteSettings?->meta_title ?: $siteSettings?->site_name }}">

    <meta property="og:description" content="{{ $siteSettings?->meta_description }}">
    @if ($siteSettings?->og_image)
        <meta property="og:image" content="{{ asset('storage/' . $siteSettings->og_image) }}">
    @endif
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="twitter:card" content="summary_large_image">

    <meta name="twitter:title" content="{{ $siteSettings?->meta_title ?: $siteSettings?->site_name }}">

    <meta name="twitter:description" content="{{ $siteSettings?->meta_description }}">
    @if ($siteSettings?->og_image)
        <meta name="twitter:image" content="{{ asset('storage/' . $siteSettings->og_image) }}">
    @endif

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @if ($siteSettings?->favicon)
        <link rel="icon" type="image/png" href="{{ asset('storage/' . $siteSettings->favicon) }}">
    @endif
</head>

<body class="bg-white text-slate-900">

    @include('components.navbar')

    <main>
        @yield('content')
    </main>

    @include('components.footer')

</body>

</html>
