<?php

return [
    // GitHub repository of the macOS app; releases are published there.
    'repository_url' => env('JOEY_REPOSITORY_URL', 'https://github.com/kimiyuch/joey.app'),

    // Always points at the DMG of the latest release.
    'download_url' => env('JOEY_DOWNLOAD_URL', 'https://github.com/kimiyuch/joey.app/releases/latest/download/Joey.dmg'),

    // The app's CHANGELOG.md, attached to every release by its release.sh; the changelog page is built from it.
    'changelog_url' => env('JOEY_CHANGELOG_URL', 'https://github.com/kimiyuch/joey.app/releases/latest/download/CHANGELOG.md'),
];
