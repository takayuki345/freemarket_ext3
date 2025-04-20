
@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/trade.css') }}">
@endsection

@section('content')
<div class="trade__wrapper">
    <div class="left-container">
        <div class="left-container__title">その他の取引</div>
        <div class="left-container__items">
            <a href="">test</a>
            <a href="">testaaaaaaaaaaaaaaaaaa</a>
            @for ($i = 0; $i < 100; $i++)
            <a href="">商品名０１</a>
            @endfor
        </div>
    </div>
    <div class="right-container">
        <div class="right-container__inner">
            <div class="right-container__top">
                <div class="right-container__top-title">
                    <div class="partner-image">
                        <img src="{{ asset('storage/profile_images/bell.jpg') }}" alt="">
                    </div>
                    <div class="trade-title">「ユーザー名」さんとの取引画面</div>
                </div>
                <div class="right-container__top-button">
                    <form action="">
                        <button>取引を完了する</button>
                    </form>
                </div>
                <div class="right-container__top-item-info">
                    <div class="item-image"><img src="{{ asset('storage/item_images/HDD.jpg') }}" alt=""></div>
                    <div class="item-sub-info">
                        <div class="item-name">商品名</div>
                        <div class="item-price">商品価格</div>
                    </div>
                </div>
            </div>
            <div class="right-container__middle">

                <div class="right-container__middle-partner-message">
                    <div class="partner-image2"><img src="{{ asset('storage/profile_images/bell.jpg') }}" alt=""></div>
                    <div class="partner-name">パートナー名</div>
                    <textarea  class="partner-message" name="" id="">相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！</textarea>
                </div>
                <div class="right-container__middle-myself-message">
                    <div class="myself-image"><img src="{{ asset('storage/profile_images/car.jpg') }}" alt=""></div>
                    <div class="myself-name">自分の名</div>
                    <textarea class="myself-message" name="" id="">自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！</textarea>
                    <div class="myself-forms">
                        <form class="myself-edit" action="">
                            <button>編集</button>
                        </form>
                        <form class="myself-delete" action="">
                            <button>削除</button>
                        </form>
                    </div>
                </div>
                
                <div class="right-container__middle-partner-message">
                    <div class="partner-image2"><img src="{{ asset('storage/profile_images/bell.jpg') }}" alt=""></div>
                    <div class="partner-name">パートナー名</div>
                    <textarea  class="partner-message" name="" id="">相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！相手のメッセージ！</textarea>
                </div>
                <div class="right-container__middle-myself-message">
                    <div class="myself-image"><img src="{{ asset('storage/profile_images/car.jpg') }}" alt=""></div>
                    <div class="myself-name">自分の名</div>
                    <textarea class="myself-message" name="" id="">自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！自分のメッセージ！</textarea>
                    <div class="myself-forms">
                        <form class="myself-edit" action="">
                            <button>編集</button>
                        </form>
                        <form class="myself-delete" action="">
                            <button>削除</button>
                        </form>
                    </div>
                </div>

            </div>
            <div class="right-container__bottom">
                <form action="">
                    <input class="post-message" type="text" placeholder="取引メッセージを記入してください">
                    <input class="post-file"id="image" type="file" src="" alt="">
                    <label class="post-label" for="image">画像を追加</label>
                    <button class="post-button"><img src="{{ asset('img/post.png') }}" alt=""></button>
                </form>
            </div>
        </div>
        <div class="modal">
            <div class="modal__title">取引が完了しました。</div>
            <div class="modal__contents">
                <div class="modal__contents-message">今回の取引相手はどうでしたか？</div>
                <div class="modal__contents-evaluation">
                    <label for="1"><img src="{{ asset('img/star_yellow.png') }}" alt=""></label><label for="2"><img src="{{ asset('img/star_yellow.png') }}" alt=""></label><label for="3"><img src="{{ asset('img/star_yellow.png') }}" alt=""></label><label for="4"><img src="{{ asset('img/star_yellow.png') }}" alt=""></label><label for="5"><img src="{{ asset('img/star_yellow.png') }}" alt=""></label>
                </div>
            </div>
            <div class="modal__button">
                <form action="">
                    <input class="radio" id="1" type="radio" name="evaluation" value="1">
                    <input class="radio" id="2" type="radio" name="evaluation" value="2">
                    <input class="radio" id="3" type="radio" name="evaluation" value="3">
                    <input class="radio" id="4" type="radio" name="evaluation" value="4">
                    <input class="radio" id="5" type="radio" name="evaluation" value="5">
                    <input type="hidden" name="">
                    <button>送信する</button>
                </form>
            </div>
        </div>
    </div>
    <div class="overlay"></div>
</div>
@endsection
