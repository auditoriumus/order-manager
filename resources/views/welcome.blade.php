@extends('layouts.app')

@section('content')
    @if($orders)
        @foreach($orders as $order)
            <div class="card border-secondary m-3">
                <div class="card-header">
                    <div class="fw-light">
                        <form action="{{ route('order.destroy', $order->id) }}" method="POST">
                            @csrf
                            <a href="{{ route('order.edit', $order->id) }}" class="btn btn-outline-primary">Изменить</a>
                            <input type="hidden" name="_method" value="delete" />
                            <button type="submit" class="btn btn-outline-danger">Удалить</button>
                        </form>
                        Заказ: {{ $order->id }} | {{ $order->table->title }}  | Сотрудник: {{ $order->user->name }}  | {{ $order->created_at }}
                    </div>
                </div>
                <div class="card-body text-secondary">
                    @if($order->menu)
                        <table class="table table-striped">
                            <tbody>
                                @foreach($order->menu as $menuItem)
                                    <tr>
                                        <th scope="row">{{ $menuItem->title }}</th>
                                        <td>{{ $menuItem->count }}</td>
                                        <td>{{ $menuItem->price }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td class="total_price">
                                        {{ $order->total }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        @endforeach
    @endif
@endsection
