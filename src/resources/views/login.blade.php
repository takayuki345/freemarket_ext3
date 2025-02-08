@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="css/login.css">
@endsection

@section('content')
<div class="login_wrapper">
    <h2 class="login_title">ログイン</h2>
    <div class="form_container">
        <form class="login_form" action="">
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
                <button>ログインする</button>
            </div>
        </form>
        <div class="link">
            <a href="">会員登録はこちら</a>
        </div>
    </div>
</div>
@endsection
