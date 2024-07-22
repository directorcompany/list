@extends('layouts.app')

@section('title', 'Цены на продукты')

@section('content')
<div class="container mt-5">
    <h1>Цены на продукты</h1>

    <a href="{{ route('product_prices.create') }}" class="btn btn-primary mb-3">Добавить новую цену</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Продукт</th>
                <th>Валюта</th>
                <th>Цена</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prices as $price)
                <tr>
                    <td>{{ $price->product->name }}</td>
                    <td>{{ $price->currency->name }}</td>
                    <td>{{ $price->price }}</td>
                    <td>
                        <a href="{{ route('product_prices.edit', $price) }}" class="btn btn-warning btn-sm">Редактировать</a>
                        <form action="{{ route('product_prices.destroy', $price) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
