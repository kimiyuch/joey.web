
<x-layouts.app title="Changelog · Joey">
    <div class="absolute inset-x-0 top-0 -z-10 h-[44rem] bg-linear-to-b from-gum-50 to-white"></div>

    <x-site-header />

    <main class="mx-auto max-w-6xl px-6 pt-10 pb-24 sm:pt-16 sm:pb-32 lg:px-8">
        <p class="text-base/7 font-semibold text-gum-600">Changelog</p>
        <h1 class="mt-2 max-w-[30ch] font-display text-4xl font-semibold tracking-tight text-balance text-gum-950 sm:text-5xl">
            What’s new in Joey
        </h1>
        <p class="mt-6 max-w-[48ch] text-lg/8 text-pretty text-neutral-600">
            Joey updates itself, so you’ll get these on your own. Here’s what changed along the way.
        </p>

        <div class="mt-16 divide-y divide-neutral-950/5 border-t border-neutral-950/5">
            @foreach (\App\Changelog::releases() as $release)
                <section id="v{{ $release['version'] }}" class="grid scroll-mt-8 grid-cols-1 gap-x-12 gap-y-4 py-12 sm:grid-cols-[12rem_1fr]">
                    <div>
                        <h2 class="font-display text-2xl font-semibold tracking-tight text-gum-950 tabular-nums">{{ $release['version'] }}</h2>
                        <p class="mt-1 text-sm/6 text-neutral-500">
                            <time datetime="{{ $release['date'] }}">{{ \Illuminate\Support\Carbon::parse($release['date'])->format('F j, Y') }}</time>
                        </p>
                    </div>
                    <div>
                        @isset($release['title'])
                            <h3 class="text-base/7 font-semibold text-gum-950">{{ $release['title'] }}</h3>
                        @endisset
                        <ul role="list" class="@isset($release['title']) mt-3 @endisset space-y-3">
                            @foreach ($release['changes'] as $change)
                                <li class="flex gap-x-3 text-base/7 text-pretty text-neutral-600">
                                    <span class="mt-2.5 size-1.5 shrink-0 rounded-full bg-gum-400" aria-hidden="true"></span>
                                    <span>{!! $change !!}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </section>
            @endforeach
        </div>
    </main>

    <x-site-footer />
</x-layouts.app>
