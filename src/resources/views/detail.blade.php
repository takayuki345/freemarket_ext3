@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="css/detail.css">
@endsection

@section('content')
<div class="detail__wrapper">
    <div class="left-container">
        <div class="item-image">
            <img src="{{ asset('img/腕時計.jpg') }}" alt="">
        </div>
    </div>
    <div class="right-container">
        <div class="right-container__inner">
            <h2 class="item-title">腕時計</h2>
            <div class="item-brand">ブランド名</div>
            <div class="item-price">￥<span>47,000</span>(税込)</div>
            <div class="counters">
                <div class="counter">
                    <div class="counter-icon"><img src="../img/星アイコン.svg" alt=""></div>
                    <div class="counter-value">3</div>
                </div>
                <div class="counter">
                    <div class="counter-icon"><img src="../img/ふきだしアイコン.svg" alt=""></div>
                    <div class="counter-value">1</div>
                </div>
            </div>
            <div class="purchase"><a href="">購入手続きへ</a></div>
            <h3 class="item-subtitle">商品説明</h3>
            <pre class="item-description">カラー：グレー
                新品
                商品の状態は良好です。傷もありません。

                購入後、即発送いたします。
            </pre>
            <h3 class="item-subtitle">商品の情報</h3>
            <table class="item-info">
                <tr>
                    <th>カテゴリー</th>
                    <td><span>洋服</span><span>メンズ</span><span>メンズ</span><span>メンズ</span><span>メンズ</span><span>メンズ</span><span>メンズ</span><span>メンズ</span><span>メンズ</span><span>メンズ</span><span>メンズ</span><span>メンズ</span><span>メンズ</span><span>メンズ</span><span>メンズ</span><span>メンズ</span><span>メンズ</span><span>メンズ</span></td>
                </tr>
                <tr>
                    <th>商品の状態</th>
                    <td>良好</td>
                </tr>
            </table>
            <h3 class="item-subtitle">コメント(1)</h3>
            <div class="comment-set">
                <div class="user-info">
                    <div class="user-image"><img src="{{ asset('../img/logo.svg') }}" alt=""></div>
                    <span class="user-name">admin</span>
                </div>
                <pre class="user-comment">こちらにコメントが入ります。</pre>
            </div>
            <h4 class="item-subtitle2">商品へのコメント</h4>
            <form class="post-comment" action="">
                <input type="hidden" name="item-id">
                <textarea name="" id="" cols="30" rows="10"></textarea>
                <button type="submit">コメントを送信する</button>
            </form>
        </div>
    </div>
</div>
@endsection
