<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReplyController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('threads/{thread}/replies', [ReplyController::class, 'store'])->name('replies.store');
