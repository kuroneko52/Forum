<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThreadController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('threads', ThreadController::class)->only([
    'index', 'create', 'store', 'show'
]);


