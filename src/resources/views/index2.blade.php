@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="css/index2.css">
@endsection

@section('content')
<div class="index__wrapper">
    <div class="index__profile">
        <div class="index__profile-inner">
            <div class="index__profile-summary">
                <div class="image"><img src="{{ asset('../img/logo.svg') }}" alt=""></div>
                <div class="username">ユーザー名</div>
            </div>
            <button class="index__profile-edit">プロフィールを編集</button>
        </div>
    </div>
    <div class="index__menus">
        <ul class="index__menus-inner">
            <li class="index__menu-sell"><a href="/mypage?page=sell">出品した商品</a></li>
            <li class="index__menu-buy"><a href="/?mypage?page=buy">購入した商品</a></li>
        </ul>
    </div>
    <div class="index__lists">
        <ul class="index__lists-inner">
            <li class="index__list">
                <a href=""><img src="{{ asset('../img/HDD.jpg') }}" alt=""></a>
                <span>商品名</span>
            </li>
            <li class="index__list">
                <a href=""><img src="{{ asset('../img/コーヒーミル.jpg') }}" alt=""></a>
                <span>商品名</span>
            </li>
            <li class="index__list">
                <a href=""><img src="{{ asset('../img/ショルダーバッグ.jpg') }}" alt=""></a>
                <span>商品名</span>
            </li>
            <li class="index__list">
                <a href=""><img src="{{ asset('../img/タンブラー.jpg') }}" alt=""></a>
                <span>商品名</span>
            </li>
            <li class="index__list">
                <a href=""><img src="{{ asset('../img/ノートPC.jpg') }}" alt=""></a>
                <span>商品名</span>
            </li>
            <li class="index__list">
                <a href=""><img src="{{ asset('../img/マイク.jpg') }}" alt=""></a>
                <span>商品名</span>
            </li>
            <li class="index__list">
                <a href=""><img src="{{ asset('../img/HDD.jpg') }}" alt=""></a>
                <span>商品名</span>
            </li>
            <li class="index__list">
                <a href=""><img src="{{ asset('../img/コーヒーミル.jpg') }}" alt=""></a>
                <span>商品名</span>
            </li>
            <li class="index__list">
                <a href=""><img src="{{ asset('../img/ショルダーバッグ.jpg') }}" alt=""></a>
                <span>商品名</span>
            </li>
            <li class="index__list">
                <a href=""><img src="{{ asset('../img/タンブラー.jpg') }}" alt=""></a>
                <span>商品名</span>
            </li>
            <li class="index__list">
                <a href=""><img src="{{ asset('../img/ノートPC.jpg') }}" alt=""></a>
                <span>商品名</span>
            </li>
            <li class="index__list">
                <a href=""><img src="{{ asset('../img/マイク.jpg') }}" alt=""></a>
                <span>商品名</span>
            </li>
            <li class="index__list">
                <a href=""><img src="{{ asset('../img/HDD.jpg') }}" alt=""></a>
                <span>商品名</span>
            </li>
            <li class="index__list">
                <a href=""><img src="{{ asset('../img/コーヒーミル.jpg') }}" alt=""></a>
                <span>商品名</span>
            </li>
            <li class="index__list">
                <a href=""><img src="{{ asset('../img/ショルダーバッグ.jpg') }}" alt=""></a>
                <span>商品名</span>
            </li>
            <li class="index__list">
                <a href=""><img src="{{ asset('../img/タンブラー.jpg') }}" alt=""></a>
                <span>商品名</span>
            </li>
            <li class="index__list">
                <a href=""><img src="{{ asset('../img/ノートPC.jpg') }}" alt=""></a>
                <span>商品名</span>
            </li>
            <li class="index__list">
                <a href=""><img src="{{ asset('../img/マイク.jpg') }}" alt=""></a>
                <span>商品名</span>
            </li>
        </ul>
    </div>
</div>
@endsection
