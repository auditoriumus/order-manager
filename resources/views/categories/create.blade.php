@extends('layouts.app')

@section('content')
    <form action="@if(isset($category)){{ route('category.update', $category->id) }}@else{{ route('category.store') }}@endif" method="post">
        @csrf
        @if(isset($category))
            @method('PUT')
        @endif
        <div class="mb-3">
            <label for="title" class="form-label">Название категории</label>
            <input type="text" class="form-control" id="title" name="title" value="@if(isset($category)){{ $category->title }}@else{{ old('title') }}@endif">
        </div>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
@endsection
