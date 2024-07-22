@extends('layouts.app')
@section('title', 'Добавить продуктов')
@section('content')
<div class="container">
    <h1>Добавить продуктов</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Наименование</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group my-2">
            <label for="description">Описание</label>
            <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
</div>
@endsection
