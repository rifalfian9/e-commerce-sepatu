<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <a class="navbar-brand fw-bolder" href="/index">SHOESHOP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="/index">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="/belanja" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Belanja
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/belanja/populer">Populer</a></li>
                        <li><a class="dropdown-item" href="/belanja/terbaru">Terbaru</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="/belanja">Semua Item</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/transaksi">Transaksi</a>
                </li>
                <li class="nav-item ms-3">
                    <a class="btn btn-outline-dark" href="/keranjang">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                    </a>

                </li>

            </ul>
        </div>
        @guest
            <div>
                <a class="btn btn-outline-success ms-1 shadow-lg" type="button" aria-expanded="false" href="/">
                    Login
                </a>
            </div>
            <div>
                <a class="btn btn-outline-success ms-1 shadow-lg" type="button" aria-expanded="false" href="/daftar">
                    Daftar
                </a>
            </div>
        @else
            <div class="dropdown ">
                <a class="nav-link dropdown-toggle ms-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="text-dark ms-1"><img class=""
                            @if (empty(Auth::user()->foto_user)) src="/user_icon/loginuser/us.png" 
                        @else
                        src="{{ asset('storage/' . Auth::user()->foto_user) }}" @endif
                            class="ms-2" width="25px"> {{ auth::user()->username}}</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/setting">Setting</a></li>
                    <li>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </div>
        @endguest


    </div>
</nav>
