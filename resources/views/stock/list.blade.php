@extends('layouts.app')

@section('content')
    <a href="{{ route('stock.create') }}" class="btn btn-success m-2">Добавить на склад</a>
    @if(!empty($stockList))
        <table class="table">
            <thead>
                <tr>
                    <td class="col-2">Наименование</td>
                    <td class="col-2">Единица измерения</td>
                    <td class="col-2">Количество на складе</td>
                    <td class="col-2">Цена за единицу</td>
                </tr>
            </thead>
            <tbody>
            @foreach($stockList as $stockItem)
                <tr>
                    <td class="col-2">{{ $stockItem->title }}</td>
                    <td class="col-2">{{ $stockItem->measure_unit }}</td>
                    <td class="col-2">{{ $stockItem->count }}</td>
                    <td class="col-2">{{ $stockItem->per_price }}</td>
                    <td class="col-2">
                        <form action="{{ route('stock.destroy', $stockItem->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
                    <td class="col-2"><a href="{{ route('stock.edit', $stockItem->id) }}" class="btn btn-warning">Изменить</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
