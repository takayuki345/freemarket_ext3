@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="index__wrapper">
        <div class="index__menus">
            <ul class="index__menus-inner">
                <li class="index__menu-recommend"><a href="/"
                        @if ($page != 'mylist') class="index__menu--red" @endif>おすすめ</a></li>
                <li class="index__menu-mylist"><a href="/?page=mylist"
                        @if ($page == 'mylist') class="index__menu--red" @endif>マイリスト</a></li>
            </ul>
        </div>
        <div class="index__lists">
            <ul class="index__lists-inner">
                @foreach ($items as $item)
                    <li class="index__list">
                        <a href="/item/{{ $item->id }}"><img src="{{ asset($item->image) }}" alt=""></a>
                        <span>{{ $item->name }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
