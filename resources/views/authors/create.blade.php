<x-auth>
    <nav class="container py-4">
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
                <a href="{{ route('profile') }}"
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
    
    <div class="container-fluid d-flex justify-content-center align-items-center mt-5">
        <div class="row justify-content-center row-custom">
            <main>
                <form class="card-body text-center" action="{{ route('authors.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="d-flex justify-content-start">
                        <a href="{{ route('home') }}">
                            <i class="fa-solid fa-xmark fs-5" style="color: #ffffff;"></i>
                        </a>
                    </div>

                    <div class="mb-md-4 mt-md-4 pb-1">
                        <h2 class="fw-bold mb-2 text-uppercase d-flex justify-content-center align-items-center">
                            Aggiungi un Autore
                        </h2>

                        <div class="form-outline form-white mb-4 text-start">
                            <label class="form-label" for="firstname">Nome</label>
                            <input type="text" id="firstname"
                                class="form-control form-control-lg @error('firstname') is-invalid @enderror"
                                placeholder="Nome dell'autore" name="firstname" required
                                value="{{ old('firstname') }}" />
                            @error('firstname')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="form-outline form-white mb-4 text-start">
                            <label class="form-label" for="lastname">Cognome</label>
                            <input type="text" id="lastname"
                                class="form-control form-control-lg @error('lastname') is-invalid @enderror"
                                placeholder="Genere del libro" name="lastname" required value="{{ old('lastname') }}" />
                            @error('lastname')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="form-outline form-white mb-4 text-start align-items-center">
                            <label class="form-label" for="nationality">Nazionalità</label>
                            <select type="text" id="nationality"
                                class="form-select form-select-lg @error('nationality') is-invalid @enderror"
                                placeholder="Autore" name="nationality" value="{{ old('nationality') }}">
                                <option value="" class="p-3">
                                    -- Seleziona
                                </option>
                                @foreach ($nationalities as $nationality)
                                    <option value="{{ $nationality }}" class="p-3">
                                        {{ $nationality }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button class="btn btn-outline-dark btn-lg px-5" href="" type="submit">Aggiungi</button>
                        <a class="btn btn-dark btn-lg px-5" href="{{ route('dashboard') }}" type="submit">Annulla</a>
                    </div>
                </form>
            </main>
        </div>
    </div>
</x-auth>
