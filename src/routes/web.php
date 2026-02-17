<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/load-more', [HomeController::class, 'loadMore'])->name('blogs.loadMore'); // ブログの追加読み込み
Route::get('/blog/{id}', [HomeController::class, 'loadMore'])->name('blog'); // ブログ詳細画面
