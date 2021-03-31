<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
        @if (Route::has('login'))
            <div class="collapse navbar-collapse">
                @auth
                    <li><a href="{{ route('home') }}" class="btn btn-outline-info m-1">Заказы</a></li>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle btn btn-outline-info m-1" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Настройки
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('menu.index') }}" class="dropdown-item">Настройки меню</a></li>
                            <li><a href="{{ route('table.index') }}" class="dropdown-item">Столы</a></li>
                            <li><a href="{{ route('stock.index') }}" class="dropdown-item">Склад</a></li>
                        </ul>
                    </div>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="btn btn-outline-info m-1">Выйти</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-info m-1">Войти</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-outline-info m-1">Регистрация</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</nav>
