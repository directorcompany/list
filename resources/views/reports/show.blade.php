@extends('layouts.app')

@section('content')
    <h1>Отчет по продажам</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Имя</th>
                <th>Телефон</th>
                <th>Продукт</th>
                <th>Цена (в выбранной валюте)</th>
                <th>Дата покупки</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($purchases as $purchase)
                <tr>
                    <td>{{ $purchase->name }}</td>
                    <td>{{ $purchase->phone }}</td>
                    <td>{{ $purchase->product->name }}</td>
                    <td>{{ $purchase->amount }} {{ $purchase->currency->code }}</td>
                    <td>{{ $purchase->created_at->format('Y-m-d H:i:s') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
