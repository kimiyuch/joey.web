@php($repository = config('joey.repository_url'))

<x-layouts.app title="Legal Notice · Joey">
    <div class="absolute inset-x-0 top-0 -z-10 h-[44rem] bg-linear-to-b from-gum-50 to-white"></div>

    <x-site-header />

    <main class="mx-auto max-w-6xl px-6 pt-10 pb-24 sm:pt-16 sm:pb-32 lg:px-8">
        <p class="text-base/7 font-semibold text-gum-600">Legal notice</p>
        <h1 class="mt-2 max-w-[30ch] font-display text-4xl font-semibold tracking-tight text-balance text-gum-950 sm:text-5xl">
            The small print
        </h1>
        <p class="mt-6 max-w-[48ch] text-lg/8 text-pretty text-neutral-600">
            Joey is a free, open-source BitTorrent client. Here’s what that means for you, and what it doesn’t.
        </p>

        <div class="mt-16 divide-y divide-neutral-950/5 border-t border-neutral-950/5">
            <section id="use" class="grid scroll-mt-8 grid-cols-1 gap-x-12 gap-y-4 py-12 sm:grid-cols-[12rem_1fr]">
                <h2 class="font-display text-2xl font-semibold tracking-tight text-gum-950">Your downloads</h2>
                <div class="max-w-[65ch] space-y-4 text-base/7 text-pretty text-neutral-600">
                    <p>
                        BitTorrent is a general-purpose way to share files. It’s used to distribute Linux distributions,
                        open datasets, public-domain films, games and lots more. Joey is a tool for that, like a web browser
                        or an FTP client.
                    </p>
                    <p>
                        Joey doesn’t host, index, search for or link to any content. It only downloads what you open in it.
                        You’re responsible for what you download and share with Joey, and for making sure you have the right
                        to do so where you live. Please don’t use Joey to infringe anyone’s copyright.
                    </p>
                    <p>
                        Keep in mind that BitTorrent isn’t anonymous: everyone you download from or upload to can see your
                        IP address, and Joey uploads (seeds) the parts it has to others, as BitTorrent is designed to.
                    </p>
                </div>
            </section>

            <section id="complaints" class="grid scroll-mt-8 grid-cols-1 gap-x-12 gap-y-4 py-12 sm:grid-cols-[12rem_1fr]">
                <h2 class="font-display text-2xl font-semibold tracking-tight text-gum-950">Copyright complaints</h2>
                <div class="max-w-[65ch] space-y-4 text-base/7 text-pretty text-neutral-600">
                    <p>
                        Neither this website nor Joey stores or distributes files that people share over BitTorrent, so we
                        can’t remove them. If you find your work shared without permission, please contact the site that
                        lists the torrent or the provider of the people sharing it.
                    </p>
                </div>
            </section>

            <section id="warranty" class="grid scroll-mt-8 grid-cols-1 gap-x-12 gap-y-4 py-12 sm:grid-cols-[12rem_1fr]">
                <h2 class="font-display text-2xl font-semibold tracking-tight text-gum-950">No warranty</h2>
                <div class="max-w-[65ch] space-y-4 text-base/7 text-pretty text-neutral-600">
                    <p>
                        Joey is provided free of charge and “as is”, without any warranty, as described in sections 15 and 16 of
                        its license, the <a href="{{ $repository }}/blob/main/LICENSE" class="font-medium text-gum-800 hover:text-gum-600">GNU General Public License v3</a>.
                        To the extent the law allows, we’re not liable for any damage or loss from using it.
                    </p>
                </div>
            </section>

            <section id="privacy" class="grid scroll-mt-8 grid-cols-1 gap-x-12 gap-y-4 py-12 sm:grid-cols-[12rem_1fr]">
                <h2 class="font-display text-2xl font-semibold tracking-tight text-gum-950">Privacy</h2>
                <div class="max-w-[65ch] space-y-4 text-base/7 text-pretty text-neutral-600">
                    <p>
                        Joey has no accounts, ads or analytics, and sends nothing about you or your downloads to us.
                        Everything it remembers stays on your Mac.
                    </p>
                    <p>
                        To check for updates, Joey downloads a small file from GitHub, which sees your IP address like any
                        website you visit. You can turn automatic checks off in Joey’s settings.
                    </p>
                    <p>
                        This website doesn’t use analytics or tracking. It sets a session cookie that the website framework
                        needs to work, and our host keeps the usual server logs.
                    </p>
                </div>
            </section>

            <section id="open-source" class="grid scroll-mt-8 grid-cols-1 gap-x-12 gap-y-4 py-12 sm:grid-cols-[12rem_1fr]">
                <h2 class="font-display text-2xl font-semibold tracking-tight text-gum-950">Open source</h2>
                <div class="max-w-[65ch] space-y-4 text-base/7 text-pretty text-neutral-600">
                    <p>
                        Joey’s source code is <a href="{{ $repository }}" class="font-medium text-gum-800 hover:text-gum-600">on GitHub</a>.
                        Joey is built on open-source software, including libtorrent, mpv, FFmpeg, OpenSSL and Sparkle.
                        In Joey, choose <strong class="font-semibold text-neutral-700">Help → Acknowledgements</strong> to see every
                        library it includes, with its version, license and source code.
                    </p>
                    <p>
                        If you can’t get the source code of one of these libraries from there,
                        <a href="{{ $repository }}/issues" class="font-medium text-gum-800 hover:text-gum-600">open an issue</a>
                        and we’ll send it to you. This offer is valid for three years after the last release of Joey that
                        contains the library.
                    </p>
                </div>
            </section>

            <section id="trademarks" class="grid scroll-mt-8 grid-cols-1 gap-x-12 gap-y-4 py-12 sm:grid-cols-[12rem_1fr]">
                <h2 class="font-display text-2xl font-semibold tracking-tight text-gum-950">Trademarks</h2>
                <div class="max-w-[65ch] space-y-4 text-base/7 text-pretty text-neutral-600">
                    <p>
                        Mac and macOS are trademarks of Apple Inc. BitTorrent is a trademark of BitTorrent, Inc.
                        Joey isn’t affiliated with or endorsed by either.
                    </p>
                </div>
            </section>

            <section id="contact" class="grid scroll-mt-8 grid-cols-1 gap-x-12 gap-y-4 py-12 sm:grid-cols-[12rem_1fr]">
                <h2 class="font-display text-2xl font-semibold tracking-tight text-gum-950">Contact</h2>
                <div class="max-w-[65ch] space-y-4 text-base/7 text-pretty text-neutral-600">
                    <p>
                        Joey is made by <a href="https://kimiyu.ch" class="font-medium text-gum-800 hover:text-gum-600">kimiyu.ch</a>.
                        For questions or problems with the app, please
                        <a href="{{ $repository }}/issues" class="font-medium text-gum-800 hover:text-gum-600">open an issue on GitHub</a>.
                    </p>
                </div>
            </section>
        </div>
    </main>

    <x-site-footer />
</x-layouts.app>
