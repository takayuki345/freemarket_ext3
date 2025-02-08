@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="css/register.css">
@endsection

@section('content')
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
@endsection
