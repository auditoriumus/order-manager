@extends('layouts.app')

@section('content')
    <form action="@if(!empty($currentStock)){{ route('stock.update', $currentStock->id) }}@else{{ route('stock.store') }}@endif" method="post">
        @csrf
        @if(!empty($currentStock))
            @method('put')
        @endif
        <div class="mb-3">
            <label for="title" class="form-label">Название</label>
            <input type="text" class="form-control" id="title" name="title" value="@if(!empty($currentStock)){{ $currentStock->title }}@endif">
        </div>
        <div class="row">
            <div class="mb-3 col-3">
                <label for="measure_unit" class="form-label">Единица измерения</label>
                <input type="text" class="form-control" id="measure_unit" name="measure_unit" value="@if(!empty($currentStock)){{ $currentStock->measure_unit }}@endif">
            </div>

            <div class="mb-3 col-3">
                <label for="count" class="form-label">Количество</label>
                <input type="number" class="form-control" id="count" name="count" value="@if(!empty($currentStock)){{ $currentStock->count }}@endif">
            </div>

            <div class="mb-3 col-3">
                <label for="per_price" class="form-label">Цена за единицу</label>
                <input type="number" class="form-control" id="per_price" name="per_price" value="@if(!empty($currentStock)){{ $currentStock->per_price }}@endif">
            </div>

            <div class="mb-3 col-3">
                <label for="total_price" class="form-label">Общая цена</label>
                <input type="number" class="form-control" id="total_price" name="total_price" value="@if(!empty($currentStock)){{ $currentStock->total_price }}@endif">
            </div>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-warning" id="part-menu-button">@if(!empty($currentStock))Сохранить@elseДобавить на склад@endif</button>
        </div>
    </form>
@endsection

@section('script')
    <script>

    </script>
@endsection
