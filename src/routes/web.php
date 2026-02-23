<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/load-more', [BlogController::class, 'loadMore'])->name('blogs.loadMore'); // ブログの追加読み込み

Route::get('/blog/{blog}', [BlogController::class, 'show'])->name('blogs.show'); // ブログ詳細画面
