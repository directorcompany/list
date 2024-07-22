@extends('layouts.app')

@section('content')
    <h1>Список продуктов</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Наименование</th>
                <th>Цена в RUB</th>
                <th>Цена в USD</th>
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->priceInRubles() }} RUB</td>
                    <td>{{ $product->priceInDollars() }} USD</td>
                    <td>
                        <a href="{{ route('purchases.create') }}" class="btn btn-primary">Купить</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection