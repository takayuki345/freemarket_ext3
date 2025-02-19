@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
    <div class="login__wrapper">
        <h2 class="login__title">メール認証してください！</h2>
        <form action="/email/verification-notification" method="post">
            @csrf
            <p>ご登録のメールに認証用のメールを再送する場合には以下の「再送」ボタンをクリックしてください。</p>
            <button type="submit">再送</button>
        </form>
    </div>
@endsection
