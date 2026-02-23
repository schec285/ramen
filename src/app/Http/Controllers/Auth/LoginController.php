<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        // ログイン処理の実装（例: バリデーション、認証など）
        // ここでは仮に成功したとみなしてセッションをセットしてリダイレクト
        $request->session()->put('is_logged_in', true);
        return redirect()->route('blogs.index');
    }

    public function logout(Request $request)
    {
        // ログアウト処理の実装
        $request->session()->forget('is_logged_in');
        return redirect()->route('blogs.index');
    }
}
