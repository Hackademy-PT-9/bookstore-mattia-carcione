<x-auth>
    <div class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow d-md-none" data-bs-theme="dark" style="">
        <a href="{{ route('home') }}"
            class="d-inline-flex align-items-center py-1 link-body-emphasis text-decoration-none">
            <img class="bi rounded" src="\book.jpg" width="40" height="32" role="img">
            <span class="fs-4 fw-bold">Bookstore</span>
        </a>

        <ul class="navbar-nav flex-row d-md-none">
            <li class="nav-item text-nowrap">
                <button class="nav-link px-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu"
                    aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation"><i
                        class="fa-solid fa-bars" style="color: #ffffff;"></i>
                </button>
            </li>
        </ul>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-secondary-subtle pt-md-3">
                <div class="offcanvas-md offcanvas-end bg-secondary-subtle" tabindex="-1" id="sidebarMenu"
                    aria-labelledby="sidebarMenuLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="sidebarMenuLabel">Bookstore</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            data-bs-target="#sidebarMenu" aria-label="Close">
                        </button>
                    </div>

                    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                        <ul class="nav flex-column">
                            <li class="nav-item " aria-current="page">
                                <a class="nav-link @if (Route::currentRouteName() == 'dashboard') text-light disabled @endif d-flex align-items-center gap-2 active text-white rounded-end bg-secondary w-50"
                                    aria-current="page" href="#">
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2 text-dark" href="#">
                                    Profilo utente
                                </a>
                            </li>
                        </ul>

                        <h6
                            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-dark text-uppercase">
                            <span>Prodotti</span>
                            <a class="link-secondary" href="#" aria-label="Aggiungi un nuovo report">
                            </a>
                        </h6>

                        <ul class="nav flex-column mb-auto">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2 text-dark"
                                    href="{{ route('books.create') }}">
                                    <i class="fa-solid fa-circle-plus"></i> Libro
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2 text-dark"
                                    href="{{ route('authors.create') }}">
                                    <i class="fa-solid fa-circle-plus"></i> Autore
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2 text-dark" href="#">
                                    <i class="fa-solid fa-circle-plus"></i> Categoria
                                </a>
                            </li>
                        </ul>

                        <hr class="my-3 border border-white text-light bg-light">

                        <ul class="nav flex-column mb-auto">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2 text-dark"
                                    href="{{ route('home') }}">
                                    Bookstore
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

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 min-vh-100">
                <nav class="container-md-fluid py-4">
                    <div class="d-flex flex-wrap align-items-center justify-content-between py-1 mb-1 border-bottom">
                        <div class="col-md-3 mb-md-0 text-start d-none d-md-block">
                            <a href="{{ route('home') }}"
                                class="d-inline-flex align-items-center link-body-emphasis text-decoration-none">
                                <img class="bi rounded" src="\book.jpg" width="40" height="32" role="img">
                                <span class="fs-4 fw-bold">Bookstore</span>
                            </a>
                        </div>

                        <form class=" col-md-3 text-end" action="{{ route('logout') }}" method="POST">
                            @csrf
                            @method('POST')
                            <span class="text-dark px-1">
                                Ciao,
                            </span>

                            <a href="{{ route('dashboard') }}"
                                class="d-inline-flex link-body-emphasis text-decoration-none auth-link">
                                <span>
                                    {{ Auth::user()->name }}
                                </span>
                            </a>

                            <a onclick="event.preventDefault(); this.closest('form').submit();" type="submit">
                                <i class="fa-solid fa-arrow-right-from-bracket i-link-custom" style="color: black;"></i>
                            </a>
                        </form>
                    </div>
                </nav>

                <h2 class="text-dark py-5">Dashboard</h2>

                @if (session('success') != 'Libro eliminato con successo' && session('success'))
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
                @if (session('success') == 'Libro eliminato con successo')
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                            aria-label="Success:">
                            <use xlink:href="#check-circle-fill" />
                        </svg>
                        <div>
                            {{ session('success') }}
                        </div>
                    </div>
                @endif

                <div class="table-responsive small">
                    <table class="table table-striped table-sm">
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
                                <th scope="col" class="p-3"></th>
                                <th scope="col" class="p-3"></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td class="p-3">{{ $count++ }}</td>
                                    <td class="p-3">
                                        <a href="{{ route('books.show', compact('book')) }}"
                                            class="nav-link-custom text-decoration-none d-flex align-items-center gap-2 text-dark">
                                            {{ $book->title }}
                                        </a>
                                    </td>

                                    <td class="p-3">
                                        <a href="{{ route('authors.show', ['author' => $book->author->id]) }}"
                                            class="nav-link-custom text-decoration-none d-flex align-items-center gap-2 text-dark">{{ $book->author->firstname }}
                                            {{ $book->author->lastname }}
                                        </a>
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
                                    <td class="text-center align-middle">
                                        <a href="{{ route('books.edit', compact('book')) }}"
                                            class="btn btn-sm btn-warning">Modifica
                                        </a>
                                    </td>
                                    <td class="text-center align-middle">
                                        <form class="dropdown col-md-3 text-center align-middle"
                                            action="{{ route('books.destroy', compact('book')) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit">
                                                Elimina
                                            </button>
                                        </form>
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
