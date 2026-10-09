<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home');

// Source page for the Open Graph image; only reachable during local development.
if (app()->isLocal()) {
    Route::view('/og-image', 'og-image');
}
