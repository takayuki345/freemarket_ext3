@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/verify-email.css') }}">
@endsection

@section('content')
    <div class="verify__wrapper">
        <h2 class="verify__title">メール認証してください！</h2>
        <form action="/email/verification-notification" method="post">
            @csrf
            <p>ご登録メール宛てに、認証用メールをお送りしております。
                <br>こちらの画面は一旦閉じ、「Verify Email Address」を<br>クリックしてアプリを起動しなおして下さい。<br>
                <br>尚、ご登録メール宛てに認証用のメールを再送する場合には<br>以下の「再送」ボタンをクリックしてください。</p><br>
            <button type="submit">再送</button>
        </form>
    </div>
@endsection
