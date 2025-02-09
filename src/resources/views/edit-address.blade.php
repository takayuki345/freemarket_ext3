@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="css/edit-address.css">
@endsection

@section('content')
    <div class="address__wrapper">
        <h2 class="address__title">住所の変更</h2>
        <div class="address__container">
            <form class="address__form" action="">
                <div class="form-group">
                    <label for="name">郵便番号</label>
                    <input type="text" name="name">
                    <div class="error">
                        {{-- <ul>
                        <li>エラー</li>
                    </ul> --}}
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">住所</label>
                    <input type="text" name="email">
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
