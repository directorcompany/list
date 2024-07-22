@extends('layouts.app')

@section('content')
    <h1>Отчет по продажам</h1>

    <form action="{{ route('report') }}" method="POST">
        @csrf
        <div class="form-group py-2">
            <label for="product_id">Продукт:</label>
            <select name="product_id" id="product_id" class="form-control">
                <option value="">Все продукты</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group py-2">
            <label for="currency_id">Валюта:</label>
            <select name="currency_id" id="currency_id" class="form-control">
                <option value="">Все валюты</option>
                @foreach ($currencies as $currency)
                    <option value="{{ $currency->id }}">{{ $currency->name }} ({{ $currency->code }})</option>
                @endforeach
            </select>
        </div>

        <div class="form-group py-2">
            <label>Дата:</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="date_filter" id="date_today" value="today" checked>
                <label class="form-check-label" for="date_today">
                    Сегодня
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="date_filter" id="date_week" value="week">
                <label class="form-check-label" for="date_week">
                    За неделю
                </label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Показать отчет</button>
    </form>
@endsection
