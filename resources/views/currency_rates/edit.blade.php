@extends('layouts.app')

@section('title', 'Редактировать курс валюты')

@section('content')
<div class="container mt-5">
    <h1>Редактировать курс валюты</h1>

    <form action="{{ route('currency_rates.update', $currencyRate) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="currency_id" class="form-label">Валюта</label>
            <select id="currency_id" name="currency_id" class="form-select @error('currency_id') is-invalid @enderror">
                @foreach($currencies as $currency)
                    <option value="{{ $currency->id }}" {{ $currencyRate->currency_id == $currency->id ? 'selected' : '' }}>
                        {{ $currency->name }}
                    </option>
                @endforeach
            </select>
            @error('currency_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="rate" class="form-label">Курс</label>
            <input type="text" id="rate" name="rate" class="form-control @error('rate') is-invalid @enderror" value="{{ old('rate', $currencyRate->rate) }}">
            @error('rate')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Дата</label>
            <input type="date" id="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date', $currencyRate->date) }}">
            @error('date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
</div>
@endsection
