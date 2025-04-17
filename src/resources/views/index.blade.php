@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="index__wrapper">
        <div class="index__menus">
            <ul class="index__menus-inner">
                <li class="index__menu-recommend"><a href="/" id="recommend"
                        @if ($page != 'mylist') class="index__menu--red" @endif>おすすめ</a></li>
                <li class="index__menu-mylist"><a href="/?page=mylist" id="likes"
                        @if ($page == 'mylist') class="index__menu--red" @endif>マイリスト</a></li>
            </ul>
        </div>
        @if (session('message'))
            <div class="index__message">
                <p>{{ session('message') }}</p>
            </div>
        @endif
        <div class="index__lists">
            <ul class="index__lists-inner">
                @foreach ($items as $item)
                    <li class="index__list">
                        <a href="/item/{{ $item->id }}">
                            <img src="{{ asset($item->image) }}" alt="">
                            @if(!is_null($item->purchase_user_id))
                            <div class="index__list-sold">
                                <p>Sold</p>
                            </div>
                            @endif
                        </a>
                        <span>{{ $item->name }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <script>

        let keywordSearch = document.getElementById('keyword-search');
        let recommend = document.getElementById('recommend');
        let likes = document.getElementById('likes');

        function setLink() {
            keyword = keywordSearch.value;
            if (keyword) {
                recommend.setAttribute('href', '/?keyword=' + keyword);
                likes.setAttribute('href', '/?page=mylist&keyword=' + keyword);
            }
        }

        window.onload = setLink;
        keywordSearch.onchange = setLink;

    </script>
@endsection
