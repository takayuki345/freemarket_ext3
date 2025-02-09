@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="css/index.css">
@endsection

@section('content')
<div class="index__wrapper">
    <div class="index__menus">
        <ul class="index__menus-inner">
            <li class="index__menu-recommend"><a href="/">おすすめ</a></li>
            <li class="index__menu-mylist"><a href="/?page=mylist">マイリスト</a></li>
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
