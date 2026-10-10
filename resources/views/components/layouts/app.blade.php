<!DOCTYPE html>
<html lang="en" class="bg-white antialiased motion-safe:scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Joey: a small BitTorrent client for your Mac' }}</title>
    <meta name="description" content="Joey is a small, native BitTorrent client for macOS. Open a magnet link, pick your files and let Joey carry them home. Then watch them right in Joey.">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Joey">
    <meta property="og:title" content="Joey: a small BitTorrent client for your Mac">
    <meta property="og:description" content="A small, native BitTorrent client for macOS with a built-in video player. Torrents, tucked safely in the pouch.">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:image" content="{{ asset('images/og.png') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="The Joey app icon, a baby koala in a blue folder, next to the words: Torrents, tucked safely in the pouch.">
    <meta name="twitter:card" content="summary_large_image">

    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

    @fonts

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-neutral-950">
    <div class="isolate">
        {{ $slot }}
    </div>
</body>
</html>
