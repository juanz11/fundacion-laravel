<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/quienes-somos', function () {
    return view('quienes-somos');
});

Route::get('/programas', function () {
    return view('programas');
});

Route::get('/contacto', function () {
    return view('contacto');
});
