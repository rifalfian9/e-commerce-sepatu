@extends('index')
@section('container')
    <div class="container mt-1">
        @foreach ($barang as $barang)
            <form action="/keranjang/tambah" method="post">
                @csrf
                <div class="box rounded m-3 bg-muted shadow-lg p-3">
                    <div class="row">
                        <div class="col-5">
                            <div class="ms-4 mt-3 me-4">
                                <img src="{{ asset('storage/' . $barang->foto_barang) }}" width="400px"
                                    class="shadow p1 img-fluid">
                            </div>

                        </div>
                        <div class="col-7">
                            <div class="ms-3 mt-3 me-3">
                                <h4 class="fw-bold">{{ $barang->nama_barang }}</h4>
                                <div class="ms-1 d-flex">
                                    <div class="d-flex small text-warning mb-2"> {{ $barang->rating }}
                                        @for ($i = 1; $i <= $barang->rating; $i++)
                                            <div class="bi-star-fill"></div>
                                        @endfor



                                    </div>
                                    <p class="ms-2">{{ $barang->nama_kategori_barang }}</p>
                                </div>
                                <h2 class="fw-bolder text-warning">Rp. {{ $barang->harga_satuan }}</h2>

                                <div class="ms-1 mt-4">
                                    <label for="Warna" class="d-flex"> Warna : <p> {{ $barang->warna }} </p></label>
                                    <label for="size" class="d-flex"> Ukuran : <p> {{ $barang->size }} </p></label>
                                    <input type='number' style="width:100px; height:35px;" id="counter"
                                        class="text-center form-control d-inline" placeholder="1" name="jumlah">
                                    <input type='hidden' name='id_barang' value="{{ $barang->id_barang }}">
                                    <input type='hidden' name='hargasatuan' value="{{ $barang->harga_satuan }}">

                                </div>

                                <div class="ms-1 d-flex mt-4 mb-4">
                                    @guest
                                        <a href="/" class="btn btn-outline-secondary position-relative"><img
                                                src="/user_icon/keranjang.png" height="20px"></a>
                                    @else
                                        <button class="btn btn-outline-secondary position-relative"><img
                                                src="/user_icon/keranjang.png" height="20px"></button>

                                    @endguest
                                    {{-- <button class="btn btn-dark ms-2">Checkout</button> --}}
                                    {{-- <a type="button" class="btn btn-dark ms-2" href>CheckOut</a> --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
    </div>
    <div class="container mt-1">
        <div class="box rounded m-3 bg-muted shadow-lg p-3">
            <div class="m-3">
                <h3>Deskripsi:</h3>
                <p class="me-3" style="text-align: justify;">
                    {{ $barang->deskripsi_barang }}
                </p>
            </div>
        </div>
    </div>
    @endforeach

    {{-- <script>
        const counter = document.querySelector('#counter');
        let value = counter.value;

        function handleCounterMin() {
            if (counter.value <= 1) {
                counter.value = 1;
            } else {
                counter.value = counter.value - 1 ;
            }
        }
        function handleCounterPlus() {
           
                counter.value = (counter.value + 1) ;
        
        }


    </script> --}}
@endsection
