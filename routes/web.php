<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('send-contact', [HomeController::class, 'send'])->name('contact');
Route::get('articles', [HomeController::class, 'articles'])->name('articles');
Route::get('articles/{slug}', [HomeController::class, 'article'])->name('article');