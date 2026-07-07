<?php

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return "halaman homenya";
// });

Route::post('/theme-toggle', function (\Illuminate\Http\Request $request) {
    $theme = $request->input('theme', 'light');
    session(['theme' => $theme]);
    return response()->json(['status' => 'ok']);
});


// Route::get('/', function () {
//     return view('home', [
//         "tittle" => 'home',
//         'active' => 'home'
//     ]);
// });

Route::get('/', function () {
    return view('baru', [
        "tittle" => 'Fajar Nugraha',
        'active' => 'home'
    ]);
})->name('home');

Route::get('/project', function () {
    return view('project', [
        "tittle" => 'project',
        'active' => 'project'
    ]);
});

Route::get('/info', function () {
    return view('info', [
        "tittle" => 'info',
        'active' => 'info'
    ]);
});

Route::get('/contact', function () {
    return view('contact', [
        "tittle" => 'contact',
        'active' => 'contact'
    ]);
});

Route::get('/faq', function () {
    return view('faq', [
        "tittle" => 'faq',
        'active' => 'faq'
    ]);
});

Route::get('/copycat', function () {
    return view('copycat', [
        "tittle" => 'copycat',
        'active' => 'copycat'
    ]);
});
