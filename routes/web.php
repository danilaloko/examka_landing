<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing.index');
});

// Дополнительные маршруты для лендинга
Route::get('/landing', function () {
    return view('landing.index');
});
