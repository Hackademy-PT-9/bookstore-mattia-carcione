<x-layout>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <form class="card-body p-5 text-center" action="{{ route('login') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2
                                    class="fw-bold mb-2 text-uppercase d-flex justify-content-center align-items-center">
                                    <div class="w-25">
                                        <img src="/book.jpg" class="img-fluid w-50" alt="bookstore">
                                    </div>
                                    Bookstore
                                </h2>

                                <p class="text-white-50 mb-5">Please enter your Email and Password!</p>

                                <div class="form-outline form-white mb-4 text-start">
                                    <label class="form-label" for="typeEmailX">Email utente</label>
                                    <input type="email" id="typeEmailX" class="form-control form-control-lg"
                                        placeholder="email@exemple.com" name="email" required/>
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </div>

                                <div class="form-outline form-white mb-4 text-start">
                                    <label class="form-label" for="typePasswordX">Password</label>
                                    <input type="password" id="typePasswordX" class="form-control form-control-lg"
                                        placeholder="Password" name="password" required/>
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </div>

                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                            </div>

                            <div>
                                <p class="mb-0">Don't have an account? <a href="{{ route('register') }}"
                                        class="text-white-50 fw-bold">Sign Up</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>