@extends('layouts.app')
@section('title', 'Редактирование валют')
@section('content')
<div class="container">
    <h1>Редактирование валют</h1>
    <form action="{{ route('currencies.update', $currency->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="code">Код</label>
            <input type="text" name="code" id="code" class="form-control" value="{{ $currency->code }}" required>
        </div>
        <div class="form-group my-2">
            <label for="name">Название</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $currency->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Редактировать</button>
    </form>
</div>
@endsection
