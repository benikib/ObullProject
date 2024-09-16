<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homePage');
});





Route::get('/home', function () {
    return view('homePage');
});

Route::get('/indexProf', function () {
    return view('prof.index');
});

Route::get('/login', function () {
    return view('auth.login');
})->name("login");

Route::get('/create', function () {
    return view('ecole.create');
})->name("create");








