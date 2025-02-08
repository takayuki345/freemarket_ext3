@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="css/edit-profile.css">
@endsection

@section('content')
<div class="profile_wrapper">
    <h2 class="profile_title">プロフィール設定</h2>
    <div class="form_container">
        <form class="profile_form" action="">
            <div class="form_group-image">
                <div class="image"></div>
                <label for="image">画像を選択する</label>
                <input type="file" name="image" id="image">
                <div class="error">
                    {{-- <ul>
                        <li>エラー</li>
                    </ul> --}}
                </div>
            </div>
            <div class="form_group">
                <label for="email">ユーザー名</label>
                <input type="text" name="email">
                <div class="error">
                    {{-- <ul>
                        <li>エラー</li>
                    </ul> --}}
                </div>
            </div>
            <div class="form_group">
                <label for="password">郵便番号</label>
                <input type="password" name="password">
                <div class="error">
                    {{-- <ul>
                        <li>エラー</li>
                    </ul> --}}
                </div>
            </div>
            <div class="form_group">
                <label for="password">住所</label>
                <input type="password" name="password">
                <div class="error">
                    {{-- <ul>
                        <li>エラー</li>
                    </ul> --}}
                </div>
            </div>
            <div class="form_group">
                <label for="password">建物名</label>
                <input type="password" name="password">
                <div class="error">
                    {{-- <ul>
                        <li>エラー</li>
                    </ul> --}}
                </div>
            </div>
            <div class="form_group">
                <button>更新する</button>
            </div>
        </form>
    </div>
</div>
@endsection
