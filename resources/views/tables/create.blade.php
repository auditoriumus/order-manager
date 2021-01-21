@extends('layouts.app')

@section('content')
    <form action="@if(isset($tableItem)){{ route('table.update', $tableItem->id) }}@else{{ route('table.store') }}@endif" method="post">
        @csrf
        @if(isset($tableItem))
            @method('PUT')
        @endif
        <div class="mb-3">
            <label for="title" class="form-label">Название</label>
            <input type="text" class="form-control" id="title" name="title" value="@if(isset($tableItem)){{$tableItem->title}}@else{{ old('title') }}@endif">
        </div>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
@endsection
