@extends('index')
@section('container')
    <div class="container mt-3 mb-2">
        <div class="row">
            <div class="col-3  mt-2  ">
                <div class="bg-light rounded pb-5">
                    <div class="ps-2 pt-2 pb-5">
                        <div class="mt-3 ms-3">
                            <a href="/profile" class="text-decoration-none text-dark pt-3 fs-6 fw-bold"><img class="me-2"
                                   @if (empty(Auth::user()->foto_user)) src="/user_icon/loginuser/us.png"  @else
                             src="{{ asset('storage/' . Auth::user()->foto_user) }}" @endif class="ms-1" width="25px">{{Auth::user()->username}}</a>
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
                <div style="margin-left: 2px;">
                    <div class="text rounded" style="background-color: rgba(156, 156, 156, 0.162)">
                        <div class="pt-3 ps-1 text-center pb-1">
                            <h5 class="ps-1">Setting</h5>
                        </div>
                    </div>
                    {{-- hdjhdjnjkdnk --}}
                    <div class="bg-light mt-2 ">
                        <div class="pt-3 ps-3 pe-3 pb-2 ">
                            <div class="">
                                <div class="ms-3 mt-3 me-3 mb-5">
                                    <table class="table">
                                        <tbody class="mb-1">
                                            <tr class="menu">
                                                <td><a href="/setting/profile"
                                                        class="text-decoration-none text-dark fw-bold">Profile</a></td>
                                            </tr>
                                            <tr class="menu">
                                                <td><a href="/transaksi"
                                                        class="text-decoration-none text-dark fw-bold">Riwayat Transaksi</a>
                                                </td>
                                            </tr>
                                            <tr class="menu">
                                                <td><a href="/setting/tentangkami"
                                                        class="text-decoration-none text-dark fw-bold">Tentang Kami</a></td>
                                            </tr>
                                            <tr class="menu">
                                                <td><a href="/setting/hubungikami"
                                                        class="text-decoration-none text-dark fw-bold">Hubungi Kami</a></td>
                                            </tr>
                                            <tr class="menu">
                                                <td><a class="text-decoration-none text-dark fw-bold"
                                                        href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>

                                                </td>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>


                            </div>

                        </div>
                    </div>
                    {{-- hdjhdjnjkdnk --}}





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
@endsection
