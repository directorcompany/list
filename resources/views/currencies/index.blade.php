@extends('layouts.app')
@section('title', 'Список валют')
@section('content')
<div class="container">
    <h1>Список валют</h1>
    <a href="{{ route('currencies.create') }}" class="btn btn-primary">Добавить валюту</a>

    <table class="table">
        <thead>
            <tr>
                <th>Код</th>
                <th>Название</th>
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($currencies as $currency)
                <tr>
                    <td>{{ $currency->code }}</td>
                    <td>{{ $currency->name }}</td>
                    <td>
                        <a href="{{ route('currencies.edit', $currency->id) }}" class="btn btn-warning">Редактирование</a>
                        <form action="{{ route('currencies.destroy', $currency->id) }}" method="POST" style="display:inline;">
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
