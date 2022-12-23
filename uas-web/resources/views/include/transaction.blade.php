@extends('index')
@section('container')
    <div class="container mt-3 mb-2">
        <div class="row">
            <div class="col-3  mt-2  ">
                <div class="bg-light rounded pb-5">
                    <div class="ps-2 pt-2 pb-5">
                        <div class="mt-3 ms-3">
                            <a href="/profile" class="text-decoration-none text-dark pt-3 fs-6 fw-bold"><img class="me-2"
                                    src="{{ asset('storage/' . Auth::user()->foto_user) }}" class="ms-1" width="25px">{{Auth::user()->username}}</a>
                        </div>
                        <div class="mt-3 pb-5" style="margin-left:-20px;">
                            <ul>
                                <ol class="menu"><a href="/keranjang" class="text-decoration-none text-secondary">
                                        Keranjang</a></ol>
                                <ol class="menu"><a href="/belanja/terbaru" class="text-decoration-none text-secondary">
                                        Item Terbaru</a></ol>
                                <ol class="menu"><a href="/belanja/populer" class="text-decoration-none text-secondary">
                                        Item Populer</a></ol>
                                <ol class="menu"><a
                                        class="text-decoration-none text-secondary pb-5"href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                </ol>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                            </ul>
                        </div>

                    </div>
                </div>

            </div>

            <div class="col-9  mt-2 rounded" style="margin-left: 0px;">
                <div style="">
                    <div class="text rounded" style="background-color: rgba(156, 156, 156, 0.162)">
                        <div class="pt-3 ps-1 text-center pb-1">
                            <h5 class="ps-1">Riwayat Transaksi</h5>
                        </div>
                    </div>
                    <form action="/group" method="get">
                        @csrf
                        <div class="mt-3 mb-3 btn-group">
                            <div class="btn-group d-relative">

                                <div class="d-flex ">
                                    <button class="btn btn-outline-primary d-flex me-1 cek " value="menunggu"
                                        name="parameter">Menunggu</button>
                                </div>
                                <div class="d-flex">
                                    <button class="btn btn-outline-primary d-flex me-1 cek " value="dibayar"
                                        name="parameter">Dibayar</button>
                                </div>
                                <div class="d-flex">
                                    <button class="btn btn-outline-primary d-flex me-1 cek " value="diproses"
                                        name="parameter">Diproses</button>
                                </div>
                                <div class="d-flex">
                                    <button class="btn btn-outline-primary d-flex me-1 cek " value="dikirim"
                                        name="parameter">Dikirim</button>
                                </div>
                                <div class="d-flex">
                                    <button class="btn btn-outline-primary d-flex me-1 cek " value="diterima"
                                        name="parameter">Diterima</button>
                                </div>
                                <div class="d-flex">
                                    <button class="btn btn-outline-primary d-flex me-1 cek " value="selesai"
                                        name="parameter">Selesai</button>
                                </div>
                                <div class="d-flex">
                                    <button class="btn btn-outline-primary d-flex me-1 cek " value="dikembalikan"
                                        name="parameter">Dikembalikan</button>
                                </div>
                                <div class="d-flex">
                                    <button class="btn btn-outline-primary d-flex me-1 cek " value="dibatalkan"
                                        name="parameter">Batal</button>
                                </div>
                                <div class="d-flex">
                                    <button class="btn btn-outline-primary d-flex me-1 cek " value="kadaluarsa"
                                        name="parameter">Kadaluarsa</button>
                                </div>

                    </form>
                </div>
            </div>
            {{-- hdjhdjnjkdnk --}}
            @foreach ($bayar as $b)
                <div class="bg-light mt-2 mb-4 rounded">
                    <div class="pt-3 ps-3 pe-3 pb-2">

                        <div class="row">
                            <div class="col-5">
                                <div class="d-flex-justify-content-start">
                                    <label class="ms-3" style="font-size: 13px; " for="username">{{ $b->tgl_transaksi }}
                                        || {{ $b->name }}</label>
                                    <h5 class="fw-bolder ms-3 mt-1">{{ $b->nama_barang }}</h5>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="d-flex-justify-content-end">
                                    <label class="d-flex justify-content-end mt-1 "
                                        style="font-size: 13px; ">{{ $b->alamat }} | {{ $b->telepon }} </label>
                                    <h6 class="fw-bolder text-danger fst-italic me-1 d-flex justify-content-end">
                                        {{ $b->status }}</h6>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div>
                            <div class="row">
                                <div class="col-3">
                                    <img src="{{ asset('storage/' .$b->foto_barang) }}" class="ms-5 mt-2" width="140px">
                                </div>
                                <div class="col-9">
                                    <ul>
                                        <ol class="fs-6">Size = {{ $b->size }}</ol>
                                        <ol class="fs-6">Variasi = {{ $b->warna }} </ol>
                                        <ol class="fs-6">Jumlah = {{ $b->jumlah_barang }} </ol>
                                        <ol class="fs-6">Harga = Rp. {{ $b->harga_satuan }}</ol>
                                        <ol class="fs-6">Diskon = - </ol>
                                        <ol class="pt-2 fw-bolder">Total Pesanan = Rp. {{ $b->total_harga }}</ol>
                                    </ul>


                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                {{-- hdjhdjnjkdnk --}}
            @endforeach


        </div>
    </div>
    </div>
    </div>
    <style>
        .side {
            margin-left: -55px;
            margin-top: 2px;
        }

        .menu:hover {
            background-color: rgba(143, 143, 143, 0.368);
        }
    </style>
    <script>
        const tombol = document.querySelectorAll('.cek');

        tombol.onclick = function() {
            tombol.classlist.add('active')

        }
    </script>
@endsection
