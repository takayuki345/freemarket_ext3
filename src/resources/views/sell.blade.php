@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="css/sell.css">
@endsection

@section('content')
<div class="sell__wrapper">
    <h2 class="sell__title">商品の出品</h2>
    <div class="sell__container">
        <form class="sell__form" action="">
            <div class="form-group-image">
                <h4 class="image-title" for="">商品画像</h4>
                <div class="image-select__container">
                    <label class="image-select" for="image">画像を選択する</label>
                </div>
                <input type="file" name="image" id="image">
                <div class="error">
                    {{-- <ul>
                        <li>エラー</li>
                    </ul> --}}
                </div>
            </div>
            <h3 class="sell__subtitle">商品の詳細</h3>
            <div class="form-group-category">
                <h4>カテゴリー</h4>
                <div class="category__container">
                    <input id="fashion" type="checkbox" name="category">
                    <label for="fashion">ファッション</label>
                    <input id="appliances" type="checkbox" name="category">
                    <label for="appliances">家電</label>
                    <input id="interior" type="checkbox" name="category">
                    <label for="interior">インテリア</label>
                    <input id="ladies" type="checkbox" name="category">
                    <label for="ladies">レディース</label>
                    <input id="mens" type="checkbox" name="category">
                    <label for="mens">メンズ</label>
                </div>
                <div class="error">
                    {{-- <ul>
                        <li>エラー</li>
                    </ul> --}}
                </div>
            </div>
            <div class="form-group">
                <h4 for="password">商品の状態</h4>
                {{-- <input type="password" name="password"> --}}
                <select name="" id="">
                    <option hidden>選択してください</option>
                    <option value="">　　良好</option>
                    <option value="">　　目立った傷や汚れなし</option>
                    <option value="">　　やや傷や汚れあり</option>
                    <option value="">　　状態が悪い</option>
                </select>
                <div class="error">
                    {{-- <ul>
                        <li>エラー</li>
                    </ul> --}}
                </div>
            </div>
            <h3 class="sell__subtitle">商品名と説明</h3>
            <div class="form-group">
                <h4 for="password">商品名</h4>
                <input type="text" name="password">
                <div class="error">
                    {{-- <ul>
                        <li>エラー</li>
                    </ul> --}}
                </div>
            </div>
            <div class="form-group">
                <h4 for="password">商品の説明</h4>
                {{-- <input type="password" name="password"> --}}
                <textarea name="" id="" cols="30" rows="10"></textarea>
                <div class="error">
                    {{-- <ul>
                        <li>エラー</li>
                    </ul> --}}
                </div>
            </div>
            <div class="form-group">
                <h4 for="password">販売価格</h4>
                <input type="text" name="password">
                <div class="error">
                    {{-- <ul>
                        <li>エラー</li>
                    </ul> --}}
                </div>
            </div>
            <div class="form-group">
                <button>出品する</button>
            </div>
        </form>
    </div>
</div>
@endsection
