<x-dashboard>
    @if (session('success'))
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                <use xlink:href="#check-circle-fill" />
            </svg>
            <div>
                {{ session('success') }}
            </div>
        </div>
    @endif
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-3 text-center">
                <img src="{{ Storage::url(Auth::user()->image) }}" alt="Immagine Profilo"
                    class="img-thumbnail border-primary rounded-circle mb-5" style="width: 10rem; height: 10rem">
                <div>
                    <a href="{{ route('user.edit') }}" class="btn btn-dark text-decoration-none">MODIFICA</a>
                </div>
            </div>

            <div class="col-md-9">
                <div class="d-flex">
                    <h2> {{ Auth::user()->name }} {{ Auth::user()->surname }} </h2>
                        <a href="{{ route('user.edit') }}"
                            class="nav-link-custom text-decoration-none d-flex align-items-center gap-2 text-dark"> <i
                                class="fa-solid fa-pen-to-square"></i>
                        </a>
                </div>

                <p class="text-800">Registrato il: {{ Auth::user()->created_at }}</p>
                <p class="text-800">Attivo da: {{ Auth::user()->created_at->diffForHumans() }}</p>
                <p><strong>Email:</strong> {{ Auth::user()->email }} </p>
                <p><strong>Data di Nascita:</strong> {{ Auth::user()->birthday }} </p>
                <p><strong>Indirizzo:</strong> {{ Auth::user()->address }} </p>
                <p><strong>Provincia:</strong> {{ Auth::user()->country }} </p>
                <p><strong>Città:</strong> {{ Auth::user()->city }} </p>
                <p><strong>Stato:</strong> {{ Auth::user()->state }} </p>
                <p><strong>Descrizione:</strong> {{ Auth::user()->description }} </p>
            </div>

        </div>
    </div>
</x-dashboard>
