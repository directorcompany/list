@extends('layouts.app')
@section('title', 'Редактирование покупки')
@section('content')
<div class="container">
    <h1>Редактирование покупки</h1>
    <form action="{{ route('purchases.update', $purchase->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $purchase->name }}" required>
        </div>
        <div class="form-group">
            <label for="phone">Телефон</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ $purchase->phone }}" required>
        </div>
        <div class="form-group">
            <label for="product_id">Продукт</label>
            <select name="product_id" id="product_id" class="form-control" required>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ $purchase->product_id == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="currency_id">Валюта</label>
            <select name="currency_id" id="currency_id" class="form-control" required>
                @foreach ($currencies as $currency)
                    <option value="{{ $currency->id }}" {{ $purchase->currency_id == $currency->id ? 'selected' : '' }}>{{ $currency->code }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group my-2 ">
            <label for="amount">Оплата</label>
            <input type="number" name="amount" id="amount" class="form-control" step="0.01" value="{{ $purchase->amount }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Редактирование</button>
    </form>
</div>
@endsection
