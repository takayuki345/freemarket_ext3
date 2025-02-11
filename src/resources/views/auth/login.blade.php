@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
    <div class="login__wrapper">
        <h2 class="login__title">ログイン</h2>
        <div class="login__container">
            <form class="login__form" action="/login" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="text" name="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="error">
                            <ul>
                                <li>{{ $message }}</li>
                            </ul>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">パスワード</label>
                    <input type="password" name="password">
                    @error('password')
                        <div class="error">
                            <ul>
                                <li>{{ $message }}</li>
                            </ul>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <button>ログインする</button>
                </div>
            </form>
            <div class="link">
                <a href="/register">会員登録はこちら</a>
            </div>
        </div>
    </div>
@endsection
