@extends('layouts.app')
@section('title', 'Редактирование продуктов')
@section('content')
<div class="container">
    <h1>Редактирование продуктов</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea name="description" id="description" class="form-control" rows="3" required>{{ $product->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Редактировать</button>
    </form>
</div>
@endsection
