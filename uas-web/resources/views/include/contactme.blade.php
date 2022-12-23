@extends('index')
@section('container')
     <div class="container mt-5 mb-5">
        <div class="box rounded m-3 bg-muted shadow-lg p-3 mt-3 mb-5">
           <div class="m-3">
            <div class="m-2">
                <h2 class="mb-2">Hubungi Kami</h2>
                
            </div>
            <div class="m-2">
                <form>
                    <div class="row">
                        <div class="col-7">
                            <div class="mt-4">
                                <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                </div>
                                <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="Name">
                                </div>
                                <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Pesan</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                         <div class="mt-4 d-flex justify-content-start">
                                            <a type="btn btn-outline-primary" class="pt-1" href="/setting"> Kembali </a>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                         <div class="mt-4 d-flex justify-content-end">
                                            <a type="submit" class="btn btn-primary d-flex justify-content-end" href="/hubungikami" >Kirim</a>
                                        </div>
                                    </div>
                                </div>

                               
                                
                               
                                
                            </div>
                        </div>

                        <div class="col-5">
                            <div class="mt-3 ms-5">
                                <div class="mb-2">
                                    <h5 class="fst-italic">Social Media</h5>
                                </div>
                                <div class="d-block p-1">
                                    <a class="text-decoration-none d-block p-1" href=""><label for=""><img src="/user_icon/loginuser/wa-logo.png" width="25px" class="ps-1"> WhatsApp</label></a>
                                    <a class="text-decoration-none d-block p-1" href=""><label for=""><img src="/user_icon/loginuser/ig-logo.png" width="25px" class="ps-1"> Instagram</label></a>
                                    <a class="text-decoration-none d-block p-1" href=""><label for=""><img src="/user_icon/loginuser/youtube-logo.png" width="25px" class="ps-1"> YouTube</label></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
           </div>
        </div>
    </div> 
@endsection