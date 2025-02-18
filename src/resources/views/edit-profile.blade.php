@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/edit-profile.css') }}">
@endsection

@section('content')
    <div class="profile__wrapper">
        <h2 class="profile__title">プロフィール設定</h2>
        <div class="profile__container">
            <form class="profile__form" action="/mypage/profile" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group-image">
                    <div class="image-container"><img id="image-target" src="{{ asset($userInfo['image']) }}" alt=""></div>
                    <label for="image">画像を選択する</label>
                    <input type="file" name="image" id="image">
                </div>
                @error('image')
                    <ul class="error">
                        <li>{{ $message }}</li>
                    </ul>
                @enderror
                <div class="form-group">
                    <label for="name">ユーザー名</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}">
                    @error('name')
                        <ul class="error">
                            <li>{{ $message }}</li>
                        </ul>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="post_code">郵便番号</label>
                    <input type="text" name="post_code" value="{{ old('post_code', $userInfo['post_code']) }}">
                    @error('post_code')
                        <ul class="error">
                            <li>{{ $message }}</li>
                        </ul>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">住所</label>
                    <input type="text" name="address" value="{{ old('address', $userInfo['address']) }}">
                    @error('address')
                        <ul class="error">
                            <li>{{ $message }}</li>
                        </ul>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="building">建物名</label>
                    <input type="text" name="building" value="{{ old('building', $userInfo['building']) }}">
                    @error('building')
                        <ul class="error">
                            <li>{{ $message }}</li>
                        </ul>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit">{{ $button }}</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        let image = document.getElementById('image');
        let imageTarget = document.getElementById('image-target');

        image.addEventListener('change', (e) => {

            let file = e.target.files[0];

            let fileReader = new FileReader();
            fileReader.readAsDataURL(file);

            fileReader.addEventListener('load', (e) => {
                imageTarget.src = e.target.result;
            });
        });
    </script>
@endsection
