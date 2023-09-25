<x-layout>
    <div class="hero-section section overlay" style="background-image: url('/dig_book_print_hero_1280x768.jpeg')">
        <div class="container">
            <div class="row">
                <div class="hero-content text-left text-light col-xs-12 fs-2">
                    <h1 class="text-transform_none fs-1"><strong>Bookstore</strong></h1>
                    <p>Scopri tutti i nostri libri in vendita.</p>
                </div>
            </div>
        </div>
    </div>
    <main class="min-vh-100  pt-5 bg-light">
        <div class="container">
            <div class="text-center py-5">
                <h2>La nostra selezione</h2>
            </div>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-start row-index">
                @foreach ($books as $book)
                    <div class="col mb-5 pt-5 trans-scale">
                        <div class="card h-100">
                            <img class="card-img-top"
                                src="{{ empty($book->image) ? '\function_set_default_image_when_image_not_present.png' : Storage::url($book->image) }}"
                                alt="{{ $book->title }}">
                            <div class="card-body">
                                <div class="text-start">
                                    <h5 class="fw-bolder">{{ $book->title }}</h5>
                                    <div class="d-flex justify-content-between pt-2">
                                        <p>{{ $book->author->firstname }}
                                            {{ $book->author->lastname }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="d-flex flex-column flex-sm-row-reverse align-items-sm-center justify-content-between">
                                    <p class="">{{ $book->price }}€</p>

                                    <a class="btn btn-outline-dark mt-auto"
                                        href="{{ route('books.show', $book) }}">Scopri di più</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
</x-layout>
