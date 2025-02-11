
@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
@endsection

@section('content')
<div class="purchase__wrapper">
    <div class="left-container">
        <div class="left-container__inner">
            <div class="item-info">
                <div class="item-image">

                </div>
                <div class="">
                    <h2 class="item-title">商品名</h2>
                    <div class="item-price">￥<span>47,000</span></div>
                </div>
            </div>
            <div class="payment-way">
                <h3 class="payment-title">支払い方法</h3>
                <select class="payment-select" name="" id="" >
                    <option hidden>選択してください</option>
                    <option value="">　　コンビニ払い</option>
                    <option value="">　　カード払い</option>
                </select>
            </div>
            <div class="delivery-address">
                <h3 class="delivery-title">配送先</h3>
                <div class="delivery-place">
                    <div class="post-code">〒123-456</div>
                    <div class="address">東京都港区１－２－３</div>
                    <div class="building">コーチテックビルディング</div>
                </div>
                {{-- <div class="delivery-change">
                    <a href="">変更する</a>
                </div> --}}
                <a class="delivery-change" href="/purchase/address/1">変更する</a>
            </div>
        </div>
    </div>
    <div class="right-container">
        <div class="right-container__inner">
            <table class="payment-summary">
                <tr>
                    <td>商品代金</td>
                    <td>￥47,000</td>
                </tr>
                <tr>
                    <td>支払い方法</td>
                    <td>コンビニ払い</td>
                </tr>
            </table>
            <form action="" class="purchase-form">
                <input type="hidden" name="item-id">
                <button>購入する</button>
            </form>
        </div>
    </div>
</div>
@endsection
