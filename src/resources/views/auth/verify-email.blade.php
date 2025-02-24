@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/verify-email.css') }}">
@endsection

@section('content')
    <div class="verify__wrapper">
        <p>登録していただいたメールアドレスに認証メールを送付しました。</p>
        <p>メール認証を完了してください。</p>
        <button class="to_verify" onclick="location.href='http://localhost:8025/'">認証はこちらから</button>
        <form action="/email/verification-notification" method="post">
            @csrf
            <button class="re_mail" type="submit">認証メールを再送する</button>
        </form>
    </div>
@endsection
