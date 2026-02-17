<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/load-more', [HomeController::class, 'loadMore'])->name('blogs.loadMore');