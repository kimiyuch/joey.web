@php
    $download = config('joey.download_url');
    $repository = config('joey.repository_url');

    $features = [
        ['icon' => 'link', 'title' => 'Magnet links and torrent files', 'body' => 'Click a magnet link in your browser, double-click a .torrent file, or drop one onto the window.'],
        ['icon' => 'list-bullet', 'title' => 'Pick your files', 'body' => 'Only need one file from a big torrent? Untick the rest and Joey skips them.'],
        ['icon' => 'film', 'title' => 'Built-in video player', 'body' => 'Watch what you’ve downloaded right in Joey, or open any video from Finder. MKV and most other formats, with subtitles, audio tracks and resume where you left off.'],
        ['icon' => 'play-circle', 'title' => 'Download in order', 'body' => 'Fetch a video from start to finish, so you can start watching before it’s done.'],
        ['icon' => 'scale', 'title' => 'Seeding limits', 'body' => 'Stop sharing at a ratio you choose, or after a set amount of time.'],
        ['icon' => 'adjustments-horizontal', 'title' => 'Speed limits', 'body' => 'Cap download and upload speeds so Joey never hogs your connection.'],
        ['icon' => 'computer-desktop', 'title' => 'Lives in your menu bar', 'body' => 'See your speeds at a glance and get a nudge when a download is done. Close the window and Joey keeps going.'],
        ['icon' => 'moon', 'title' => 'Stays awake', 'body' => 'Koalas sleep twenty hours a day. Your Mac won’t, at least not in the middle of a download.'],
        ['icon' => 'arrow-path', 'title' => 'Updates itself', 'body' => 'New versions arrive on their own. No need to come back here to check.'],
    ];
@endphp

<x-layouts.app>
    <div class="absolute inset-x-0 top-0 -z-10 h-[44rem] bg-linear-to-b from-gum-50 to-white"></div>

    <x-site-header />

    <main>
        {{-- Hero --}}
        <section class="relative pt-10 pb-24 sm:pt-16 sm:pb-32">
            <div class="mx-auto max-w-6xl px-6 text-center lg:px-8">
                <img src="{{ asset('images/joey.webp') }}" width="384" height="384" fetchpriority="high" alt="The Joey app icon: a baby koala peeking out of a blue folder" class="mx-auto size-32 sm:size-40">
                <h1 class="mx-auto mt-8 max-w-[20ch] font-display text-5xl font-semibold tracking-tight text-balance text-gum-950 sm:text-7xl">
                    Torrents, tucked safely in the pouch
                </h1>
                <p class="mx-auto mt-6 max-w-[48ch] text-lg/8 text-pretty text-neutral-600 sm:text-xl/8">
                    Joey is a small, native BitTorrent client for your Mac. Open a magnet link, pick the files you want, and let Joey carry them home. When they get there, watch them right in Joey.
                </p>
                <div class="mt-10 flex flex-wrap items-center justify-center gap-x-8 gap-y-4">
                    <a href="{{ $download }}" class="inline-flex items-center gap-x-2 rounded-full bg-gum-600 py-3 pr-5 pl-4 text-base/6 font-semibold text-white shadow-sm hover:bg-gum-700 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gum-600">
                        <x-heroicon-m-arrow-down-tray class="size-5 shrink-0 fill-white" />
                        Download for Mac
                    </a>
                    <a href="{{ $repository }}" class="inline-flex items-center gap-x-1.5 text-base/6 font-semibold text-gum-800 hover:text-gum-600">
                        View on GitHub
                        <x-heroicon-m-arrow-right class="size-5 shrink-0 fill-current" />
                    </a>
                </div>
                <p class="mt-6 text-base/7 text-neutral-500 sm:text-sm/6">Free · Apple Silicon · macOS 26 or later</p>

                <x-app-window class="mx-auto mt-16 max-w-5xl text-left sm:mt-20" />
            </div>
        </section>

        {{-- Features --}}
        <section id="features" class="scroll-mt-8 border-t border-neutral-950/5 py-24 sm:py-32">
            <div class="mx-auto max-w-6xl px-6 lg:px-8">
                <p class="text-base/7 font-semibold text-gum-600">Features</p>
                <h2 class="mt-2 max-w-[30ch] font-display text-4xl font-semibold tracking-tight text-balance text-gum-950 sm:text-5xl">
                    Everything you need, nothing you don’t
                </h2>
                <p class="mt-6 max-w-[48ch] text-lg/8 text-pretty text-neutral-600">
                    Joey does the job and stays out of the way. It sits in your menu bar, keeps your Mac awake while it works, and quietly shares back once it’s done.
                </p>

                <dl class="mt-16 grid grid-cols-1 gap-x-12 gap-y-12 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($features as $feature)
                        <div>
                            <dt class="flex items-start gap-x-3 text-base/7 font-semibold text-gum-950">
                                <x-dynamic-component :component="'heroicon-m-'.$feature['icon']" class="size-5 h-lh shrink-0 fill-gum-500" />
                                {{ $feature['title'] }}
                            </dt>
                            <dd class="mt-1 pl-8 text-base/7 text-pretty text-neutral-600">{{ $feature['body'] }}</dd>
                        </div>
                    @endforeach
                </dl>
            </div>
        </section>

        {{-- Under the hood --}}
        <section class="bg-gum-50 py-24 sm:py-32">
            <div class="mx-auto grid max-w-6xl grid-cols-1 gap-x-12 gap-y-16 px-6 lg:grid-cols-2 lg:px-8">
                <div>
                    <p class="text-base/7 font-semibold text-gum-600">Under the hood</p>
                    <h2 class="mt-2 max-w-[30ch] font-display text-4xl font-semibold tracking-tight text-balance text-gum-950 sm:text-5xl">
                        Small, native, and nothing to hide
                    </h2>
                    <p class="mt-6 max-w-[48ch] text-lg/8 text-pretty text-neutral-600">
                        Joey is written in Swift and SwiftUI, so it looks and feels like it belongs on your Mac. The heavy lifting is done by libtorrent, the same proven engine behind qBittorrent and Deluge, and videos play through mpv, the open-source player that handles just about any file.
                    </p>
                </div>
                <dl class="divide-y divide-gum-950/10 self-center">
                    <div class="flex items-baseline justify-between gap-x-6 pb-6">
                        <dt class="text-base/7 text-neutral-600">Download size</dt>
                        <dd class="font-display text-2xl font-semibold tracking-tight text-gum-950 tabular-nums">35 MB</dd>
                    </div>
                    <div class="flex items-baseline justify-between gap-x-6 py-6">
                        <dt class="text-base/7 text-neutral-600">Ads, accounts and analytics</dt>
                        <dd class="font-display text-2xl font-semibold tracking-tight text-gum-950">None</dd>
                    </div>
                    <div class="flex items-baseline justify-between gap-x-6 py-6">
                        <dt class="text-base/7 text-neutral-600">Torrent engine</dt>
                        <dd class="font-display text-2xl font-semibold tracking-tight text-gum-950 tabular-nums">libtorrent 2.1</dd>
                    </div>
                    <div class="flex items-baseline justify-between gap-x-6 py-6">
                        <dt class="text-base/7 text-neutral-600">Video player</dt>
                        <dd class="font-display text-2xl font-semibold tracking-tight text-gum-950">mpv</dd>
                    </div>
                    <div class="flex items-baseline justify-between gap-x-6 pt-6">
                        <dt class="text-base/7 text-neutral-600">Source code</dt>
                        <dd class="font-display text-2xl font-semibold tracking-tight">
                            <a href="{{ $repository }}" class="text-gum-700 underline decoration-gum-300 underline-offset-4 hover:decoration-gum-600">GitHub</a>
                        </dd>
                    </div>
                </dl>
            </div>
        </section>

        {{-- Install --}}
        <section id="install" class="scroll-mt-8 py-24 sm:py-32">
            <div class="mx-auto max-w-6xl px-6 lg:px-8">
                <p class="text-base/7 font-semibold text-gum-600">Install</p>
                <h2 class="mt-2 max-w-[30ch] font-display text-4xl font-semibold tracking-tight text-balance text-gum-950 sm:text-5xl">
                    Give Joey a home
                </h2>
                <p class="mt-6 max-w-[48ch] text-lg/8 text-pretty text-neutral-600">
                    Joey isn’t on the App Store and isn’t notarized by Apple, so macOS asks you to confirm it the first time. It takes about a minute, and you only do it once.
                </p>

                <ol role="list" class="mt-16 grid grid-cols-1 gap-x-12 gap-y-12 sm:grid-cols-3">
                    <li>
                        <div class="font-display text-base/7 font-semibold text-gum-600 tabular-nums">01</div>
                        <h3 class="mt-2 text-base/7 font-semibold text-gum-950">Download</h3>
                        <p class="mt-1 text-base/7 text-pretty text-neutral-600">
                            Download <a href="{{ $download }}" class="font-semibold text-gum-700 underline decoration-gum-300 underline-offset-4 hover:decoration-gum-600">Joey.dmg</a> and open it.
                        </p>
                    </li>
                    <li>
                        <div class="font-display text-base/7 font-semibold text-gum-600 tabular-nums">02</div>
                        <h3 class="mt-2 text-base/7 font-semibold text-gum-950">Drag to Applications</h3>
                        <p class="mt-1 text-base/7 text-pretty text-neutral-600">Drag Joey onto the Applications folder in the window that opens.</p>
                    </li>
                    <li>
                        <div class="font-display text-base/7 font-semibold text-gum-600 tabular-nums">03</div>
                        <h3 class="mt-2 text-base/7 font-semibold text-gum-950">Open Anyway</h3>
                        <p class="mt-1 text-base/7 text-pretty text-neutral-600">
                            Open Joey. When macOS says it can’t verify the developer, go to System Settings → Privacy &amp; Security, scroll down and click Open Anyway.
                        </p>
                    </li>
                </ol>

                <p class="mt-16 border-t border-neutral-950/5 pt-8 text-base/7 text-neutral-600 sm:text-sm/6">
                    Joey needs a Mac with Apple Silicon (M1 or newer) and macOS 26 or later. After the first launch it updates itself.
                </p>
            </div>
        </section>
    </main>

    <x-site-footer />
</x-layouts.app>
