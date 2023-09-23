<x-dashboard>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-3">
                <img src="{{ Storage::url(Auth::user()->image) }}" alt="Immagine Profilo"
                    class="img-thumbnail rounded-circle" style="width: 10rem; height: 10rem">
            </div>
            <div class="col-md-9">
                <a href="{{ route('user.edit') }}" class="d-block text-decoration-none">MODIFICA</a>
                <h2> {{ Auth::user()->name }} {{ Auth::user()->surname }}</h2>
                <p class="text-800">Registrato il: {{ Auth::user()->created_at }}</p>
                <p class="text-800">Attivo da: {{ Auth::user()->created_at->diffForHumans() }}</p>
                <p><strong>Email:</strong> {{ Auth::user()->email }} </p>
                <p><strong>Data di Nascita:</strong> {{ Auth::user()->birth_date }} </p>
                <p><strong>Indirizzo:</strong> {{ Auth::user()->address }} </p>
                <p><strong>Provincia:</strong> {{ Auth::user()->province }} </p>
                <p><strong>Città:</strong> {{ Auth::user()->city }} </p>
                <p><strong>Stato:</strong> {{ Auth::user()->state }} </p>
                <p><strong>Descrizione:</strong> {{ Auth::user()->description }} </p>
            </div>
        </div>
    </div>
</x-dashboard>
