@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="css/register.css">
@endsection

@section('content')
<div class="register__wrapper">
    <h2 class="register__title">会員登録</h2>
    <div class="register__container">
        <form class="register__form" action="">
            <div class="form-group">
                <label for="name">ユーザー名</label>
                <input type="text" name="name">
                <div class="error">
                    {{-- <ul>
                        <li>エラー</li>
                    </ul> --}}
                </div>
            </div>
            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="text" name="email">
                <div class="error">
                    {{-- <ul>
                        <li>エラー</li>
                    </ul> --}}
                </div>
            </div>
            <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" name="password">
                <div class="error">
                    {{-- <ul>
                        <li>エラー</li>
                    </ul> --}}
                </div>
            </div>
            <div class="form-group">
                <label for="password_confirmation">確認用パスワード</label>
                <input type="password" name="password_confirmation">
                <div class="error">
                    {{-- <ul>
                        <li>エラー</li>
                    </ul> --}}
                </div>
            </div>
            <div class="form-group">
                <button>登録する</button>
            </div>
        </form>
        <div class="link">
            <a href="">ログインはこちら</a>
        </div>
    </div>
</div>
@endsection
