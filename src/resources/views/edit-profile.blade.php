@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/edit-profile.css') }}">
@endsection

@section('content')
<div class="profile__wrapper">
    <h2 class="profile__title">プロフィール設定</h2>
    <div class="profile__container">
        <form class="profile__form" action="">
            <div class="form-group-image">
                <div class="image"></div>
                <label for="image">画像を選択する</label>
                <input type="file" name="image" id="image">
                <div class="error">
                    {{-- <ul>
                        <li>エラー</li>
                    </ul> --}}
                </div>
            </div>
            <div class="form-group">
                <label for="email">ユーザー名</label>
                <input type="text" name="email">
                <div class="error">
                    {{-- <ul>
                        <li>エラー</li>
                    </ul> --}}
                </div>
            </div>
            <div class="form-group">
                <label for="password">郵便番号</label>
                <input type="password" name="password">
                <div class="error">
                    {{-- <ul>
                        <li>エラー</li>
                    </ul> --}}
                </div>
            </div>
            <div class="form-group">
                <label for="password">住所</label>
                <input type="password" name="password">
                <div class="error">
                    {{-- <ul>
                        <li>エラー</li>
                    </ul> --}}
                </div>
            </div>
            <div class="form-group">
                <label for="password">建物名</label>
                <input type="password" name="password">
                <div class="error">
                    {{-- <ul>
                        <li>エラー</li>
                    </ul> --}}
                </div>
            </div>
            <div class="form-group">
                <button>更新する</button>
            </div>
        </form>
    </div>
</div>
@endsection
