@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/edit-address.css') }}">
@endsection

@section('content')
    <div class="address__wrapper">
        <h2 class="address__title">住所の変更</h2>
        <div class="address__container">
            <form class="address__form" action="/purchase/address/{{ $item_id }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="post_code">郵便番号</label>
                    <input type="text" name="post_code" value="{{ old('post_code', $purchaseInfo['post_code']) }}">
                    @error('post_code')
                    <div class="error">
                        <ul>
                            <li>{{ $message }}</li>
                        </ul>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">住所</label>
                    <input type="text" name="address" value="{{ old('address', $purchaseInfo['address']) }}">
                    @error('address')
                    <div class="error">
                        <ul>
                            <li>{{ $message }}</li>
                        </ul>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="building">建物名</label>
                    <input type="text" name="building" value="{{ old('building', $purchaseInfo['building']) }}">
                    @error('building')
                    <div class="error">
                        <ul>
                            <li>{{ $message }}</li>
                        </ul>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit">更新する</button>
                </div>
            </form>
        </div>
    </div>
@endsection
