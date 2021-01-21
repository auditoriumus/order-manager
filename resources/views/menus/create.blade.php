@extends('layouts.app')

@section('content')
    <form action="@if(isset($menuItem)){{ route('menu.update', $menuItem->id) }}@else{{ route('menu.store') }}@endif" method="post">
        @csrf
        @if(isset($menuItem))
            @method('PUT')
        @endif
        <div class="mb-3">
            <label for="category" class="form-label">Категория меню:</label>
            <div>
                <select name="category" id="category">
                    @foreach( $categories as $category )
                        <option value="{{ $category->id }}" @if(isset($menuItem) && ($menuItem->category_id == $category->id)) selected @endif>{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Название</label>
            <input type="text" class="form-control" id="title" name="title" value="@if(isset($menuItem)){{$menuItem->title}}@else{{ old('title') }}@endif">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Цена</label>
            <input type="text" class="form-control" id="price" name="price" value="@if(isset($menuItem)){{$menuItem->price}}@else{{ old('price') }}@endif">
        </div>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
@endsection
