<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/load-more', [BlogController::class, 'loadMore'])->name('blogs.loadMore'); // ブログの追加読み込み

// TODO: ミドルウェアで認証確認
Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');//->middleware('auth'); // ブログ投稿画面
Route::post('/blogs/create', [BlogController::class, 'store'])->name('blogs.store');//->middleware('auth'); // ブログ投稿処理
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show'); // ブログ詳細画面

Route::get('/auth/login', [LoginController::class, 'login'])->name('auth.login'); // ログイン画面
Route::post('/auth/login', [LoginController::class, 'authenticate']); // ログイン処理
Route::post('/auth/logout', [LoginController::class, 'logout'])->name('auth.logout'); // ログアウト処理