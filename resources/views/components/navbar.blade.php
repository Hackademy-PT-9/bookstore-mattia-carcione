<div class="container-fluid fixed-top">
    <header
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0 d-none d-md-block text-center">
            <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                <img class="bi" src="\book.jpg" width="40" height="32" role="img">
                <use xlink:href="#bootstrap"></use>
                </img>
            </a>
        </div>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="{{ route('books.index') }}" class="nav-link px-2 link-secondary">Home</a></li>
            <li><a href="#" class="nav-link px-2">Store</a></li>
            <li><a href="#" class="nav-link px-2">Chi Siamo</a></li>
            <li><a href="#" class="nav-link px-2">Contatti</a></li>
        </ul>

        @auth
            <form class="flex-shrink-0 dropdown col-md-3 text-center" action="{{ route('logout') }}" method="POST">
                @csrf
                @method('POST')
                <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle ps-5"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32"
                        class="rounded-circle">
                </a>

                <ul class="dropdown-menu text-small shadow start-50" style="">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <button class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();"
                        type="submit">Sign
                        out
                    </button>
                </ul>
            </form>
        @else
            <div class="col-md-3 text-center">
                <a type="submit" href="{{ route('login') }}" class="btn btn-sm btn-outline-primary me-2">Login</a>
                <a type="submit" href="{{ route('register') }}" class="btn btn-sm btn-primary">Registrati</a>
            </div>
        @endauth
    </header>
</div>
