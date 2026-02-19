@extends('layouts.app', ['hideFooter' => true, 'hideHeaderNav' => true])

@section('content')
<main class="content">
        <section id="login" class="login section">
            <div class="container">
                <div class="login__body">
                    <div class="login__box">
                        <div class="login-heading">
                            <h1 class="login-heading__title">ログイン</h1>
                        </div>
                        <form class="login-form" method="POST" action="{{ route('auth.login') }}">
                            @csrf
                            <div class="login-from__items">
                                <label class="login-form__title" for="login-email">メールアドレス</label>
                                <input type="email" id="login-email" class="login-form__input">
                            </div>
                            <div class="login-form__items">
                                <label class="login-form__title" for="login-password">パスワード</label>
                                <input type="password" id="login-password" class="login-form__input">
                            </div>
                            <div class="login-form__items">
                                <a href="#" class="login-link" data-action="notImplemented">パスワードを忘れた場合</a>
                            </div>
                            <div class="login-form__items">
                                <button class="login-form__btn btn">ログイン</button>
                            </div>
                        </form>
                        <div class="login-divider">
                            <span class="login-divider__text">または</span>
                        </div>
                        <div class="login-register">
                            <p>アカウントをお持ちでない場合は<a href="#" class="login-link" data-action="notImplemented">新規作成</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection