
@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/pre-purchase.css') }}">
@endsection

@section('content')
<div class="purchase__wrapper">
    <div class="left-container">
        <div class="left-container__inner">
            <div class="item-info">
                <div class="item-image">
                    <img src="{{ asset($item->image) }}" alt="">
                    @if (!is_null($item->purchase_user_id))
                    <div class="item-image-sold">
                        <p>Sold</p>
                    </div>
                    @endif
                </div>
                <div class="">
                    <h2 class="item-title">{{ $item->name }}</h2>
                    <div class="item-price">￥<span>{{ $item->price }}</span></div>
                </div>
            </div>
            <div class="payment-way">
                <h3 class="payment-title">支払い方法</h3>
                <select class="payment-select" name="payment_id" id="payment-select" >
                    <option hidden value="">選択してください</option>
                    @foreach ($payments as $payment)
                        <option value="{{ $payment->id }}">　　{{ $payment->name }}</option>
                    @endforeach
                </select>
                @error('payment_id')
                <div class="error">
                    <ul>
                        <li>{{ $message }}</li>
                    </ul>
                </div>
                @enderror
            </div>
            {{-- <form class="delivery-address" action="/purchase/address/{{ $item->id }}" method="post"> --}}
            <div class="delivery-address">
                <h3 class="delivery-title">配送先</h3>
                <div class="delivery-place">
                    <div class="post-code">〒{{ $purchaseInfo['post_code'] }}</div>
                    <div class="address">{{ $purchaseInfo['address'] }}</div>
                    <div class="building">{{ $purchaseInfo['building'] }}</div>
                </div>
                {{-- <button class="delivery-change" type="submit">変更する</button> --}}
                <a class="delivery-change" href="/purchase/address/{{ $item->id }}">変更する</a>
            {{-- </form> --}}
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
                    <td id="payment-way">コンビニ払い</td>
                </tr>
            </table>
            <form class="purchase-form" action="/purchase/{{ $item->id }}" method="post">
                @csrf
                <input type="hidden" name="item_id" value="{{ $item->id }}">
                <input type="hidden" name="payment_id" value="{{ $item->payment_id }}" id="payment-way2">
                <input type="hidden" name="post_code" value="{{ $purchaseInfo['post_code'] }}">
                <input type="hidden" name="address" value="{{ $purchaseInfo['address'] }}">
                <input type="hidden" name="building" value="{{ $purchaseInfo['building'] }}">
                <button type="submit">購入する</button>
            </form>
        </div>
    </div>
</div>
<script>
    let paymentSelect = document.getElementById('payment-select');
    let paymentWay = document.getElementById('payment-way');
    let paymentWay2 = document.getElementById('payment-way2');
    let payment_id;

    function displayPayment() {
        if (paymentSelect.selectedIndex == 0) {
            paymentWay.textContent = '－';
            paymentWay2.value = '';
        } else {
            paymentWay.textContent = paymentSelect.options[paymentSelect.selectedIndex].textContent.trim();
            paymentWay2.value = paymentSelect.options[paymentSelect.selectedIndex].value;
        }
    }

    window.onload = function() {
        payment_id = sessionStorage.getItem('payment_id');
        if (payment_id != null) {
            paymentSelect.selectedIndex = Number(payment_id);
        }
        displayPayment();
    }

    paymentSelect.onchange = function() {
        displayPayment();
        sessionStorage.setItem('payment_id', String(paymentSelect.selectedIndex));
    }

</script>
@endsection
