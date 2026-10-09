@php
    $torrents = [
        ['name' => 'ubuntu-26.04-desktop-arm64.iso', 'size' => '6.1 GB', 'progress' => 64, 'status' => 'Downloading', 'speed' => '↓ 3.8 MB/s', 'tone' => 'pouch'],
        ['name' => 'Sintel', 'size' => '129.3 MB', 'progress' => 100, 'status' => 'Seeding', 'speed' => '↑ 210 KB/s', 'tone' => 'gum'],
        ['name' => 'debian-13.1.0-arm64-netinst.iso', 'size' => '702 MB', 'progress' => 31, 'status' => 'Downloading', 'speed' => '↓ 412 KB/s', 'tone' => 'pouch'],
        ['name' => 'Big Buck Bunny', 'size' => '276.1 MB', 'progress' => 100, 'status' => 'Seeding', 'speed' => '↑ 98 KB/s', 'tone' => 'gum'],
        ['name' => 'Cosmos Laundromat', 'size' => '220.4 MB', 'progress' => 12, 'status' => 'Paused', 'speed' => '–', 'tone' => 'neutral'],
    ];
    $tones = [
        'pouch' => ['bar' => 'bg-pouch-400', 'text' => 'text-pouch-500'],
        'gum' => ['bar' => 'bg-gum-400', 'text' => 'text-gum-600'],
        'neutral' => ['bar' => 'bg-neutral-300', 'text' => 'text-neutral-500'],
    ];
@endphp

{{-- A static mock of the Joey window, filled with freely licensed torrents. --}}
<div {{ $attributes->class('overflow-hidden rounded-xl bg-white shadow-2xl ring-1 ring-gum-950/10') }} aria-hidden="true">
    <div class="flex items-center gap-x-5 border-b border-neutral-950/5 bg-neutral-50 px-4 py-3">
        <div class="flex gap-x-2">
            <div class="size-3 rounded-full bg-[#ff5f57]"></div>
            <div class="size-3 rounded-full bg-[#febc2e]"></div>
            <div class="size-3 rounded-full bg-[#28c840]"></div>
        </div>
        <div>
            <div class="text-sm/5 font-semibold">Joey</div>
            <div class="text-xs/4 text-neutral-500 tabular-nums">↓ 4.2 MB/s &nbsp; ↑ 308 KB/s</div>
        </div>
        <div class="ml-auto flex items-center gap-x-4 max-sm:hidden">
            <x-heroicon-c-document-plus class="size-4 shrink-0 fill-neutral-500" />
            <x-heroicon-c-link class="size-4 shrink-0 fill-neutral-500" />
            <x-heroicon-c-play class="size-4 shrink-0 fill-neutral-300" />
            <x-heroicon-c-pause class="size-4 shrink-0 fill-neutral-500" />
            <x-heroicon-c-trash class="size-4 shrink-0 fill-neutral-500" />
            <x-heroicon-c-cog-6-tooth class="size-4 shrink-0 fill-neutral-500" />
        </div>
    </div>

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
