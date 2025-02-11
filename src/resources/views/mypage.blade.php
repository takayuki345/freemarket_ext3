@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
    <div class="mypage__wrapper">
        <div class="mypage__profile">
            <div class="mypage__profile-inner">
                <div class="mypage__profile-summary">
                    <div class="image"><img src="{{ asset('../img/logo.svg') }}" alt=""></div>
                    <div class="username">ユーザー名</div>
                </div>
                {{-- <button class="mypage__profile-edit">プロフィールを編集</button> --}}
                <a class="mypage__profile-edit" href="/mypage/profile">プロフィールを編集</a>
            </div>
        </div>
        <div class="mypage__menus">
            <ul class="mypage__menus-inner">
                <li class="mypage__menu-sell"><a href="/mypage?page=sell">出品した商品</a></li>
                <li class="mypage__menu-buy"><a href="/?mypage?page=buy">購入した商品</a></li>
            </ul>
        </div>
        <div class="mypage__lists">
            <ul class="mypage__lists-inner">
                <li class="mypage__list">
                    <a href="/item/1"><img src="{{ asset('../img/HDD.jpg') }}" alt=""></a>
                    <span>商品名</span>
                </li>
                <li class="mypage__list">
                    <a href=""><img src="{{ asset('../img/コーヒーミル.jpg') }}" alt=""></a>
                    <span>商品名</span>
                </li>
                <li class="mypage__list">
                    <a href=""><img src="{{ asset('../img/ショルダーバッグ.jpg') }}" alt=""></a>
                    <span>商品名</span>
                </li>
                <li class="mypage__list">
                    <a href=""><img src="{{ asset('../img/タンブラー.jpg') }}" alt=""></a>
                    <span>商品名</span>
                </li>
                <li class="mypage__list">
                    <a href=""><img src="{{ asset('../img/ノートPC.jpg') }}" alt=""></a>
                    <span>商品名</span>
                </li>
                <li class="mypage__list">
                    <a href=""><img src="{{ asset('../img/マイク.jpg') }}" alt=""></a>
                    <span>商品名</span>
                </li>
                <li class="mypage__list">
                    <a href=""><img src="{{ asset('../img/HDD.jpg') }}" alt=""></a>
                    <span>商品名</span>
                </li>
                <li class="mypage__list">
                    <a href=""><img src="{{ asset('../img/コーヒーミル.jpg') }}" alt=""></a>
                    <span>商品名</span>
                </li>
                <li class="mypage__list">
                    <a href=""><img src="{{ asset('../img/ショルダーバッグ.jpg') }}" alt=""></a>
                    <span>商品名</span>
                </li>
                <li class="mypage__list">
                    <a href=""><img src="{{ asset('../img/タンブラー.jpg') }}" alt=""></a>
                    <span>商品名</span>
                </li>
                <li class="mypage__list">
                    <a href=""><img src="{{ asset('../img/ノートPC.jpg') }}" alt=""></a>
                    <span>商品名</span>
                </li>
                <li class="mypage__list">
                    <a href=""><img src="{{ asset('../img/マイク.jpg') }}" alt=""></a>
                    <span>商品名</span>
                </li>
                <li class="mypage__list">
                    <a href=""><img src="{{ asset('../img/HDD.jpg') }}" alt=""></a>
                    <span>商品名</span>
                </li>
                <li class="mypage__list">
                    <a href=""><img src="{{ asset('../img/コーヒーミル.jpg') }}" alt=""></a>
                    <span>商品名</span>
                </li>
                <li class="mypage__list">
                    <a href=""><img src="{{ asset('../img/ショルダーバッグ.jpg') }}" alt=""></a>
                    <span>商品名</span>
                </li>
                <li class="mypage__list">
                    <a href=""><img src="{{ asset('../img/タンブラー.jpg') }}" alt=""></a>
                    <span>商品名</span>
                </li>
                <li class="mypage__list">
                    <a href=""><img src="{{ asset('../img/ノートPC.jpg') }}" alt=""></a>
                    <span>商品名</span>
                </li>
                <li class="mypage__list">
                    <a href=""><img src="{{ asset('../img/マイク.jpg') }}" alt=""></a>
                    <span>商品名</span>
                </li>
            </ul>
        </div>
    </div>
@endsection
