@extends('layouts.app')

@section('content')
    <a href="{{ route('category.create') }}" class="btn btn-success m-2">Добавить категорию</a>
    @if( sizeof($menuWithCategories) != 0 )<a href="{{ route('menu.create') }}" class="btn btn-success m-2">Добавить позицию</a>@endif
    <div class="accordion">
        @foreach($menuWithCategories as $categoryItem)
        <div class="accordion-item">
            <h2 class="accordion-header">
                <div class="row">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#menu-{{$categoryItem->id}}">
                        {{ $categoryItem->title }}
                    </button>
                </div>
            </h2>
            <div id="menu-{{$categoryItem->id}}" class="accordion-collapse collapse">
                <div class="row">
                    <div class="col-3">
                        <a href="{{ route('category.edit', $categoryItem->id) }}" class="btn btn-warning m-2">Изменить категорию</a>
                    </div>
                    <form class="col-3" action="{{ route('category.destroy', $categoryItem->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger m-2">Удалить категорию</button>
                    </form>
                </div>
                <div class="accordion-body">
                    <table class="table">
                        <tbody>
                            @foreach($categoryItem->menus as $menu)
                                    <tr>
                                        <td class="col-6">{{ $menu->title }}</td>
                                        <td class="col-2">{{ $menu->price }}</td>
                                        <td class="col-2">
                                            <form action="{{ route('menu.destroy', $menu->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Удалить</button>
                                            </form>
                                        </td>
                                        <td class="col-2"><a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-warning">Изменить</a></td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
