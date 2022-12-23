@extends('index')
@section('container')

<div class="container">
    <section class="pt-3">
            <div class=" px-4 px-lg-5 mt-1">
                <div class="mb-3">
                    <form class="d-flex" role="search" action="/belanja/search" method="GET">
                        @csrf
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                    <input class="btn btn-outline-success" type="submit" value="Search">
                    </form>
                </div>
                <div class="mt-2 mb-4">
                
            <form action="/belanja/filter" method="get">
                @csrf
                <div class="btn-group">
                     <div style="width:120px;" class=" d-flex ">
                        <select class="form-control bg-outline-primary" name="kategori">
                        <option value="0" class="text-center">Kategori</option>
                        @foreach ($kategori as $kate)  
                        <option value="{{ $kate->nama_kategori_barang }}"class="text-center" > {{ $kate->nama_kategori_barang }} </option>
                        @endforeach
                        </select>
                    </div>
                    <div style="width:60px;" class="ms-2 d-flex ">
                        <select class="form-control bg-outline-primary" name="size">
                        <option value="0" class="text-center">Size</option>
                        @foreach ($Size as $size)  
                        <option value="{{ $size->size }}" class="text-center">{{ $size->size }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div style="width:100px;" class=" ms-2 d-flex ">
                        <select class="form-control bg-outline-primary" name="warna">
                        <option value="0" class="text-center">Warna</option>
                        @foreach ($Warna as $warna)  
                        <option value="{{ $warna->warna }}" class="text-center">{{ $warna->warna }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="ms-3">
                        <input class="btn btn-primary" type="submit" value="Filter">
                    </div>
                </form>
                </div>




                </div>

                

           
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    {{--  --}}
                    
                    {{--  --}}
                    @foreach ($barang as $brg)
                        <div class="col mb-5"><a href="/item/{{ $brg->id_barang }}" class="text-decoration-none">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="{{ asset('storage/' . $brg->foto_barang) }}" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $brg->nama_barang }}</h5>
                                    <!-- Product price-->
                                    <span class="text-muted ">Rp. {{ $brg->harga_satuan }}</span>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="/item/{{ $brg->id_barang }}">Pilih</a></div>
                            </div>
                        </div></a>
                    </div>
                    @endforeach
                    
                </div>
            </div>
    </div>
     </div>
        </section>
    
@endsection