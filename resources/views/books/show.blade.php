<x-layout>
    <main class="margin-show" style="margin-top: 20%">
        <section class="d-flex align-items-center">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"> <img class="card-img-top img-fluid" style="width:25rem; height:35rem"
                            src="{{ empty($book->image) ? '/assets/images/default.jpg' : Storage::url($book->image) }}"
                            alt="..." /></div>
                    <div class="col-md-6">
                        <div class="small mb-1">SKU: BST-498</div>
                        <h1 class="display-5 fw-bolder">{{ $book->title }}</h1>
                        <div class="fs-5 mb-5">
                            <span class="">€{{ $book->price }}</span>
                        </div>
                        <p class="lead">{{ $book->description }}</p>
                        <div class="d-flex">
                            <input class="form-control text-center me-3" id="inputQuantity" type="num"
                                value="1" style="max-width: 3rem" />
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Related products</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach ($books as $item)
                        <div class="col mb-5 pt-5">
                            <div class="card h-100">
                                <img class="card-img-top"
                                    src="{{ empty($item->image) ? '/assets/images/default.jpg' : Storage::url($item->image) }}"
                                    alt="...">
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <h5 class="fw-bolder">Fancy Product</h5>
                                        $40.00 - $80.00
                                    </div>
                                </div>
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View
                                            options</a></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
</x-layout>
