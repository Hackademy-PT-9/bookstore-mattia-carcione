<x-auth>
    <div class="navbar sticky-top flex-md-nowrap p-0 shadow gradient-custom" data-bs-theme="dark">
        <div class="col-md-3 col-lg-2"><a class="navbar-brand px-3 fs-5 text-dark me-0"
                href="{{ route('home') }}">Bookstore</a></div>

        <ul class="navbar-nav flex-row d-md-none">
            <li class="nav-item text-nowrap">
                <button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false"
                    aria-label="Toggle search">
                    <svg class="bi">
                        <use xlink:href="#search"></use>
                    </svg>
                </button>
            </li>
            <li class="nav-item text-nowrap">
                <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <svg class="bi">
                        <use xlink:href="#list"></use>
                    </svg>
                </button>
            </li>
        </ul>

        <div id="navbarSearch" class="navbar-search w-100 collapse">
            <input class="form-control w-100 rounded-0 border-0" type="text" placeholder="Search"
                aria-label="Search">
        </div>
    </div>
    <div class="container-fluid text-light">
        <div class="row">
            <div class="sidebar border-end col-md-3 col-lg-2 p-0" style="background-color: #8B4513">
                <div class="offcanvas-md offcanvas-end" tabindex="-1" id="sidebarMenu"
                    aria-labelledby="sidebarMenuLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            data-bs-target="#sidebarMenu" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                        <ul class="nav flex-column">
                            <li class="nav-item nav-link @if (Route::currentRouteName() == 'dashboard') disabled @endif d-flex align-items-center gap-2 active"
                                aria-current="page">
                                Dashboard
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="{{ route('home') }}">
                                    home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    Products
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    Customers
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    Reports
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    Integrations
                                </a>
                            </li>
                        </ul>

                        <h6
                            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                            <span>Saved reports</span>
                            <a class="link-secondary" href="#" aria-label="Add a new report">
                            </a>
                        </h6>
                        <ul class="nav flex-column mb-auto">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    Current month
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    Last quarter
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    Social engagement
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    Year-end sale
                                </a>
                            </li>
                        </ul>

                        <hr class="my-3">

                        <ul class="nav flex-column mb-auto">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    Settings
                                </a>
                            </li>
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <a class="nav-link d-flex align-items-center gap-2"
                                        onclick="event.preventDefault(); this.closest('form').submit();" type="submit">
                                        Esci
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 min-vh-100" style="background-color: #8B4513">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <a type="button" href="{{ route('books.create') }}"
                                class="btn btn-sm btn-outline-light">Aggiungi</a>
                        </div>
                    </div>
                </div>

                <h2>Section title</h2>
                @if (session('success'))
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                            aria-label="Success:">
                            <use xlink:href="#check-circle-fill" />
                        </svg>
                        <div>
                            {{ session('success') }}
                        </div>
                    </div>
                @endif
                <div class="table-responsive small rounded bg-white">
                    <table class="table table-striped table-sm align-middle">
                        <thead>
                            <tr>
                                <th scope="col" class="p-3">#</th>
                                <th scope="col" class="p-3">Titolo</th>
                                <th scope="col" class="p-3">Autore</th>
                                <th scope="col" class="p-3">Genere</th>
                                <th scope="col" class="p-3">Descrizione</th>
                                <th scope="col" class="p-3">Anno di pubblicazione</th>
                                <th scope="col" class="p-3">N. di pagine</th>
                                <th scope="col" class="p-3">Prezzo</th>
                                <th scope="col" class="p-3">Inserito da</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td class="p-3">{{ $book->id }}</td>
                                    <td class="p-3">{{ $book->title }}</td>
                                    <td class="p-3">{{ $book->author->firstname }} {{ $book->author->lastname }}
                                    </td>
                                    <td class="p-3">{{ $book->genre }}
                                        @if (!$book->genre)
                                            /
                                        @endif
                                    </td>
                                    <td class="p-3">{{ $book->description }}
                                        @if (!$book->description)
                                            /
                                        @endif
                                    </td>
                                    <td class="p-3">{{ $book->year }}
                                        @if (!$book->year)
                                            /
                                        @endif
                                    </td>
                                    <td class="p-3">{{ $book->pages }}
                                        @if (!$book->pages)
                                            /
                                        @endif
                                    </td>
                                    <td class="p-3">{{ $book->price }}€</td>
                                <td class="p-3">{{ Auth::user()->name }} {{ Auth::user()->surname }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('books.show', compact('book')) }}"
                                            class="btn btn-sm btn-outline-secondary">Mostra
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</x-auth>
