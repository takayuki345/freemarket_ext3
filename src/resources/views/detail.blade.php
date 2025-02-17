@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
    <div class="detail__wrapper">
        <div class="left-container">
            <div class="item-image">
                <img src="{{ asset($item->image) }}" alt="">
                @if (!is_null($item->purchase_user_id))
                <div class="item-image-sold">
                    <p>Sold</p>
                </div>
                @endif
            </div>
        </div>
        <div class="right-container">
            <div class="right-container__inner">
                <h2 class="item-title">{{ $item->name }}</h2>
                <div class="item-brand">{{ $item->brand }}</div>
                <div class="item-price">￥<span>{{ $item->price }}</span>(税込)</div>
                <div class="counters">
                    <div class="counter">
                        <div class="counter-icon">
                            <a href="/item/{{ $item->id }}/like">
                                <img @if ($liked) class="liked" @endif
                                    src="{{ asset('../img/星アイコン.svg') }}" alt="">
                            </a>
                        </div>
                        <div class="counter-value">{{ $likedCount }}</div>
                    </div>
                    <div class="counter">
                        <div class="counter-icon"><img src="{{ asset('../img/ふきだしアイコン.svg') }}" alt=""></div>
                        <div class="counter-value">{{ $comments->count() }}</div>
                    </div>
                </div>
                <div class="purchase"><a href="/purchase/{{ $item->id }}">購入手続きへ</a></div>
                <h3 class="item-subtitle">商品説明</h3>
                <pre class="item-description">{{ $item->description }}</pre>
                <h3 class="item-subtitle">商品の情報</h3>
                <table class="item-info">
                    <tr>
                        <th>カテゴリー</th>
                        <td>
                            @foreach ($categories as $category)
                                <span>{{ $category->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>商品の状態</th>
                        <td>{{ $condition->name }}</td>
                    </tr>
                </table>
                <h3 class="item-subtitle">コメント({{ $comments->count() }})</h3>
                <div class="comment-set">
                    @foreach ($comments as $comment)
                        <div class="user-info">
                            <div class="user-image"><img src="{{ asset($comment->commentUser->userInfo->image) }}" alt=""></div>
                            <span class="user-name">{{ $comment->commentUser->name }}</span>
                        </div>
                        <pre class="user-comment">{{ $comment->content }}</pre>
                    @endforeach
                </div>
                <h4 class="item-subtitle2">商品へのコメント</h4>
                <form class="post-comment" action="/item/comment" method="post">
                    @csrf
                    <input type="hidden" name="item_id" value="{{ $item->id }}">
                    <textarea name="content" id="" cols="30" rows="10"></textarea>
                    @error('content')
                        <div class="error">
                            <ul>
                                <li>{{ $message }}</li>
                            </ul>
                        </div>
                    @enderror
                    <button type="submit">コメントを送信する</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        window.onload = function() {
            sessionStorage.removeItem('payment_id');
        }
    </script>
@endsection
