@extends('index')
@section('container')
     <div class="container mt-5 mb-5">
        @foreach ($keranjang_acc as $item)
        <div class="box rounded m-3 bg-muted shadow-lg p-3 mt-3 mb-5">
            <div class=" d-flex ms-3 mt-3 me-3 mb-0">
                <p class="fw-bold me-5"> {{ $item->username }}<br>{{ $item->name }} <br>Tlpn: {{ $item->telepon }}</p>
                <p class="ms-5" style="text-align: justify;">
                Alamat : {{ $item->alamat }}
                </p>
            </div>  
            <hr> 
            <div class="ms-3 mt-3 me-3 mb-0">
                <table class="table">
                <thead>
                    <tr class="text-center">
                        <th width= "15%">Foto</th>
                        <th width= "15%">Produk</th>
                        <th width= "15%">Warna</th>
                        <th width= "15%">Size</th>
                        <th width= "10%">Jumlah</th>
                        <th width= "15%">Harga Satuan</th>
                        <th width= "15%">Harga Total</th>
                        
                    </tr>
                </thead>
                <tbody>
                    
                    <tr class="text-center">
                        <td><img src="{{ asset('storage/' . $item->foto_barang) }}" class="shadow p3" width="70px"></td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->warna }}</td>
                        <td>{{ $item->size }}</td>
                        <td>{{ $item->jumlah_barang }}</td>
                        <td>Rp. {{ $item->harga_satuan }}</td>
                        <td>Rp. {{$item->total_harga}}</td>
                    </tr>
                   
                </tbody>
                </table>  
            </div>

            <div class="d-flex justify-content-end me-3">
                <h4 class="fw-bold text-warning me-3">Rp. {{$item->total_harga}}</h4>
                <form action="/bayar/{{ $item->id_keranjang }}" method='post'>
                    @csrf
                    <input type='hidden' value="{{ $item->id_keranjang }}" name="idkeranjang">
                    <input type='hidden' value="{{ $item->id_user }}" name="iduser">
                    <input type='hidden' value="{{ $item->id_barang }}" name="idbarang">
                     <input type='hidden' value="{{ $item->jumlah_barang }}" name="jumlahpesan">
                 @endforeach
                      @foreach ($barangs as $it)
                         <input type='hidden' value="{{ $it->jumlah_barang }}" name="stok">
                     @endforeach
                <button class="btn btn-dark">Konfirmasi Pesanan</button>
                </form>
            </div>
            
        </div>
    </div>
@endsection