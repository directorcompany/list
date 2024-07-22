@extends('layouts.app')

@section('title', 'Добавить курс валюты')

@section('content')
<div class="container mt-5">
    <h1>Добавить новый курс валюты</h1>

    <form action="{{ route('currency_rates.store') }}" method="POST">
        @csrf

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
            <label for="rate" class="form-label">Курс</label>
            <input type="text" id="rate" name="rate" class="form-control @error('rate') is-invalid @enderror" value="{{ old('rate') }}">
            @error('rate')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Дата</label>
            <input type="date" id="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date') }}">
            @error('date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>
@endsection
