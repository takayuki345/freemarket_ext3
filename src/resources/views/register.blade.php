<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COACHTECH フリマ</title>
    <link rel="stylesheet" href="css/reset2.css">
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
    {{-- {{ dd(Request::is('/register*')) }} --}}
    <header>
        <div class="header_wrapper">
            <p class="header_logo">
                <img src="img/logo.svg" alt="logo">
            </p>
            @if( Request::is('register') == false and Request::is('login') == false)
            <form class="header_search" action="">
                <input type="text" name="keyword" placeholder="なにをお探しですか？">
                {{-- <button>非表示ボタン</button> --}}
            </form>
            <nav class="header_nav">
                <ul>
                    <li class="header_nav__login"><a href="">ログイン</a></li>
                    {{-- <li class="header_nav__logout"><a href="">ログアウト</a></li> --}}
                    <li class="header_nav__mypage"><a href="">マイページ</a></li>
                    <li class="header_nav__sell"><a href="">出品</a></li>
                </ul>
            </nav>
            @endif
        </div>
    </header>
    <main class="main">
        <div class="register_wrapper">
            <h2 class="register_title">会員登録</h2>
            <div class="form_container">
                <form class="register_form" action="">
                    <div class="form_group">
                        <label for="name">ユーザー名</label>
                        <input type="text" name="name">
                        <div class="error">
                            {{-- <ul>
                                <li>エラー</li>
                            </ul> --}}
                        </div>
                    </div>
                    <div class="form_group">
                        <label for="email">メールアドレス</label>
                        <input type="text" name="email">
                        <div class="error">
                            {{-- <ul>
                                <li>エラー</li>
                            </ul> --}}
                        </div>
                    </div>
                    <div class="form_group">
                        <label for="password">パスワード</label>
                        <input type="password" name="password">
                        <div class="error">
                            {{-- <ul>
                                <li>エラー</li>
                            </ul> --}}
                        </div>
                    </div>
                    <div class="form_group">
                        <label for="password_confirmation">確認用パスワード</label>
                        <input type="password" name="password_confirmation">
                        <div class="error">
                            {{-- <ul>
                                <li>エラー</li>
                            </ul> --}}
                        </div>
                    </div>
                    <div class="form_group">
                        <button>登録する</button>
                    </div>
                </form>
                <div class="link">
                    <a href="">ログインはこちら</a>
                </div>
            </div>

        </div>
    </main>
</body>
</html>
