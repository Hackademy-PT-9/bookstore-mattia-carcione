<x-crud>
    <form class="card-body text-center pb-3" action="{{ route('user-profile-information.update', $user) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="d-flex justify-content-start">
            <a href="{{ route('home') }}">
                <i class="fa-solid fa-xmark fs-5" style="color: #ffffff;"></i>
            </a>
        </div>

        <div class="mb-md-4 mt-md-4 pb-1">
            <h2 class="fw-bold mb-2 pb-4 text-uppercase d-flex justify-content-center align-items-center">
                Modifica informazioni utente
            </h2>

            <div class="form-outline d-flex justify-content-between form-white mb-4 text-start">
                <div class="col-6 px-1">
                    <label class="form-label" for="name">Nome <span class="text-danger">*</span></label>
                    <input type="text" id="name"
                        class="form-control form-control-lg @error('name') is-invalid @enderror" placeholder="Nome"
                        name="name" required value="{{ $user->name }}" />
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
                <div class="col-6 px-1">
                    <label class="form-label" for="surname">Cognome <span class="text-danger">*</span></label>
                    <input type="text" id="surname"
                        class="form-control form-control-lg @error('surname') is-invalid @enderror"
                        placeholder="Cognome" name="surname" required value="{{ $user->surname }}" />
                    @error('surname')
                        {{ $message }}
                    @enderror
                </div>

            </div>

            <div class="form-outline form-white mb-4 text-start">
                <label class="form-label" for="typeEmailX">Indirizzo email <span class="text-danger">*</span></label>
                <input type="email" id="typeEmailX"
                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                    placeholder="email@example.com" name="email" required value="{{ $user->email }}" />
                @error('email')
                    {{ $message }}
                @enderror
            </div>

            <div class="row">
                <div class="form-outline form-white mb-4 text-start col-5">
                    <label class="form-label" for="typePasswordX">Anno di nascita</label>
                    <input type="date" id="typePasswordX"
                        class="form-control form-control-lg @error('year') is-invalid @enderror" name="year"
                        value="" />
                    @error('year')
                        {{ $message }}
                    @enderror
                </div>
                <div class="col-3 form-outline form-white mb-4 text-start">
                    <label class="form-label" for="state">Stato</label>
                    <select type="text" id="state"
                        class="form-control form-control-lg @error('state') is-invalid @enderror" placeholder="Stato"
                        name="state" value="{{ $user->state }}">
                        <option value="">
                            --Seleziona
                        </option>
                        @foreach ($states as $state)
                            <option value="{{ $state }}">
                                {{ $state }}
                            </option>
                        @endforeach
                    </select>
                    @error('state')
                        {{ $message }}
                    @enderror
                </div>
                <div class="d-md-flex flex-column a mb-4 py-2 col-2">

                    <div class="form-check form-check-inline mb-0 me-4 text-start">
                        <input class="form-check-input" type="radio" name="gender" id="femaleGender"
                            value="female" />
                        <label class="form-check-label" for="femaleGender">F</label>
                    </div>

                    <div class="form-check form-check-inline mb-0 me-4 text-start">
                        <input class="form-check-input" type="radio" name="gender" id="maleGender" value="male" />
                        <label class="form-check-label" for="maleGender">M</label>
                    </div>

                    <div class="form-check form-check-inline mb-0 text-start">
                        <input class="form-check-input" type="radio" name="gender" id="otherGender" value="other" />
                        <label class="form-check-label" for="otherGender">Altro</label>
                    </div>
                </div>

            </div>



            <div class="mb-3 mx-auto text-start">
                <img class="card-img-top rounded-circle mb-5 mb-md-0 mx-auto" style="width:10rem"
                    src="{{ empty($user->image) ? '/assets/images/default.jpg' : Storage::url($user->image) }}"
                    alt="..." />
            </div>

            <div class="form-outline form-white mb-4 text-start">
                <label class="form-label" for="image">Immagine profilo</label>
                <input type="file" id="image"
                    class="form-control form-control-lg @error('image') is-invalid @enderror" name="image"
                    value="" />
                @error('image')
                    {{ $message }}
                @enderror
            </div>

            <div class="row">
                <div class="form-outline form-white mb-4 text-start col-4">
                    <label class="form-label" for="address">Indirizzo</label>
                    <input type="text" id="address"
                        class="form-control form-control-lg @error('address') is-invalid @enderror" placeholder="Via"
                        name="address" value="{{ $user->address }}" />
                    @error('address')
                        {{ $message }}
                    @enderror
                </div>
                <div class="form-outline form-white mb-4 text-start col-4">
                    <label class="form-label" for="city">Città</label>
                    <input type="text" id="city"
                        class="form-control form-control-lg @error('city') is-invalid @enderror" placeholder="Città"
                        name="city" value="{{ $user->city }}" />
                    @error('city')
                        {{ $message }}
                    @enderror
                </div>
                <div class="form-outline form-white mb-4 text-start col-4">
                    <label class="form-label" for="country">Provincia</label>
                    <input type="text" id="country"
                        class="form-control form-control-lg @error('country') is-invalid @enderror"
                        placeholder="Provincia" name="country" value="{{ $user->country }}" />
                    @error('country')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="form-outline form-white mb-4 text-start">
                <label class="form-label" for="description">Descrizione</label>
                <textarea class="form-control" type="textarea" id="description"
                    class="form-control form-control-lg @error('description') is-invalid @enderror" placeholder="Descriviti"
                    name="description" style="height: 100px">{{ $user->description }}</textarea>

                @error('description')
                    {{ $message }}
                @enderror
            </div>

            <div class="text-start text-danger my-5">
                <p>* Campi obbligatori</p>
            </div>

            <button class="btn btn-outline-dark btn-lg px-5" href="" type="submit">Aggiorna</button>
            <a class="btn btn-dark btn-lg px-5" href="{{ route('profile') }}">Annulla</a>
        </div>
    </form>
</x-crud>
