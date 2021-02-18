@extends('layouts.app')

@section('content')
    <form action="@if(isset($menuItem)){{ route('menu.update', $menuItem->id) }}@else{{ route('menu.store') }}@endif" method="post">
        @csrf
        @if(isset($menuItem))
            @method('PUT')
        @endif
        @if (isset($menuItem))
            @foreach($menuItem->stock as $menuStockCategoryId => $menuStockItemCount)
            <div class="mb-3 data-stock"  data-stock-id="1" data-stock="data-stock">
                <label for="stock" class="form-label">Со склада:</label>
                <select name="stock[]" id="stock">
                    @foreach( $stockItems as $stockItem )
                        <option value="{{ $stockItem->id }}" @if(isset($menuItem) && ($menuStockCategoryId == $stockItem->id)) selected @endif>{{ $stockItem->title }}</option>
                    @endforeach
                </select>
                <label for="stock-count" class="form-label">Количество со склада:</label>
                <input id="stock-count" name="stock-count[]" type="number" value="@if(isset($menuItem)){{$menuStockItemCount}}@endif">
            </div>
            @endforeach
        @else
            <div class="mb-3 data-stock"  data-stock-id="1" data-stock="data-stock">
                <label for="stock" class="form-label">Со склада:</label>
                <select name="stock[]" id="stock">
                    @foreach( $stockItems as $stockItem )
                        <option value="{{ $stockItem->id }}" @if(isset($menuItem) && ($menuItem->stocks_id == $stockItem->id)) selected @endif>{{ $stockItem->title }}</option>
                    @endforeach
                </select>
                <label for="stock-count" class="form-label">Количество со склада:</label>
                <input id="stock-count" name="stock-count[]" type="number" value="@if(isset($menuItem)){{$menuItem->stock_count}}@endif">
            </div>
        @endif
        <div class="mb-3">
            <button type="button" class="btn btn-warning" id="part-menu-button">Добавить компонент</button>
        </div>


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

        <button type="submit" class="btn btn-primary">@if(isset($menuItem))Изменить@elseДобавить@endif</button>
    </form>
@endsection

@section('script')
    <script>
        let partMenuButton = document.getElementById('part-menu-button');
        getStockList();

        if (partMenuButton) {
            partMenuButton.addEventListener('click', function () {

                window.innerOptions = '';

                stockList.forEach(function (item, i, arr) {
                    window.innerOptions += '<option value="' + item.id + '">' + item.title + '</option>'
                })

                let stockElem = document.getElementsByClassName('data-stock');
                let stockId = +stockElem[stockElem.length - 1].getAttribute('data-stock-id')
                stockId += 1;

                let innerHtml = '<div class="mb-3 data-stock"  data-stock="data-stock" data-stock-id="' + stockId + '">' +
                    '<label for="stock-' + stockId + '" class="form-label">Со склада:</label>' +
                    '<select name="stock[]" id="stock-' + stockId + '">' +
                    innerOptions +
                    '</select> ' +
                    '<label for="stock-count-'+ stockId +'" class="form-label">Количество со склада:</label> ' +
                    '<input id="stock-count-'+ stockId +'" name="stock-count[]" type="number" value="">' +
                    '<button type="button" onclick="deleteElement(this)" class="btn btn-danger ml-1">Удалить компонент</button>' +
                    '</div>';

                stockElem[stockElem.length - 1].insertAdjacentHTML('afterend', innerHtml);

            })
        }


        function getStockList() {
            const stockListRequest = new XMLHttpRequest();
            const stockListUrl = "/api/stock";
            stockListRequest.open("GET", stockListUrl);
            stockListRequest.setRequestHeader("Content-type", "application/json");

            stockListRequest.addEventListener("readystatechange", () => {
                if (stockListRequest.readyState === 4 && stockListRequest.status === 200) {
                    window.stockList = JSON.parse(stockListRequest.responseText)
                    return window.stockList;
                }
            });
            stockListRequest.send();
        }

        function deleteElement(element) {
            element.parentElement.remove();
        }
    </script>
@endsection
