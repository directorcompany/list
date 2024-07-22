@extends('layouts.app')

@section('title', 'Редактировать цену продукта')

@section('content')
<div class="container mt-5">
    <h1>Редактировать цену продукта</h1>

    <form action="{{ route('product_prices.update', $productPrice) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="product_id" class="form-label">Продукт</label>
            <select id="product_id" name="product_id" class="form-select @error('product_id') is-invalid @enderror">
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ $productPrice->product_id == $product->id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
            @error('product_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="currency_id" class="form-label">Валюта</label>
            <select id="currency_id" name="currency_id" class="form-select @error('currency_id') is-invalid @enderror">
                @foreach($currencies as $currency)
                    <option value="{{ $currency->id }}" {{ $productPrice->currency_id == $currency->id ? 'selected' : '' }}>
                        {{ $currency->name }}
                    </option>
                @endforeach
            </select>
            @error('currency_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Цена</label>
            <input type="text" id="price" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $productPrice->price) }}">
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
</div>
@endsection
