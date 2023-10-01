<x-layout>
    <div class="bg-dark py-5">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-lg-8 col-xl-7 col-xxl-6">
                    <div class="my-5 text-center text-xl-start">
                        <h1 class="display-5 fw-bolder text-white mb-2">A Bootstrap 5 template for modern businesses</h1>
                        <p class="lead fw-normal text-white-50 mb-4">Quickly design and customize responsive mobile-first
                            sites with Bootstrap, the world’s most popular front-end open source toolkit!</p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">Get Started</a>
                            <a class="btn btn-outline-light btn-lg px-4" href="#!">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5"
                        src="https://dummyimage.com/600x400/343a40/6c757d" alt="..."></div>
            </div>
        </div>
    </div>
    <main class="min-vh-100  pt-5 bg-light">
        <div class="container">
            <div class="text-center py-5">
                <h2>La nostra selezione</h2>
            </div>
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="row gx-5">
                        @foreach ($books as $book)
                            <div class="col-lg-4 mb-5 trans-scale">
                                <div class="card h-100 shadow border-0">
                                    <img class="card-img-top"
                                        src="{{ empty($book->image) ? '\function_set_default_image_when_image_not_present.png' : Storage::url($book->image) }}"
                                        alt="{{ $book->title }}">
                                    <div class="card-body p-4">
                                        {{-- <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div> --}}
                                        <a class="text-decoration-none link-dark stretched-link" href="#!">
                                            <h5 class="card-title mb-3">{{ $book->title }}</h5>
                                        </a>
                                        <p class="card-text mb-0">{{ $book->description }}</p>
                                        <div class="d-flex align-items-center justify-content-between mt-3">
                                            <div class="small">
                                                <div class="fw-bold">{{ $book->author->firstname }}</div>
                                                <div class="text-muted">{{ $book->price }}€</div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                        <div class="d-flex align-items-end justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <img class="rounded-circle me-3"
                                                    src="https://dummyimage.com/40x40/ced4da/6c757d" alt="...">
                                                <div class="small">
                                                    <div class="fw-bold">{{ $book->author->firstname }}</div>
                                                    <div class="text-muted">{{ $book->created_at }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </main>
</x-layout>
