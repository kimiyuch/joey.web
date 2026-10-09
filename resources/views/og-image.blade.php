{{-- Source for public/images/og.png (1200×630). Regenerate with scripts/og-image.sh. --}}
<!DOCTYPE html>
<html lang="en" class="antialiased">
<head>
    <meta charset="utf-8">
    @fonts
    @vite(['resources/css/app.css'])
</head>
<body class="m-0">
    <div class="relative isolate flex h-[630px] w-[1200px] items-center gap-x-16 overflow-hidden bg-linear-to-br from-gum-50 via-white to-gum-100 px-24 font-sans">
        <img src="{{ asset('images/joey.png') }}" alt="" class="size-[22rem] shrink-0">
        <div>
            <div class="font-display text-[7rem] font-semibold tracking-tight text-gum-950">Joey</div>
            <p class="mt-2 max-w-[20ch] font-display text-5xl font-medium tracking-tight text-balance text-gum-800">
                Torrents, tucked safely in the pouch.
            </p>
            <p class="mt-8 text-2xl text-neutral-600">A small, native BitTorrent client for macOS.</p>
            <p class="mt-2 text-2xl font-medium text-gum-600">joey.kimiyu.ch</p>
        </div>
    </div>
</body>
</html>
