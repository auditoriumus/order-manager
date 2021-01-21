@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-2">
            <a href="{{ route('home') }}" class="btn btn-success">К заказам</a>
        </div>
        <div class="col-5">
                <form action="{{ route('order.update', $order->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="input-group">
                        <button type="submit" class="btn btn-warning">Изменить</button>
                        <input name="description" class="form-control" type="text" value="{{ $order->description }}">
                        @if(sizeof($tables) > 0)
                            <select class="form-select" id="table" name="table">
                                @foreach($tables as $table)
                                    <option value="{{ $table->id }}" @if($table->id == $order->table_id) selected @endif>{{ $table->title }}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </form>
        </div>
    </div>
    <div class="row">
        <div class="order_list col-3 edit_frame m-1" style="border: 1px solid darkblue">
            <table class="table table-hover">
                <tbody id="menu-list">
                @if(!empty($order->menu))
                    @foreach($order->menu as $menu)
                        <tr>
                            <td>{{ $menu->title }}</td>
                            <td><button type="button" class="text-danger" id="deleteSelectedItem" data="{{ $order->id }}" onclick="addDeleteMenuItem(this)">-</button></td>
                            <td>{{ $menu->count }}</td>
                            <td><button type="button" class="text-success" id="addSelectedItem" data="{{ $order->id }}" onclick="addDeleteMenuItem(this)">+</button></td>
                            <td>{{ $menu->price }}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <div class="menu_list col-2 edit_frame m-1" style="border: 1px solid darkblue">
            <ul class="list-group">
                @foreach($categories as $category)
                    <li onclick=selectCategory(this) class="list-group-item list-group-item-action" data="{{ $category->id }}" style="border: none">
                        {{ $category->title }}
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="menu_items col-6 edit_frame m-1" style="border: 1px solid darkblue" id="menu_items">
        </div>
    </div>
@endsection

@section('script')
    <script>
        //функция отвечает за вывод кнопок с меню в зависимости от выбранной категории
        function selectCategory(el) {
            //получение id, находится в аттрибуте data
            let id = el.getAttribute('data');

            const request = new XMLHttpRequest();
            const url = "/menu/" + id;

            request.open("GET", url);
            request.setRequestHeader("Content-type", "application/json");

            request.addEventListener("readystatechange", () => {
                if (request.readyState === 4 && request.status === 200) {
                    //заполнение кнопок
                    let menu = JSON.parse(request.responseText);
                    document.getElementById('menu_items').innerHTML = '';
                    let innerHtml = '';
                    menu.forEach(function (item, i, arr) {
                        innerHtml += '<button onclick="addDeleteMenuItem(this)" type="button" class="btn btn-primary btn-lg m-1 menu_element" data-action="addSelectedItem" data="' + item.id + '">'+ item.title + '<p class="small">' + item.price + '</p></button>';
                    })
                    document.getElementById('menu_items').innerHTML = innerHtml;
                }
            });
            request.send();
        }

        //функция добавляет НОВЫЙ элемент в меню заказа и вызывает функцию обновления списка меню в заказе
        function addDeleteMenuItem(el) {
            let orderId = {{ $order->id }};
            const updateOrderRequest = new XMLHttpRequest();
            const updateOrderUrl = "/order/" + orderId + "/update-menu";
            updateOrderRequest.open("PUT", updateOrderUrl, true);
            updateOrderRequest.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}");
            updateOrderRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");


            updateOrderRequest.addEventListener("readystatechange", () => {
                if (updateOrderRequest.readyState === 4 && updateOrderRequest.status === 200) {
                    //console.log(updateOrderRequest.responseText)
                    updateOrderList();
                }
            });

            let menuItemId = el.getAttribute('data');
            updateOrderRequest.send("menuItemId=" + menuItemId + "&action=" + el.getAttribute('data-action'));
        }

        // обновление списка меню в заказе
        function updateOrderList() {
            let orderId = {{ $order->id }}
            //обновление списка меню в заказе
            const listOrderRequest = new XMLHttpRequest();
            const listOrderUrl = "/order/" + orderId;
            listOrderRequest.open("GET", listOrderUrl);
            listOrderRequest.setRequestHeader("Content-type", "application/json");

            listOrderRequest.addEventListener("readystatechange", () => {
                if (listOrderRequest.readyState === 4 && listOrderRequest.status === 200) {
                    let menuList = JSON.parse(listOrderRequest.responseText);

                    document.getElementById('menu-list').innerHTML = '';
                    let innerHtml = '';

                    menuList.forEach(function (item, i, arr) {
                        innerHtml += '<tr>' +
                            '<td>' + item.title + '</td>' +
                            '<td><button type="button" class="text-danger" data-action="deleteSelectedItem" data="' + item.good + '" onclick="addDeleteMenuItem(this)">-</button></td>' +
                            '<td>' + item.count + '</td>' +
                            '<td><button type="button" class="text-success" data-action="addSelectedItem" data="' + item.good + '" onclick="addDeleteMenuItem(this)">+</button></td>' +
                            '<td>' + item.price + '</td>' +
                            '</tr>';
                    })
                    document.getElementById('menu-list').innerHTML = innerHtml;
                }
            });
            listOrderRequest.send();
        }

    </script>
@endsection
