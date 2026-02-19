<header class="header">
    <div class="header__inner">
        <a href="{{ route('blogs.index') }}" class="header__identity">
            <img src="{{ asset('svg/steaming-bowl-svgrepo-com.svg') }}" class="header__logo">
            <h1 class="header__title">ラーメンブログ</h1>
        </a>
        <nav class="header__nav">
            <ul class="header__nav-list">
                <li class="header__nav-item">
                    <a href="#" class="header__login-btn btn" data-action="notImplemented">ログイン</a> 
                </li>
                <li class="header__nav-item">
                    <a href="#" class="header__register-btn btn" data-action="notImplemented">新規登録</a>
                </li>
            </ul>
        </nav>
    </div>
</header>