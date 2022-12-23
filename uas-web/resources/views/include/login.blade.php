@extends('index')
@section('container')
    <div class="container mt-5 mb-5">
        <div class="box rounded m-3 bg-muted shadow-lg p-3 mt-3 mb-5">
            <div class="m-3">
                <div class="row">
                    <div class="col-6">
                        <div class="ms-3 me-5 mb-5 mt-1 shadow-lg p-1 ">
                            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="user_icon/ss.jpg" width="450px" class="">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="user_icon/loginuser/g-login-g.png" width="450px" class="">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="user_icon/sepatu.jpg" width="450px" class="">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-6">
                        <h1 class="pb-3 text-left">Login</h1>
                        <div class="mt-1 bg-light rounded shadow-lg p-3">
                            <div class="form m-3 p-3">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" id="exampleInputEmail1" required
                                            autocomplete="email" aria-describedby="emailHelp" name="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" id="exampleInputPassword1">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary d-flex justify-content-center">
                                        {{ __('Login') }}</button>

                                    <div class="text-center pt-3">
                                        atau
                                    </div>
                                    <div class="text-center">
                                        <label class="pt-2">Belum punya akun? <a href="/daftar"
                                                class="text-success">Daftar</a></label>

                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
