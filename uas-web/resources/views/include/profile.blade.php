@extends('index')
@section('container')
    <div class="container mt-5 mb-5">
        <div class="box rounded m-3 bg-muted shadow-lg p-3 mt-3 mb-5">
            <form action="">
                <div class="row">
                    <div class="col-4">
                        <div class="m-2 justify-content-center text-center">
                            <h4 class="m-3 ">Ubah Profile</h4>
                            <img @if (empty(Auth::user()->foto_user)) src="/user_icon/loginuser/us.png"  @else
                             src="{{ asset('storage/' . Auth::user()->foto_user) }}" @endif
                                width="200px" class="rounded-circle border border-dark p-1 justify-content-center ms-3">
                            <div class="mt-3">
                                <input type="file" class="form ms-5" id="myfile">
                            </div>
                        </div>
                    </div>
                    <div class=" col-8 mb-2">
                        <div class="ms-5 mt-2">
                            <div class=" mb-1">
                                <label for="exampleFormControlInput1" class="form-label fw-bolder">Nama Lengkap </label>
                                <input type="name" class="form-control" id="exampleFormControlInput1"
                                    placeholder="name@example.com" value="Nama" name="nama">
                            </div>
                            <div class=" mb-1">
                                <label for="exampleFormControlInput1" class="form-label fw-bolder">Username </label>
                                <input type="username" class="form-control" id="exampleFormControlInput1"
                                    placeholder="name@example.com" value="username" name="username">
                            </div>
                            <div class=" mb-1">
                                <label for="exampleFormControlInput1" class="form-label fw-bolder">Email </label>
                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                    placeholder="name@example.com" value="Email" name="email">
                            </div>
                            <div class=" mb-1">
                                <label for="exampleFormControlInput1" class="form-label fw-bolder">No Telepon </label>
                                <input type="telepon" class="form-control" id="exampleFormControlInput1"
                                    placeholder="name@example.com" value="telepon" name="telepon">
                            </div>
                            <div class=" mb-1">
                                <label for="exampleFormControlInput1" class="form-label fw-bolder">Alamat </label>
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="name@example.com" value="alamat" name="alamat">
                            </div>
                            <div class=" mb-1">
                                <label for="exampleFormControlInput1" class="form-label fw-bolder">Password </label>
                                <input type="password" class="form-control" id="exampleFormControlInput1" value=""
                                    name="password">
                            </div>
                            <div class=" mb-1">
                                <label for="exampleFormControlInput1" class="form-label fw-bolder">Konfirmasi Password
                                </label>
                                <input type="password" class="form-control" id="exampleFormControlInput1" value=""
                                    name="konfirmpass">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end me-3 mt-2">

                    <a type="button" class="btn btn-dark" href="/">Perbarui</a>
                </div>
        </div>
        </form>
    </div>
@endsection
