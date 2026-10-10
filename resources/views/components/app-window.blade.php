@php
    $torrents = [
        ['name' => 'ubuntu-26.04-desktop-arm64.iso', 'size' => '6.1 GB', 'progress' => 64, 'status' => 'Downloading', 'speed' => '↓ 3.8 MB/s', 'tone' => 'pouch'],
        ['name' => 'Sintel', 'size' => '129.3 MB', 'progress' => 100, 'status' => 'Seeding', 'speed' => '↑ 210 KB/s', 'tone' => 'gum'],
        ['name' => 'debian-13.1.0-arm64-netinst.iso', 'size' => '702 MB', 'progress' => 31, 'status' => 'Downloading', 'speed' => '↓ 412 KB/s', 'tone' => 'pouch'],
        ['name' => 'Big Buck Bunny', 'size' => '276.1 MB', 'progress' => 100, 'status' => 'Seeding', 'speed' => '↑ 98 KB/s', 'tone' => 'gum'],
        ['name' => 'Cosmos Laundromat', 'size' => '220.4 MB', 'progress' => 12, 'status' => 'Paused', 'speed' => '–', 'tone' => 'neutral'],
        ['name' => 'Tears of Steel', 'size' => '365.0 MB', 'progress' => 100, 'status' => 'Seeding', 'speed' => '–', 'tone' => 'gum'],
        ['name' => 'Fedora-Workstation-Live-43-aarch64.iso', 'size' => '2.4 GB', 'progress' => 8, 'status' => 'Downloading', 'speed' => '↓ 1.1 MB/s', 'tone' => 'pouch'],
        ['name' => 'Spring', 'size' => '94.7 MB', 'progress' => 100, 'status' => 'Seeding', 'speed' => '–', 'tone' => 'gum'],
    ];
    $tones = [
        'pouch' => ['bar' => 'bg-pouch-400', 'text' => 'text-pouch-600'],
        'gum' => ['bar' => 'bg-gum-400', 'text' => 'text-gum-600'],
        'neutral' => ['bar' => 'bg-neutral-300', 'text' => 'text-neutral-500'],
    ];
    $continue = [
        ['name' => 'Sintel', 'progress' => 46, 'left' => '8:00 left'],
        ['name' => 'Tears of Steel', 'progress' => 17, 'left' => '10:09 left'],
        ['name' => 'Cosmos Laundromat', 'progress' => 35, 'left' => '7:58 left'],
    ];
    $videos = [
        ['name' => 'Big Buck Bunny.mkv', 'resume' => '', 'size' => '276.1 MB'],
        ['name' => 'Cosmos Laundromat.mkv', 'resume' => '4:12', 'size' => '220.4 MB'],
        ['name' => 'Sintel.mkv', 'resume' => '6:48', 'size' => '129.3 MB'],
        ['name' => 'Spring.mp4', 'resume' => '', 'size' => '94.7 MB'],
        ['name' => 'Tears of Steel.mkv', 'resume' => '2:05', 'size' => '365.0 MB'],
    ];
    $tab = 'rounded-md px-3 py-0.5 text-xs/5 font-medium text-neutral-600 aria-selected:bg-white aria-selected:text-neutral-900 aria-selected:shadow-sm';
    // Panels sit on top of each other, so the window keeps its height when switching.
    $panel = 'col-start-1 row-start-1 invisible opacity-0 transition-opacity duration-300 data-active:visible data-active:opacity-100';
@endphp

{{-- A mock of the Joey window, filled with freely licensed torrents. The Download | Watch switch works (resources/js/app.js). --}}
<div {{ $attributes->class('overflow-hidden rounded-xl bg-white shadow-2xl ring-1 ring-gum-950/10') }} data-app-tabs>
    <div class="relative flex items-center gap-x-5 border-b border-neutral-950/5 bg-neutral-50 px-4 py-3">
        <div class="flex gap-x-2" aria-hidden="true">
            <div class="size-3 rounded-full bg-[#ff5f57]"></div>
            <div class="size-3 rounded-full bg-[#febc2e]"></div>
            <div class="size-3 rounded-full bg-[#28c840]"></div>
        </div>
        <div class="max-sm:hidden" aria-hidden="true">
            <div class="text-sm/5 font-semibold">Joey</div>
            <div class="text-xs/4 text-neutral-500 tabular-nums">↓ 4.2 MB/s &nbsp; ↑ 308 KB/s</div>
        </div>
        <div role="tablist" aria-label="Joey’s main window" class="flex gap-x-0.5 rounded-lg bg-neutral-950/5 p-0.5 sm:absolute sm:left-1/2 sm:-translate-x-1/2">
            <button type="button" role="tab" aria-selected="true" data-tab="downloads" class="{{ $tab }}">Download</button>
            <button type="button" role="tab" aria-selected="false" data-tab="videos" class="{{ $tab }}">Watch</button>
        </div>
        <div class="ml-auto grid" aria-hidden="true">
            <div class="{{ $panel }} flex items-center justify-end gap-x-4 max-sm:hidden" data-panel="downloads" data-active>
                <x-heroicon-c-document-plus class="size-4 shrink-0 fill-neutral-500" />
                <x-heroicon-c-link class="size-4 shrink-0 fill-neutral-500" />
                <x-heroicon-c-play class="size-4 shrink-0 fill-neutral-300" />
                <x-heroicon-c-pause class="size-4 shrink-0 fill-neutral-500" />
                <x-heroicon-c-trash class="size-4 shrink-0 fill-neutral-500" />
                <x-heroicon-c-cog-6-tooth class="size-4 shrink-0 fill-neutral-500" />
            </div>
            <div class="{{ $panel }} flex items-center justify-end" data-panel="videos">
                <x-heroicon-c-cog-6-tooth class="size-4 shrink-0 fill-neutral-500" />
            </div>
        </div>
    </div>

    <div class="relative grid h-72 overflow-hidden sm:h-80" aria-hidden="true">
        {{-- Downloads --}}
        <div class="{{ $panel }}" data-panel="downloads" data-active>
            <table class="w-full table-fixed text-left text-xs/5 sm:text-sm/5">
                <colgroup>
                    <col>
                    <col class="w-24 max-md:hidden">
                    <col class="w-28 sm:w-44">
                    <col class="w-28 max-sm:hidden">
                    <col class="w-28 max-lg:hidden">
                </colgroup>
                <thead class="border-b border-neutral-950/5 text-neutral-500">
                    <tr>
                        <th class="py-2 pl-4 font-medium">Name</th>
                        <th class="py-2 font-medium max-md:hidden">Size</th>
                        <th class="py-2 font-medium">Progress</th>
                        <th class="py-2 font-medium max-sm:hidden">Status</th>
                        <th class="py-2 pr-4 font-medium max-lg:hidden">Speed</th>
                    </tr>
                </thead>
                <tbody class="tabular-nums">
                    @foreach ($torrents as $torrent)
                        <tr class="even:bg-neutral-50">
                            <td class="truncate py-2.5 pr-4 pl-4">{{ $torrent['name'] }}</td>
                            <td class="py-2.5 text-neutral-600 max-md:hidden">{{ $torrent['size'] }}</td>
                            <td class="py-2.5 pr-4">
                                <div class="flex items-center gap-x-2">
                                    <div class="h-1.5 grow overflow-hidden rounded-full bg-neutral-200">
                                        <div class="h-full w-(--progress) rounded-full {{ $tones[$torrent['tone']]['bar'] }}" style="--progress: {{ $torrent['progress'] }}%"></div>
                                    </div>
                                    <div class="w-9 text-right text-neutral-500">{{ $torrent['progress'] }}%</div>
                                </div>
                            </td>
                            <td class="py-2.5 max-sm:hidden {{ $tones[$torrent['tone']]['text'] }}">{{ $torrent['status'] }}</td>
                            <td class="py-2.5 pr-4 text-neutral-600 max-lg:hidden">{{ $torrent['speed'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Videos --}}
        <div class="{{ $panel }} px-3 pt-3 text-xs/5 sm:px-4 sm:text-sm/5" data-panel="videos">
            <div class="flex items-center gap-x-3">
                <div class="flex grow items-center gap-x-1.5 rounded-md bg-neutral-950/5 px-2 py-1 text-neutral-400">
                    <x-heroicon-c-magnifying-glass class="size-3.5 shrink-0 fill-current" />
                    Search Movies
                </div>
                <x-heroicon-c-arrows-up-down class="size-4 shrink-0 fill-neutral-500" />
                <x-heroicon-c-arrow-path class="size-4 shrink-0 fill-neutral-500" />
            </div>

            <div class="mt-3 px-1.5 font-semibold">Continue Watching</div>
            <div class="mt-2 grid grid-cols-1 gap-2.5 sm:grid-cols-3">
                @foreach ($continue as $entry)
                    <div @class(['flex flex-col gap-y-2 rounded-lg bg-neutral-950/[0.04] p-2.5', 'max-sm:hidden' => ! $loop->first])>
                        <div class="flex items-start gap-x-2">
                            <x-heroicon-c-film class="size-5 shrink-0 fill-pouch-500" />
                            <span class="truncate">{{ $entry['name'] }}</span>
                        </div>
                        <div class="mt-2 h-1 overflow-hidden rounded-full bg-neutral-200">
                            <div class="h-full w-(--progress) rounded-full bg-pouch-500" style="--progress: {{ $entry['progress'] }}%"></div>
                        </div>
                        <div class="text-xs/4 text-neutral-500 tabular-nums">{{ $entry['left'] }}</div>
                    </div>
                @endforeach
            </div>

            <div class="mt-4 px-1.5 font-semibold">All Videos</div>
            <ul class="mt-1 tabular-nums">
                @foreach ($videos as $video)
                    <li class="flex items-center gap-x-2 px-1.5 py-1.5">
                        <span class="grow truncate">{{ $video['name'] }}</span>
                        <span class="w-12 text-right text-pouch-600">{{ $video['resume'] }}</span>
                        <span class="w-16 text-right text-neutral-500 sm:w-20">{{ $video['size'] }}</span>
                    </li>
                @endforeach
            </ul>
        </div>

        {{-- The list carries on below, like in the app. --}}
        <div class="pointer-events-none absolute inset-x-0 bottom-0 h-10 bg-linear-to-t from-white"></div>
    </div>
</div>
