# joey.web

The website for [Joey](https://github.com/kimiyuch/joey.app), a small BitTorrent client for macOS. Live at [joey.kimiyu.ch](https://joey.kimiyu.ch).

A single-page Laravel 13 site styled with Tailwind CSS 4.

## Local development

The site runs in [Herd](https://herd.laravel.com) at `https://joey.web.test`.

```sh
composer install
npm install
cp .env.example .env && php artisan key:generate
npm run dev       # or: npm run build
```

## Deploying

```sh
npm run build     # if you changed the design; commit public/build
./deploy.sh
```

`deploy.sh` runs the tests, exports the committed code, installs production dependencies and syncs it to Hostpoint over SSH with your own key. The server's `.env`, `public/.htaccess` (the PHP version is set there through the Hostpoint panel) and `storage/` are left alone. GitHub Actions only runs the tests.

## Where things are

| | |
|---|---|
| `resources/views/home.blade.php` | The landing page |
| `resources/views/components/app-window.blade.php` | The Joey window mock in the hero |
| `resources/views/components/layouts/app.blade.php` | The HTML shell, fonts and meta tags |
| `resources/css/app.css` | Theme colors (`gum` for eucalyptus, `pouch` for folder blue) and fonts |
| `config/joey.php` | Repository and download links |

Downloads always point at the latest GitHub release (`releases/latest/download/Joey.dmg`), so publishing a new version of the app doesn't require a change here.
