<nav class="container-fluid fixed-top">
    <div
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-1 mb-1 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0 d-none d-md-block text-center">
            <a href="{{ route('home') }}" class="d-inline-flex link-body-emphasis text-decoration-none">
                <img class="bi rounded" src="\book.jpg" width="40" height="32" role="img">
                <use xlink:href="#bootstrap"></use>
                </img>
            </a>
        </div>

        <ul class="nav col-12 col-md-auto justify-content-center mb-md-0v align-items-center">
            <li class="nav-item"><a href="{{ route('home') }}"
                    class="nav-link px-2 @if (Route::currentRouteName() == 'home') link-secondary disabled @endif"
                    aria-current="page">Home</a></li>
            <li class="nav-item"><a href="{{ route('books.index') }}"
                    class="nav-link px-2 @if (Route::currentRouteName() == 'books.index') link-secondary disabled @endif">Store</a>
            </li>
            <li class="nav-item"><a href="#" class="nav-link px-2">Chi Siamo</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2">Contatti</a></li>
        </ul>

        @auth
            <ul class="nav col-12 col-md-auto justify-content-center mb-md-0v align-items-center">
                <form class="d-flex d-md-none align-items-center" action="{{ route('logout') }}" method="POST">
                    @csrf
                    @method('POST')
                    <li class="nav-item px-2"><a onclick="event.preventDefault(); this.closest('form').submit();"
                            type="submit" class="nav-link">
                            Dashboard
                        </a></li>
                    <li class="nav-item"><a onclick="event.preventDefault(); this.closest('form').submit();" type="submit"
                            class="nav-link">
                            Exit <span class="fa-solid fa-arrow-right-from-bracket" style="color: black;"></span>
                        </a></li>
                </form>
            </ul>
        @endauth

        @auth
            <form class="flex-shrink-0 dropdown col-md-3 text-center d-none d-md-block" action="{{ route('logout') }}"
                method="POST">
                @csrf
                @method('POST')
                <span class="text-dark px-1">
                    Ciao,
                </span>

                <a href="" class="d-inline-flex link-body-emphasis text-decoration-none auth-link">
                    <span>
                        {{ Auth::user()->name }}
                    </span>
                </a>

                <a onclick="event.preventDefault(); this.closest('form').submit();" type="submit">
                    <i class="fa-solid fa-arrow-right-from-bracket nav-link" style="color: black;"></i>
                </a>
            </form>
        @else
            <div class="col-md-3 text-center">
                <a type="submit" href="{{ route('login') }}" class="btn btn-sm btn-outline-dark me-2">Login</a>
                <a type="submit" href="{{ route('register') }}" class="btn btn-sm btn-dark">Registrati</a>
            </div>
        @endauth
    </div>
</nav>
