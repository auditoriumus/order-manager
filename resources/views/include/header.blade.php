<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
        @if (Route::has('login'))
            <div class="collapse navbar-collapse">
                @auth
                    <a href="{{ url('/profile') }}" class="btn btn-outline-info m-1">Профиль</a>
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
