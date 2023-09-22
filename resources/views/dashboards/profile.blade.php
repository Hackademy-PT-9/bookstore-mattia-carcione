<x-dashboard>
    <div class="card-body d-flex flex-column justify-content-between pb-3">
        <div class="row align-items-center g-5 mb-3 text-center text-sm-start">
            <div class="col-12 col-sm-auto mb-sm-2">
                <div class="avatar avatar-5xl"><img class="rounded-circle" src="assets/img/team/15.webp" alt="">
                </div>
            </div>
            <div class="col-12 col-sm-auto flex-1">
                <h3>{{ Auth::user()->name }} {{ Auth::user()->surname }}</h3>
                <p class="text-800">Registrato il: {{ Auth::user()->created_at }}</p>
                <p class="text-800">Attivo da: {{ Auth::user()->created_at->diffForHumans() }}</p>
                <p class="text-800">Email: {{ Auth::user()->email }}</p>
            </div>
        </div>
    </div>
</x-dashboard>
