@extends('layouts.adminApp')
@section('content')
    @if (session()->has('success'))
        <div class="col-sm-12">
            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                <span class="badge badge-pill badge-success"></span> Data telah di Update
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Profile</h5>
                    <div class="comment-widgets scrollable">
                        <!-- Comment Row -->
                        <div class="d-flex flex-row comment-row mt-0">
                            <div class="p-2">
                                <img src="{{ asset('storage/' . Auth::user()->foto_user) }}" alt="user" width="250"
                                    class="rounded-circle" />
                            </div>
                            <div class="comment-text w-100">
                                <h2 class="font-medium">{{ Auth::user()->name }}</h2>
                                <span class="mb-3 d-block">Username <span>: {{ Auth::user()->username }}</span>
                                </span>
                                <span class="mb-3 d-block">Email <span>: {{ Auth::user()->email }}</span>
                                </span>
                                <span class="mb-3 d-block">Alamat <span>: {{ Auth::user()->alamat }}</span>
                                </span>
                                <div class="comment-footer">
                                    <span class="text-muted float-end">{{ Auth::user()->created_at }}</span>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-row comment-row">
                        <div class="p-2">
                        </div>
                        <div class="comment-text active w-100">
                            <h6 class="font-medium">Setting</h6>
                            <form action="{{ url('edit.profile', Auth::user()->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @foreach ($u as $item)
                                    @if ($item->id_user == Auth::user()->id_user)
                                        <div class="form-group row">
                                            <label for="fname"
                                                class="col-sm-3 text-end control-label col-form-label">Nama
                                                Lengkap</label>
                                            <div class="col-sm-9">
                                                <input type="text"
                                                    class="form-control @error('nama') is-invalid @enderror" name="name"
                                                    placeholder="Isi Nama Lengkap Disini"
                                                    value="{{ old('name', $item->name) }}">
                                            </div>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label for="fname"
                                                class="col-sm-3 text-end control-label col-form-label">Username</label>
                                            <div class="col-sm-9">
                                                <input type="text"
                                                    class="form-control @error('username') is-invalid @enderror"
                                                    name="username" value="{{ old('username', $item->username) }}"
                                                    placeholder="Isi Username Disini">
                                            </div>
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label for="fname"
                                                class="col-sm-3 text-end control-label col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email', $item->email) }}"
                                                    placeholder="Isi email Disini">
                                            </div>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label for="fname" class="col-sm-3 text-end control-label col-form-label">No.
                                                Telepon</label>
                                            <div class="col-sm-9">
                                                <input type="text"
                                                    class="form-control  @error('telepon') is-invalid @enderror"
                                                    name="telepon" value="{{ old('telepon', $item->telepon) }}"
                                                    placeholder="Isi No. Telepon Disini">
                                            </div>

                                            @error('telepon')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label for="fname"
                                                class="col-sm-3 text-end control-label col-form-label">Alamat</label>
                                            <div class="col-sm-9">
                                                <input type="text"
                                                    class="form-control  @error('alamat') is-invalid @enderror"
                                                    name="alamat" value="{{ old('alamat', $item->alamat) }}"
                                                    placeholder="Isi alamat Disini">
                                            </div>

                                            @error('alamat')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label for="fname"
                                                class="col-sm-3 text-end control-label col-form-label">Foto
                                                Profile</label>
                                            <div class="col-md-9">
                                                <div class="custom-file">
                                                    <input type="hidden" value="{{ Auth::user()->foto_user }}"
                                                        name="lama">
                                                    <input name="foto" type="file"
                                                        class="custom-file-input  @error('foto') is-invalid @enderror"
                                                        id="validatedCustomFile" required>
                                                    <label class="custom-file-label" for="validatedCustomFile">Pilih File
                                                        Foto
                                                        (PNG,JPG,JPEG)
                                                        ...</label>
                                                    <div class="invalid-feedback">
                                                        Example invalid custom file feedback
                                                    </div>
                                                    @error('foto')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="comment-footer">
                                            <button type="submit" class="btn btn-success btn-sm text-white">
                                                Save
                                            </button>
                                            <a href="{{ url('hapus.user', Auth::user()->id) }}"
                                                class="btn btn-danger btn-sm text-white">
                                                Delete Akun
                                            </a>

                                        </div>
                                    @endif
                                @endforeach
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
        @section('script')
            <script language="javascript">
                var popupWindow = null;

                function centeredPopup(url, winName, w, h, scroll) {
                    LeftPosition = (screen.width) ? (screen.width - w) / 2 : 0;
                    TopPosition = (screen.height) ? (screen.height - h) / 2 : 0;
                    settings =
                        'height=' + h + ',width=' + w + ',top=' + TopPosition + ',left=' + LeftPosition + ',scrollbars=' + scroll +
                        ',resizable'
                    popupWindow = window.open(url, winName, settings)
                }
                $(document).ready(function() {
                    $('.zero_config').dataTable();
                });
            </script>
        @endsection
