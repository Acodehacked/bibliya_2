<?php

use App\Helpers\MetaTagHelper;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    // $meta = MetaTagHelper::generateMetaTags(
        // $page->title,
        // $page->description,
        // $page->keywords
    // );

    // return view('pages.show', compact('page', 'meta'));
    return Inertia::render('Welcome');
})->name('user.dashboard');

require __DIR__ . '/auth.php';
