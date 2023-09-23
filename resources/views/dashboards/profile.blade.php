<x-dashboard>
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
                <h2> {{ Auth::user()->name }} {{ Auth::user()->surname }}</h2>
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
