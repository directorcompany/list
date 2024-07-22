@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Покупка продукта</div>

                <div class="card-body">
                    <p><strong>Имя:</strong> {{ $purchase->name }}</p>
                    <p><strong>Телефон:</strong> {{ $purchase->phone }}</p>
                    <p><strong>Продукт:</strong> {{ $purchase->product->name }}</p>
                    <p><strong>Валюта:</strong> {{$purchase->currency->name}}</strong></p>
                    <p><strong>Сумма:</strong> {{ number_format($purchase->amount, 2) }} {{ $purchase->currency->code }}</p>
                    <p><strong>Дата покупки:</strong> {{ $purchase->created_at->format('d.m.Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
