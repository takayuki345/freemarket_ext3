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
                <img src="{{ asset('img/logo.svg') }}" alt="logo">
            </p>
            @if (Request::is('register') == false and Request::is('login') == false)
                <form class="header__search" action="">
                    <input type="text" name="keyword" placeholder="なにをお探しですか？">
                    {{-- <button>非表示ボタン</button> --}}
                </form>
                <nav class="header__nav">
                    <ul>
                        <li class="header__nav__login"><a href="/login">ログイン</a></li>
                        {{-- <li class="header__nav__logout"><a href="">ログアウト</a></li> --}}
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
