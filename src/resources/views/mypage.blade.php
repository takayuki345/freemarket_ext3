@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
    <div class="mypage__wrapper">
        <div class="mypage__profile">
            <div class="mypage__profile-inner">
                <div class="mypage__profile-summary">
                    <div class="image">
                        @if (isset($userInfo->image))
                            <img src="{{ asset($userInfo->image) }}" alt="">
                        @else
                            <img src="{{ asset('img/no_image.jpg') }}" alt="">
                        @endif
                    </div>
                    <div class="user-info">
                        <div class="user-name">{{ $user->name }}</div>
                        <div class="evaluation @if($evaluation == 0) evaluation--hidden @endif">
                            @for ($i = 0; $i < $evaluation; $i++)
                                <div><img src="{{ asset('img/star_yellow.png') }}" alt=""></div>
                            @endfor
                            @for ($i = 0; $i < 5 - $evaluation; $i++)
                                <div><img src="{{ asset('img/star_gray.png') }}" alt=""></div>
                            @endfor
                        </div>
                    </div>
                </div>
                <a class="mypage__profile-edit" href="/mypage/profile">プロフィールを編集</a>
            </div>
        </div>
        <div class="mypage__menus">
            <ul class="mypage__menus-inner">
                <li class="mypage__menu-sell"><a href="/mypage?page=sell" @if($page == null || $page == 'sell') class="mypage__menu--red" @endif>出品した商品</a></li>
                <li class="mypage__menu-buy"><a href="/mypage?page=buy" @if($page == 'buy') class="mypage__menu--red" @endif>購入した商品</a></li>
                <li class="mypage__menu-trade">
                    <a href="/mypage?page=trade" @if($page == 'trade') class="mypage__menu--red" @endif>取引中の商品</a>
                    @if ($user->totalMessageCount() > 0)
                        <span class="trade-counts">{{ $user->totalMessageCount() }}</span>
                    @endif
                </li>
            </ul>
        </div>
        <div class="mypage__lists">
            <ul class="mypage__lists-inner">
                @if (!is_null($items))
                    @foreach ($items as $item)
                    <li class="mypage__list">
                        @if ($page == 'trade')
                        <a href="/mypage/trade/{{ $item->id }}">
                        @else
                        <a href="/item/{{ $item->id }}">
                        @endif
                            <img src="{{ asset($item->image) }}" alt="">
                            @if (!is_null($item->purchase_user_id))
                                <div class="mypage__list-sold">
                                    <p>Sold</p>
                                </div>
                            @endif
                            @if ($page == 'trade' && $item->messageCount($user->id) > 0)
                            <span class="mypage__list-trade-count">{{ $item->messageCount($user->id) }}</span>
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
