@php
    $videos = [
        ['name' => 'Big Buck Bunny.mkv', 'resume' => '', 'size' => '276.1 MB'],
        ['name' => 'Cosmos Laundromat.mkv', 'resume' => '4:12', 'size' => '220.4 MB'],
        ['name' => 'Sintel.mkv', 'resume' => '6:48', 'size' => '129.3 MB', 'current' => true],
        ['name' => 'Spring.mp4', 'resume' => '', 'size' => '94.7 MB'],
        ['name' => 'Tears of Steel.mkv', 'resume' => '2:05', 'size' => '365.0 MB'],
    ];
@endphp

{{-- A static mock of the player window, with the video list open. The "video" is drawn in CSS. --}}
<div {{ $attributes->class('relative overflow-hidden rounded-xl bg-neutral-950 shadow-2xl ring-1 ring-white/10') }} aria-hidden="true">
    <div class="absolute inset-x-0 top-0 z-10 flex items-center gap-x-5 px-4 py-3">
        <div class="flex gap-x-2">
            <div class="size-3 rounded-full bg-[#ff5f57]"></div>
            <div class="size-3 rounded-full bg-[#febc2e]"></div>
            <div class="size-3 rounded-full bg-[#28c840]"></div>
        </div>
        <div class="text-sm/5 font-semibold text-white/80">Sintel.mkv</div>
    </div>

    {{-- The video: a dusky mountain landscape. --}}
    <div class="relative aspect-video bg-linear-to-b from-[#1b2a4a] via-[#6b4a6e] to-[#e59a6b]">
        <div class="absolute top-[22%] right-[18%] aspect-square w-[6%] rounded-full bg-[#ffe3b8] shadow-[0_0_80px_30px_rgba(255,214,160,0.35)]"></div>
        <svg viewBox="0 0 1600 900" preserveAspectRatio="none" class="absolute inset-0 size-full">
            <path d="M0 620 L180 470 L330 560 L520 380 L700 540 L860 430 L1040 560 L1240 400 L1420 520 L1600 450 L1600 900 L0 900 Z" fill="#3b2f4f" />
            <path d="M0 720 L220 600 L420 690 L640 560 L880 700 L1100 610 L1320 700 L1600 590 L1600 900 L0 900 Z" fill="#241d33" />
            <path d="M0 820 L300 740 L600 800 L950 730 L1250 800 L1600 750 L1600 900 L0 900 Z" fill="#120f1c" />
        </svg>

        <p class="absolute inset-x-0 bottom-[24%] text-center text-[clamp(0.625rem,1.8vw,1.25rem)] font-medium text-white [text-shadow:0_1px_3px_rgb(0_0_0/0.9)] max-sm:hidden">
            I’ve been looking for you for a long time.
        </p>

        {{-- Video list popover --}}
        <div class="absolute top-[10%] right-[4%] w-[min(26rem,62%)] rounded-xl bg-neutral-800/90 p-2.5 text-xs/5 text-white shadow-2xl ring-1 ring-white/10 backdrop-blur-xl max-md:hidden">
            <div class="flex items-center gap-x-2">
                <div class="flex grow items-center gap-x-1.5 rounded-md bg-white/10 px-2 py-1 text-white/50">
                    <x-heroicon-c-magnifying-glass class="size-3.5 shrink-0 fill-current" />
                    Search Movies
                </div>
                <x-heroicon-c-arrows-up-down class="size-3.5 shrink-0 fill-white/60" />
                <x-heroicon-c-arrow-path class="size-3.5 shrink-0 fill-white/60" />
            </div>
            <ul class="mt-2 tabular-nums">
                @foreach ($videos as $video)
                    <li @class(['flex items-center gap-x-2 rounded-md px-1.5 py-1', 'bg-white/10 font-semibold' => $video['current'] ?? false])>
                        <x-heroicon-s-play @class(['size-2.5 shrink-0 fill-pouch-400', 'opacity-0' => ! ($video['current'] ?? false)]) />
                        <span class="grow truncate">{{ $video['name'] }}</span>
                        <span class="w-10 text-right font-normal text-pouch-300">{{ $video['resume'] }}</span>
                        <span class="w-16 text-right font-normal text-white/50">{{ $video['size'] }}</span>
                    </li>
                @endforeach
            </ul>
        </div>

        {{-- Controls --}}
        <div class="absolute inset-x-[4%] bottom-[5%] mx-auto flex max-w-3xl items-center gap-x-3 rounded-full bg-neutral-900/70 px-4 py-2 text-xs/5 text-white/60 ring-1 ring-white/15 backdrop-blur-xl sm:gap-x-4 sm:px-5 sm:py-2.5">
            <x-heroicon-c-arrow-uturn-left class="size-4 shrink-0 fill-white/80 max-sm:hidden" />
            <x-heroicon-s-pause class="size-5 shrink-0 fill-white" />
            <x-heroicon-c-arrow-uturn-right class="size-4 shrink-0 fill-white/80 max-sm:hidden" />
            <span class="tabular-nums">6:48</span>
            <div class="h-1 grow rounded-full bg-white/20">
                <div class="relative h-full w-[46%] rounded-full bg-white/80">
                    <div class="absolute top-1/2 right-0 size-3 translate-x-1/2 -translate-y-1/2 rounded-full bg-white shadow"></div>
                </div>
            </div>
            <span class="tabular-nums">14:48</span>
            <x-heroicon-c-speaker-wave class="size-4 shrink-0 fill-white/80 max-sm:hidden" />
            <x-heroicon-c-chat-bubble-bottom-center-text class="size-4 shrink-0 fill-white/80 max-sm:hidden" />
            <x-heroicon-c-film class="size-4 shrink-0 fill-white" />
            <x-heroicon-c-arrows-pointing-out class="size-4 shrink-0 fill-white/80" />
        </div>
    </div>
</div>
