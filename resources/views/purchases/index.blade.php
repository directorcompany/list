@extends('layouts.app')
@section('title', 'Список покупок')
@section('content')
<div class="container">
    <h1>Список покупок</h1>
    <a href="{{ route('purchases.create') }}" class="btn btn-primary">Добавить покупки</a>

    <table class="table">
        <thead>
            <tr>
                <th>Имя</th>
                <th>Телефон</th>
                <th>Продукт</th>
                <th>Валюта</th>
                <th>Оплата</th>
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($purchases as $purchase)
                <tr>
                    <td>{{ $purchase->name }}</td>
                    <td>{{ $purchase->phone }}</td>
                    <td>{{ $purchase->product->name }}</td>
                    <td>{{ $purchase->currency->code }}</td>
                    <td>{{ $purchase->amount }}</td>
                    <td>
                        <a href="{{ route('purchases.edit', $purchase->id) }}" class="btn btn-warning">Редактирование</a>
                        <form action="{{ route('purchases.destroy', $purchase->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удаление</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
