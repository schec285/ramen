<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/load-more', [BlogController::class, 'loadMore'])->name('blogs.loadMore'); // ブログの追加読み込み

Route::get('/blog/{blog}', [BlogController::class, 'show'])->name('blogs.show'); // ブログ詳細画面
Route::get('/blog/create', [BlogController::class, 'create'])->name('blogs.create'); // ブログ投稿画面

Route::get('/auth/login', [LoginController::class, 'login'])->name('auth.login'); // ログイン画面
Route::post('/auth/login', [LoginController::class, 'authenticate']); // ログイン処理
Route::post('/auth/logout', [LoginController::class, 'logout'])->name('auth.logout'); // ログアウト処理