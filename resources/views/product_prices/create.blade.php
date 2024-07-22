@extends('layouts.app')

@section('title', 'Добавить цену продукта')

@section('content')
<div class="container mt-5">
    <h1>Добавить новую цену продукта</h1>

    <form action="{{ route('product_prices.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="product_id" class="form-label">Продукт</label>
            <select id="product_id" name="product_id" class="form-select @error('product_id') is-invalid @enderror">
                <option value="">Выберите продукт</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
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
                <option value="">Выберите валюту</option>
                @foreach($currencies as $currency)
                    <option value="{{ $currency->id }}" {{ old('currency_id') == $currency->id ? 'selected' : '' }}>
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
            <input type="text" id="price" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>
@endsection
