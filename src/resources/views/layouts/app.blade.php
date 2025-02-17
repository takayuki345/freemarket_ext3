<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COACHTECH フリマ</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__wrapper">
            <p class="header__logo">
                <a href="/">
                    <img src="{{ asset('img/logo.svg') }}" alt="logo">
                </a>
            </p>
            @if (Request::is('register') == false and Request::is('login') == false)
                <form class="header__search" action="/" method="get">
                    <input type="text" name="keyword" @if(isset($keyword)) value="{{ $keyword }}" @endif id="keyword-search" placeholder="なにをお探しですか？">
                </form>
                <nav class="header__nav">
                    <ul>
                        @if (Auth::check())
                            <li class="header__nav__logout">
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit">ログアウト</button>
                                </form>
                            </li>
                        @else
                            <li class="header__nav__login"><a href="/login">ログイン</a></li>
                        @endif
                        <li class="header__nav__mypage"><a href="/mypage">マイページ</a></li>
                        <li class="header__nav__sell"><a href="/sell">出品</a></li>
                    </ul>
                </nav>
            @endif
        </div>
    </header>
    <main class="main">
        @yield('content')
    </main>
</body>

</html>
