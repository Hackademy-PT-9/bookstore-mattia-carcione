<x-auth>
    <nav class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-between py-1 mb-1 border-bottom">
            <div class="col-md-3 mb-md-0 text-start">
                <a href="{{ route('home') }}"
                    class="d-inline-flex align-items-center link-body-emphasis text-decoration-none">
                    <img class="bi rounded" src="\book.jpg" width="40" height="32" role="img">
                    <span class="fs-4 fw-bold">Bookstore</span>
                </a>
            </div>

            <form class=" col-md-3 text-end" action="{{ route('logout') }}" method="POST">
                @csrf
                @method('POST')
                <a href="{{ route('dashboard') }}"
                    class="d-inline-flex link-body-emphasis text-decoration-none auth-link">
                    <span>
                        {{ Auth::user()->name }}
                    </span>
                </a>

                <a onclick="event.preventDefault(); this.closest('form').submit();" type="submit">
                    <i class="fa-solid fa-arrow-right-from-bracket nav-link-custom" style="color: black;"></i>
                </a>
            </form>
        </div>
    </nav>

    <div class="container-fluid d-flex justify-content-center align-items-center py-2">
        <div class="row justify-content-center row-custom">
            <main>
                <form class="card-body text-center" action="{{ route('books.update', $book) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="d-flex justify-content-start">
                        <a href="{{ route('home') }}">
                            <i class="fa-solid fa-xmark fs-5" style="color: #ffffff;"></i>
                        </a>
                    </div>

                    <div class="mb-md-4 mt-md-4 pb-1">
                        <h2 class="fw-bold mb-2 text-uppercase d-flex justify-content-center align-items-center">
                            Metti in vendita
                        </h2>

                        <div class="form-outline form-white mb-4 text-start">
                            <label class="form-label" for="title">Titolo</label>
                            <input type="text" id="title"
                                class="form-control form-control-lg @error('title') is-invalid @enderror"
                                placeholder="Titolo del libro" name="title" required value="{{ $book->title }}" />
                            @error('title')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="form-outline form-white mb-4 text-start align-items-center">
                            <label class="form-label" for="author_id">Autore</label>
                            <select type="text" id="author_id"
                                class="form-select form-select-lg @error('author_id') is-invalid @enderror"
                                placeholder="Autore" name="author_id">
                                @foreach ($authors as $author)
                                    <option value="{{ $author->id }}"
                                        @if ($author->id == $book->author_id) selected @endif>
                                        {{ $author->firstname }} {{ $author->lastname }}
                                    </option>
                                @endforeach
                            </select>
                            @error('author_id')
                                {{ $message }}
                            @enderror

                            <a href="{{ route('authors.create') }}" class="btn btn-lg btn-outline-dark mt-4">
                                <i class="px-2 fa fa-solid fa-circle-plus"></i>Autore
                            </a>
                        </div>

                        <div class="mb-3 mx-auto text-start">
                            <img class="card-img-top mb-5 mb-md-0 mx-auto" style="width:10rem"
                                src="{{ empty($book->image) ? '/assets/images/default.jpg' : Storage::url($book->image) }}"
                                alt="..." />
                        </div>

                        <div class="form-outline form-white mb-4 text-start">
                            <label class="form-label" for="image">Copertina</label>
                            <input type="file" id="image"
                                class="form-control form-control-lg @error('image') is-invalid @enderror" name="image"
                                value="" />
                            @error('image')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="form-outline form-white mb-4 text-start">
                            <label class="form-label" for="genre">Genere</label>
                            <input type="text" id="genre"
                                class="form-control form-control-lg @error('genre') is-invalid @enderror"
                                placeholder="Genere del libro" name="genre" value="{{ $book->genre }}" />
                            @error('genre')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="form-outline form-white mb-4 text-start">
                            <label for="password_confirmation" class="form-label">Numero di pagine</label>
                            <input type="number" name="pages"
                                class="form-control @error('pages') is-invalid @enderror" id="password_confirmation"
                                placeholder="0-9" value="{{ $book->pages }}" />
                            @error('pages')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="form-outline form-white mb-4 text-start">
                            <label class="form-label" for="description">Descrizione</label>
                            <input type="textarea" id="description"
                                class="form-control form-control-lg @error('description') is-invalid @enderror"
                                placeholder="Descrizione del libro" name="description"
                                value="{{ $book->description }}" />
                            @error('description')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="form-outline form-white mb-4 text-start">
                            <label class="form-label" for="typePasswordX">Anno di pubblicazione</label>
                            <input type="date" id="typePasswordX"
                                class="form-control form-control-lg @error('year') is-invalid @enderror" name="year"
                                value="{{ $book->year }}" />
                            @error('year')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="form-outline form-white mb-4 text-start">
                            <label for="password_confirmation" class="form-label">Prezzo</label>
                            <input type="number" name="price"  min="1"
                                class="form-control form-control-lg @error('price') is-invalid @enderror"
                                id="password_confirmation" required placeholder="0-9€"
                                value="{{ $book->price }}" />
                            @error('price')
                                {{ $message }}
                            @enderror
                        </div>

                        <button class="btn btn-outline-dark btn-lg px-5" href=""
                            type="submit">Modifica</button>
                        <a class="btn btn-dark btn-lg px-5" href="{{ route('dashboard') }}">Annulla</a>
                    </div>
                </form>
            </main>
        </div>
    </div>
</x-auth>
