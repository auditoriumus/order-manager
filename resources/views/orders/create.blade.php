@extends('layouts.app')

@section('content')
    <form action="{{ route('order.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="table" class="form-label">Стол</label>
            <div class="mb-3">
                <select name="table" id="table">
                    @if($tables)
                        @foreach($tables as $table)
                            <option value="{{ $table->id }}">{{ $table->title }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="description">Комментарий</label>
            <div class="mb-3">
                <input name="description" id="description" type="text" class="form-label">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endsection
