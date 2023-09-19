<x-layout>
    <section class="vh-100 gradient-custom">
        <div class="container py-2">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <form class="card-body p-5 text-center" action="{{ route('register') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="mb-md-5 mt-md-4 pb-1">
                                <h2
                                    class="fw-bold mb-2 text-uppercase d-flex justify-content-center align-items-center">
                                    <div class="w-25">
                                        <img src="/book.jpg" class="img-fluid w-50" alt="bookstore">
                                    </div>
                                    Bookstore
                                </h2>

                                <p class="text-white-50 mb-5">Sign up now!</p>

                                <div class="form-outline form-white mb-4 text-start">
                                    <label class="form-label" for="name">First Name</label>
                                    <input type="text" id="name" class="form-control form-control"
                                        placeholder="Name" name="name" />
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </div>

                                <div class="form-outline form-white mb-4 text-start">
                                    <label class="form-label" for="lastname">Last Name</label>
                                    <input type="text" id="lastname" class="form-control form-control"
                                        placeholder="Surname" name="lastname" />
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </div>

                                <div class="form-outline form-white mb-4 text-start">
                                    <label class="form-label" for="typeEmailX">Email account</label>
                                    <input type="email" id="typeEmailX" class="form-control form-control"
                                        placeholder="email@exemple.com" name="email" />
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </div>

                                <div class="form-outline form-white mb-4 text-start">
                                    <label class="form-label" for="typePasswordX">Password</label>
                                    <input type="password" id="typePasswordX" class="form-control form-control"
                                        placeholder="Password" name="password" />
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </div>

                                <div class="form-outline form-white mb-4 text-start">
                                    <label for="password_confirmation" class="form-label">Password confirmation</label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        id="password_confirmation" required>
                                </div>

                                <button class="btn btn-outline-light btn px-5" type="submit">Sign Up</button>
                            </div>

                            <div>
                                <p class="mb-0">Do you have an account? <a href="{{ route('login') }}"
                                        class="text-white-50 fw-bold">Login</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>