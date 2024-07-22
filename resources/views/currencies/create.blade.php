@extends('layouts.app')
@section('title', 'Добавить валюту')
@section('content')
<div class="container">
    <h1>Добавить валюту</h1>
    <form action="{{ route('currencies.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="code">Код</label>
            <input type="text" name="code" id="code" class="form-control" required>
        </div>
        <div class="form-group my-2">
            <label for="name">Название</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
</div>
@endsection
