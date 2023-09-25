<x-layout>
    <main class="margin-show" style="margin-top: 20%">
        <section class="d-flex align-items-center">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6 trans-scale"> <img class="card-img-top img-fluid rounded" style="width: 30rem; height: 35rem"
                            src="{{ empty($book->image) ? '\function_set_default_image_when_image_not_present.png' : Storage::url($book->image) }}"
                            alt="..." />
                    </div>
                    <div class="col-md-6 div-show-book py-4 d-flex flex-column justify-content-between">
                        <div>
                            <h1 class="display-5 fw-bolder">{{ $book->title }}</h1>
                            <hr>
                        </div>
                        <div class="fs-5">
                            <p class="lead">
                                Autore: <a class="text-dark"
                                    href="{{ route('authors.show', $book->author->id) }}"><strong>{{ $book->author->firstname }}
                                        {{ $book->author->lastname }}</strong></a>
                            </p>
                            <p class="lead">
                                Genere: {{ $book->genre }}
                            </p>
                            <p class="lead">
                                Descrizione:
                                @if (!empty($book->description))
                                    {{ $book->description }}
                                @else
                                    Nessuna descrizione disponibile
                                @endif
                            </p>
                            <p class="lead pb-5">
                                @if (!empty($book->year))
                                    Pubblicato il: {{ $book->year }}
                                @else
                                    Pubblicato il: aaaa/mm/gg
                                @endif
                            </p>
                        </div>
                        <div class="d-flex">
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                Acquista
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Potrebbero interessarti anche:</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-start div-show-random">
                    @foreach ($books as $randombook)
                        @if ($randombook->id != $book->id)
                            <div class="col mb-5 pt-5 trans-scale">
                                <div class="card h-100">
                                    <img class="card-img-top"
                                        src="{{ empty($randombook->image) ? '\function_set_default_image_when_image_not_present.png' : Storage::url($randombook->image) }}"
                                        alt="{{ $randombook->title }}">
                                    <div class="card-body p-4">
                                        <div class="text-start">
                                            <h5 class="fw-bolder">{{ $randombook->title }}</h5>
                                            <div class="d-flex justify-content-between pt-2">
                                                <p>{{ $randombook->author->firstname }}
                                                    {{ $randombook->author->lastname }}</p>
                                                <span>{{ $randombook->price }}€</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class=""><a class="btn btn-outline-dark mt-auto"
                                                href="{{ route('books.show', $randombook->id) }}">Scopri di più</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    </main>
</x-layout>
