<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'message' => 'Welcome to Inertia!'
    ]);
});

// Route::get('/', function () {
//     return view('welcome');
// });
