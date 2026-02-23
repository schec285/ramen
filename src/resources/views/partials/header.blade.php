<header class="header">
    <div class="header__inner">
        <a href="{{ route('blogs.index') }}" class="header__identity">
            <img src="{{ asset('svg/steaming-bowl-svgrepo-com.svg') }}" class="header__logo">
            <h1 class="header__title">ラーメンブログ</h1>
        </a>
        @unless(isset($hideHeaderNav) && $hideHeaderNav)
            {{-- TODO: 仮実装 --}}
            @if(session('is_logged_in'))
                <nav class="header__nav">
                    <ul class="header__nav-list">
                        @if(!isset($hidePostBtn) || !$hidePostBtn)
                            <a href="{{ route('blogs.create') }}" class="header__create-btn btn">投稿</a>
                        @endif
                        <form method="POST" action="{{ route('auth.logout') }}" class="header__nav-item">
                            @csrf
                            <button type="submit" class="header__nav-link btn">ログアウト</button>
                        </form>
                    </ul>
                </nav>
            @else
                <nav class="header__nav">
                    <ul class="header__nav-list">
                        <li class="header__nav-item">
                            <a href="{{ route('auth.login') }}" class="header__login-btn btn">ログイン</a> 
                        </li>
                        <li class="header__nav-item">
                            <a href="#" class="header__register-btn btn" data-action="not-implemented">新規登録</a>
                        </li>
                    </ul>
                </nav>
            @endif
        @endunless
    </div>
</header>