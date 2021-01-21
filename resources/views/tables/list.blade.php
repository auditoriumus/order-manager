@extends('layouts.app')

@section('content')
    <a href="{{ route('table.create') }}" class="btn btn-success m-2">Добавить стол</a>
    @if(sizeof($tables)>0)
        <table class="table table-striped table-hover">
            <tbody>
            @foreach($tables as $table)
                <tr>
                    <td>{{ $table->title }}</td>
                    <td>
                        <a href="{{ route('table.edit', $table->id) }}" class="btn btn-warning">Изменить</a>
                    </td>
                    <td>
                        <form class="col-3" action="{{ route('table.destroy', $table->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
