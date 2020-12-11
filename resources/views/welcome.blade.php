@extends('layouts.app')

@section('content')
    @if($orders)
        @foreach($orders as $order)
            <div class="card border-secondary m-3">
                <div class="card-header">
                    <p class="fw-light">Заказ: {{ $order->id }} | Дальний слева | Сотрудник: Александр | 12.11.2020</p>
                </div>
                <div class="card-body text-secondary">
                    <h5 class="card-title">Secondary card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        @endforeach
    @endif
@endsection
