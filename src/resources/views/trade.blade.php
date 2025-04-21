
@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/trade.css') }}">
@endsection

@section('content')
<div class="trade__wrapper">
    <div class="left-container">
        <div class="left-container__title">その他の取引</div>
        <div class="left-container__items">
            @foreach ($otherItems as $otherItem)
            <a href="/mypage/trade/{{ $otherItem->id }}">{{ $otherItem->name }}</a>
            @endforeach
        </div>
    </div>
    <div class="right-container">
        <div class="right-container__inner">
            <div class="right-container__top">
                <div class="right-container__top-title">
                    <div class="partner-image">
                        @if ($item->user_id == $userId)
                        <img src="{{ asset($item->purchaseUser->userInfo->image) }}" alt="">
                        @else
                        <img src="{{ asset($item->user->userInfo->image) }}" alt="">
                        @endif
                    </div>
                    <div class="trade-title">「{{ $item->user_id == $userId ? $item->purchaseUser->name : $item->user->name }}」さんとの取引画面</div>
                </div>
                @if ($item->purchase_user_id == $userId)
                <div class="right-container__top-button">
                    <form action="/mypage/trade/{{ $item->id }}/complete" method="post">
                        @csrf
                        <button type="submit">取引を完了する</button>
                    </form>
                </div>
                @endif
                <div class="right-container__top-item-info">
                    <div class="item-image"><img src="{{ asset($item->image) }}" alt=""></div>
                    <div class="item-sub-info">
                        <div class="item-name">{{ $item->name }}</div>
                        <div class="item-price">￥<span>{{ number_format($item->price) }}</span>(税込)</div>
                    </div>
                </div>
            </div>
            <div class="right-container__middle" id="right-container-middle">

            @foreach ($item->messages as $message)
                @if ($message->user_id == $userId)
                <div class="right-container__middle-myself-message">
                    <div class="myself-image"><img src="{{ asset($message->user->userInfo->image) }}" alt=""></div>
                    <div class="myself-name">{{ $message->user->name }}</div>
                    <textarea class="myself-message" name="content" id="" form="myself_{{ $message->id }}">{{ $message->content }}</textarea>
                </div>
                <div class="right-container__middle-myself-image">
                    <img src="{{ asset($message->image) }}" alt="">
                </div>
                <div class="right-container__middle-myself-forms">
                    <form class="myself-edit" action="/mypage/trade/{{ $item->id }}/update/{{ $message->id }}" method="post" id="myself_{{ $message->id }}">
                        @csrf
                        <button type="submit">編集</button>
                    </form>
                    <form class="myself-delete" action="/mypage/trade/{{ $item->id }}/delete/{{ $message->id }}" method="post">
                        @csrf
                        <button type="submit">削除</button>
                    </form>
                </div>
                @else
                <div class="right-container__middle-partner-message">
                    <div class="partner-image2"><img src="{{ asset($message->user->userInfo->image) }}" alt=""></div>
                    <div class="partner-name">{{ $message->user->name }}</div>
                    <textarea  class="partner-message" name="" id="" readonly>{{ $message->content }}</textarea>
                </div>
                <div class="right-container__middle-partner-image">
                    <img src="{{ asset($message->image) }}" alt="">
                </div>
                @endif
            @endforeach

            </div>
            <div class="right-container__bottom">
                @if(count($errors) > 0)
                <div class="error">{{ $errors->first() }}</div>
                @endif
                <form action="/mypage/trade/{{ $item->id }}/add" method="post" enctype="multipart/form-data">
                    @csrf
                    <input class="post-message" type="text" name="content" placeholder="取引メッセージを記入してください">
                    <input class="post-file"id="image" type="file" src="" alt="" name="image">
                    <label class="post-label" for="image">画像を追加</label>
                    <button type="submit" class="post-button"><img src="{{ asset('img/post.png') }}" alt=""></button>
                </form>
            </div>
        </div>

         @if ($item->message_status == 2)
        <div class="modal">
            <div class="modal__title">取引が完了しました。</div>
            <div class="modal__contents">
                <div class="modal__contents-message">今回の取引相手はどうでしたか？</div>
                <div class="modal__contents-evaluation">
                    <label for="1"><img src="{{ asset('img/star_yellow.png') }}" alt="" data-index="1"></label><label for="2"><img src="{{ asset('img/star_yellow.png') }}" alt="" data-index="2"></label><label for="3"><img src="{{ asset('img/star_yellow.png') }}" alt="" data-index="3"></label><label for="4"><img src="{{ asset('img/star_gray.png') }}" alt="" data-index="4"></label><label for="5"><img src="{{ asset('img/star_gray.png') }}" alt="" data-index="5"></label>
                </div>
            </div>
            <div class="modal__send">
                <form action="/mypage/trade/{{ $item->id }}/send" method="post">
                    @csrf
                    <input class="radio" id="1" type="radio" name="evaluation" value="1">
                    <input class="radio" id="2" type="radio" name="evaluation" value="2">
                    <input class="radio" id="3" type="radio" name="evaluation" value="3" checked>
                    <input class="radio" id="4" type="radio" name="evaluation" value="4">
                    <input class="radio" id="5" type="radio" name="evaluation" value="5">
                    <input type="hidden" name="">
                    <button type="submit">送信する</button>
                </form>
            </div>
        </div>
        @endif
    </div>

     @if ($item->message_status == 2)
    <div class="overlay"></div>
    @endif

</div>
<script>
    window.addEventListener('load', function () {

        const area = document.getElementById('right-container-middle');
        area.scrollTop = area.scrollHeight;

        const imgs = document.querySelectorAll('.modal__contents-evaluation img');
        const radios = document.querySelectorAll('.radio');

        radios.forEach(radio => {
            radio.addEventListener('change', function() {

                const num = parseInt(this.value);

                imgs.forEach((img, idx) => {
                    if (idx < num) {
                        img.src = "{{ asset('img/star_yellow.png') }}";
                    } else {
                        img.src = "{{ asset('img/star_gray.png') }}";
                    }
                });
            });
        });

    });
</script>
@endsection
