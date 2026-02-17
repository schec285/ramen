<header class="header">
    <div class="header__inner">
        <a href="{{ route('index') }}" class="header__identity">
            <img src="{{ asset('svg/steaming-bowl-svgrepo-com.svg') }}" class="header__logo">
            <h1 class="header__title">ラーメンブログ</h1>
        </a>
        <nav class="header__nav">
            <ul class="header__nav-list">
                <li class="header__nav-item">
                    <a href="./login.html" class="header__login-btn btn">ログイン</a> 
                </li>
                <li class="header__nav-item">
                    <a href="#" data-action="notImplemented" class="header__register-btn btn">新規登録</a>
                </li>
            </ul>
        </nav>
    </div>
</header>