@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
    <div class="mypage__wrapper">
        <div class="mypage__profile">
            <div class="mypage__profile-inner">
                <div class="mypage__profile-summary">
                    <div class="image"><img src="{{ asset($userInfo->image) }}" alt=""></div>
                    <div class="username">{{ $user->name }}</div>
                </div>
                <a class="mypage__profile-edit" href="/mypage/profile">プロフィールを編集</a>
            </div>
        </div>
        <div class="mypage__menus">
            <ul class="mypage__menus-inner">
                <li class="mypage__menu-sell"><a href="/mypage?page=sell" @if($page != 'buy') class="mypage__menu--red" @endif>出品した商品</a></li>
                <li class="mypage__menu-buy"><a href="/mypage?page=buy" @if($page == 'buy') class="mypage__menu--red" @endif>購入した商品</a></li>
            </ul>
        </div>
        <div class="mypage__lists">
            <ul class="mypage__lists-inner">
                @if (!is_null($items))
                @foreach ($items as $item)
                <li class="mypage__list">
                    <a href="/item/{{ $item->id }}">
                        <img src="{{ asset($item->image) }}" alt="">
                        @if (!is_null($item->purchase_user_id))
                        <div class="mypage__list-sold">
                            <p>Sold</p>
                        </div>
                        @endif
                    </a>
                    <span>{{ $item->name }}</span>
                </li>
                @endforeach
                @endif
            </ul>
        </div>
    </div>
@endsection
