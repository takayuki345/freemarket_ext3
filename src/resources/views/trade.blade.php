
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
                        <div>
                            <button type="submit">取引を完了する</button>
                            <p>
                                {{ session('message') }}
                            </p>
                        </div>
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
            @php
                $myselfMessageCount = 0;
            @endphp
            @foreach ($item->messages as $message)
                @if ($message->user_id == $userId)
                <div class="right-container__middle-myself-message">
                    <div class="myself-image"><img src="{{ asset($message->user->userInfo->image) }}" alt=""></div>
                    <div class="myself-name">{{ $message->user->name }}</div>
                    <textarea class="myself-message" name="content_edit[{{ $myselfMessageCount }}]" id="myself-message" form="myself_{{ $myselfMessageCount }}" readonly>{{ old('content_edit.' . $myselfMessageCount, $message->content) }}</textarea>
                </div>
                <div class="error2">
                    @if($errors->has('content_edit.' . $myselfMessageCount) || $errors->has('post_image.' . $myselfMessageCount))
                        {{ $errors->first('content_edit.' . $myselfMessageCount) ? $errors->first('content_edit.' . $myselfMessageCount) : $errors->first('post_image.' . $myselfMessageCount) }}
                    @endif
                </div>
                <div class="right-container__middle-myself-image">
                    <label class="post-image-label">
                    <img class="post-image-target" src="{{ asset($message->image) }}" alt="" >
                    </label>
                    <input type="file" class="post-image" name="post_image[{{ $myselfMessageCount }}]" id="post-image-{{ $myselfMessageCount }}"  form="myself_{{ $myselfMessageCount }}">
                </div>
                <div class="right-container__middle-myself-buttons">
                    <form class="myself-update-form" action="/mypage/trade/{{ $item->id }}/update/{{ $message->id }}" method="post"  id="myself_{{ $myselfMessageCount }}" enctype="multipart/form-data">
                        @csrf
                        <button class="myself-update" type="submit">更新</button>
                    </form>
                    <label class="myself-image-edit" for="post-image-{{ $myselfMessageCount }}">画像</label>
                    <button class="myself-edit-cancel">編集取消</button>
                    <button class="myself-edit">編集</button>
                    <form class="myself-delete-form" action="/mypage/trade/{{ $item->id }}/delete/{{ $message->id }}" method="post">
                        @csrf
                        <button class="myself-delete" type="submit">削除</button>
                    </form>
                </div>
                    @php
                        $myselfMessageCount++;
                    @endphp
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
                <form action="/mypage/trade/{{ $item->id }}/add" method="post" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->has('content') || $errors->has('image'))
                        @if ($errors->has('content'))
                            <div class="error">{{ $errors->first('content') }}</div>
                        @elseif ($errors->has('image'))
                            <div class="error">{{ $errors->first('image') }}</div>
                        @endif
                    @endif
                    <input class="post-message" type="text" name="content" placeholder="取引メッセージを記入してください" id="post-message" value="{{ old('content') }}">
                    <input class="post-file"id="post-file" type="file" src="" alt="" name="image">
                    <label class="post-label" for="post-file">画像を追加</label>
                    <div class="image-name" id="image-name"></div>
                    <button type="submit" class="post-button" id="post-button"><img src="{{ asset('img/post.png') }}" alt=""></button>
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
    const targetArea = document.getElementById('right-container-middle');
    const imgs = document.querySelectorAll('.modal__contents-evaluation img');
    const radios = document.querySelectorAll('.radio');
    const postMsg = document.getElementById('post-message');
    const postFile = document.getElementById('post-file');
    const imgName = document.getElementById('image-name');
    const postBtn = document.getElementById('post-button');
    const messages = document.querySelectorAll('.myself-message');
    const updateForms = document.querySelectorAll('.myself-update-form');
    const updates = document.querySelectorAll('.myself-update');
    const imgEdits = document.querySelectorAll('.myself-image-edit');
    const editCancels = document.querySelectorAll('.myself-edit-cancel');
    const edits = document.querySelectorAll('.myself-edit');
    const Deletes = document.querySelectorAll('.myself-delete');
    const postImgs = document.querySelectorAll('.post-image');
    const postImgLabels = document.querySelectorAll('.post-image-label');
    const postImgTargets = document.querySelectorAll('.post-image-target');


    function setImgName() {
        if (postFile.files.length > 0) {
            imgName.textContent = postFile.files[0].name;
        } else {
            imgName.textContent = '画像選択なし';
        }
    }
    postBtn.addEventListener('click', function () {
        localStorage.setItem('clickFlg', 1);
    });
    window.addEventListener('DOMContentLoaded', function () {

        let scrollPosition = localStorage.getItem('scrollPosition');
        if (scrollPosition != null) {
            targetArea.scrollTop = parseInt(scrollPosition, 10)
            localStorage.removeItem('scrollPosition');
        } else {
            targetArea.scrollTop = targetArea.scrollHeight;
        }

        if (localStorage.getItem('clickFlg') == 1) {
            localStorage.removeItem('clickFlg');
            localStorage.removeItem('msg');
        } else {
            postMsg.value = localStorage.getItem('msg');
        }

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

        postFile.addEventListener('change', setImgName);

        setImgName();

        updates.forEach((update) => {
            update.addEventListener('click', () => {
                localStorage.setItem('scrollPosition', targetArea.scrollTop);
            });
        });
        edits.forEach((edit, idx) => {
            edit.addEventListener('click', () => {
                messages[idx].readOnly = false;
                messages[idx].style.outline = '2px solid black';
                messages[idx].focus();
                edits[idx].style.display = 'none';
                updateForms[idx].style.display = 'unset';
                imgEdits[idx].style.display = 'unset';
                postImgLabels[idx].setAttribute('for', 'post-image-' + idx);
                postImgLabels[idx].style.cursor = 'pointer';
                editCancels[idx].style.display = 'unset';
                Deletes[idx].style.display = 'none';
                localStorage.setItem('scrollPosition', targetArea.scrollTop);
            });
        });
        editCancels.forEach((editCancel) => {
            editCancel.addEventListener('click', () => {
                localStorage.setItem('scrollPosition', targetArea.scrollTop);
                window.location.reload();
            });
        });
        Deletes.forEach((Delete) => {
            Delete.addEventListener('click', () => {
            localStorage.setItem('scrollPosition', targetArea.scrollTop);
            });
        });
        @if ($errors->has('content_edit.*'))
            const idx = @json(array_key_first($errors->getMessages())).split('.')[1];
            messages[idx].readOnly = false;
            messages[idx].style.outline = '2px solid black';
            messages[idx].focus();
            edits[idx].style.display = 'none';
            updateForms[idx].style.display = 'unset';
            imgEdits[idx].style.display = 'unset';
            postImgLabels[idx].setAttribute('for', 'post-image-' + idx);
            postImgLabels[idx].style.cursor = 'pointer';
            editCancels[idx].style.display = 'unset';
            Deletes[idx].style.display = 'none';
        @endif
        postImgs.forEach((postImg, idx) => {
            postImg.addEventListener('change', (e) => {

                let file = e.target.files[0];
                let fileReader = new FileReader();

                fileReader.readAsDataURL(file);

                fileReader.addEventListener('load', (e) => {
                    postImgTargets[idx].src = e.target.result;
                });
            });
        });
    });
    window.addEventListener('beforeunload', function () {
        let msg = postMsg.value.trim();
        if (msg != '') {
            localStorage.setItem('msg', msg);
        }
    });
</script>
@endsection
