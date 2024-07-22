@extends('layouts.app')

@section('title', 'Курсы валют')

@section('content')
<div class="container mt-5">
    <h1>Курсы валют</h1>

    <a href="{{ route('currency_rates.create') }}" class="btn btn-primary mb-3">Добавить новый курс</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Валюта</th>
                <th>Курс</th>
                <th>Дата</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rates as $rate)
                <tr>
                    <td>{{ $rate->currency->name }}</td>
                    <td>{{ $rate->rate }}</td>
                    <td>{{ \Carbon\Carbon::parse($rate->date)->format('d.m.Y') }}</td>
                    <td>
                        <a href="{{ route('currency_rates.edit', $rate) }}" class="btn btn-warning btn-sm">Редактировать</a>
                        <form action="{{ route('currency_rates.destroy', $rate) }}" method="POST" style="display:inline;">
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
