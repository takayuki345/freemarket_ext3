@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/sell.css') }}">
@endsection

@section('content')
    <div class="sell__wrapper">
        <h2 class="sell__title">商品の出品</h2>
        <div class="sell__container">
            <form class="sell__form" action="/sell" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group-image">
                    <h4 class="image-title" for="">商品画像</h4>
                    <div class="image-select__container">
                        <img src="{{ asset('img/ノートPC.jpg') }}" alt="" id="image-target">
                        <label class="image-select" for="image">画像を選択する</label>
                    </div>
                    <input type="file" name="image" id="image">
                    @error('image')
                        <div class="error">
                            <ul>
                                <li>{{ $message }}</li>
                            </ul>
                        </div>
                    @enderror
                </div>
                <h3 class="sell__subtitle">商品の詳細</h3>
                <div class="form-group-category">
                    <h4>カテゴリー</h4>
                    <div class="category__container">
                        @foreach ($categories as $category)
                            <input id="{{ $category->id }}" type="checkbox" name="category[]" value="{{ $category->id }}" @if(old('category') !== null) @if(in_array($category->id, old('category'))) checked @endif @endif>
                            <label for="{{ $category->id }}">{{ $category->name }}</label>
                        @endforeach
                    </div>
                    @error('category')
                        <div class="error">
                            <ul>
                                <li>{{ $message }}</li>
                            </ul>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <h4>商品の状態</h4>
                    <div class="select-wrapper">
                        <select name="condition">
                            <option value="" hidden>選択してください</option>
                            @foreach ($conditions as $condition)
                                <option value="{{ $condition->id }}" @if ($condition->id == old('condition')) selected @endif>
                                    {{ $condition->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('condition')
                        <div class="error">
                            <ul>
                                <li>{{ $message }}</li>
                            </ul>
                        </div>
                    @enderror
                </div>
                <h3 class="sell__subtitle">商品名と説明</h3>
                <div class="form-group">
                    <h4>商品名</h4>
                    <input type="text" name="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="error">
                            <ul>
                                <li>{{ $message }}</li>
                            </ul>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <h4>商品の説明</h4>
                    {{-- <input type="password" name="password"> --}}
                    <textarea name="description" id="" cols="30" rows="10">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="error">
                            <ul>
                                <li>{{ $message }}</li>
                            </ul>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <h4>販売価格</h4>
                    <input type="text" name="price" value="{{ old('price') }}">
                    @error('price')
                        <div class="error">
                            <ul>
                                <li>{{ $message }}</li>
                            </ul>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <button>出品する</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        let image = document.getElementById('image');
        let imageTarget = document.getElementById('image-target');

        window.onload = function() {
            imageTarget.src = '';
        }

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
