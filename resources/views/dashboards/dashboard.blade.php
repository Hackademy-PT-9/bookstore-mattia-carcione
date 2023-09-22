<x-dashboard>
    <h2 class="text-dark py-5">Dashboard</h2>

    @if (session('success') != 'Libro eliminato con successo' && session('success'))
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                <use xlink:href="#check-circle-fill" />
            </svg>
            <div>
                {{ session('success') }}
            </div>
        </div>
    @endif
    @if (session('success') == 'Libro eliminato con successo')
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
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
                            <a href="{{ route('authors.edit', ['author' => $book->author->id]) }}"
                                class="nav-link-custom text-decoration-none d-flex align-items-center gap-2 text-dark">{{ $book->author->firstname }}
                                {{ $book->author->lastname }} <span><i class="fa-solid fa-pen-to-square"></i></span>
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
                            <a href="{{ route('books.edit', compact('book')) }}" class="btn btn-sm btn-warning"><i
                                    class="fa-solid fa-pen-to-square icon-edit"></i>
                                <span class="d-none btn-edit">Modifica</span>
                            </a>
                        </td>
                        <td class="text-center align-middle">
                            <form class="dropdown col-md-3 text-center align-middle"
                                action="{{ route('books.destroy', compact('book')) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger d-none d-md-block" type="submit">
                                    Elimina
                                </button>
                                <button class="btn btn-sm btn-danger d-block d-md-none" type="submit">
                                    <i class="fa-solid fa-trash-can" style="color: #ffffff;"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-dashboard>
