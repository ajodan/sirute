
    <!-- Navbar & Hero Start -->
    
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <div class="container-fluid position-relative p-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="m-0"><i class="fa fa-map-marker-alt me-3"></i>RW 13</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="{{ route('user.home') }}" class="nav-item nav-link active">Beranda</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Tentang Kami</a>
                            <div class="dropdown-menu m-0">
                                <a href="{{ route('user.tugasdanfungsi') }}" class="dropdown-item">Tugas dan Fungsi</a>
                                <a href="{{ route('user.strukturorganisasi') }}" class="dropdown-item">Struktur Organisasi</a>
                            </div>
                        </div>
                        <a href="{{ route('user.berita') }}" class="nav-item nav-link">Artikel</a>
                       <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Statistik</a>
                            <div class="dropdown-menu m-0">
                                <a href="#" class="dropdown-item"></a>
                                <a href="{{ route('user.penduduk') }}" class="dropdown-item">Kartu Keluarga</a>
                            </div>
                        </div>
                        <a href="{{ route('user.umkm') }}" class="nav-item nav-link">UKM</a>
                        <a href="{{ route('user.inventaris') }}" class="nav-item nav-link">Inventaris</a>
                        <a href="{{ route('user.agenda') }}" class="nav-item nav-link">Agenda</a>
                        <a href="{{ route('user.aspirasi') }}" class="nav-item nav-link">Aspirasi</a>
                    </div>
                    @guest
                    <a href="{{ route('login') }}" class="btn btn-primary rounded-pill py-2 px-4 ms-lg-4">Masuk</a>
                    @endguest
                    @auth
                    <div class="col-lg-4 text-center text-lg-end">
                    <div class="d-inline-flex align-items-center" style="height: 45px;">
                        {{-- <a href="{{ route('logout') }}"><small class="me-3 text-light"><i class="fa fa-sign-in-alt me-2"></i>Keluar</small></a> --}}
                        <a href=""><small class="me-3 text-black"><i class="fa fa-user me-2"></i>{{ $username}}</small></a>
                        <div class="dropdown">
                            <img src="{{ auth()->user()->penduduk->foto_profile() }}" class="rounded-circle" alt="User" style="width: 40px; height: 40px;">
                            <a href="#" class="dropdown-toggle text-black" data-bs-toggle="dropdown"><small><i class="fa fa-home me-2"></i> Dasbor-Ku</small></a>
                            <div class="dropdown-menu rounded" style="width: 200px;" {{ auth()->user()->level->nama_level == 'Penduduk' ? '' : '' }}>
                                <a href="{{ route('admin.dashboard') }}" class="dropdown-item"><i class="fas fa-user-alt me-2"></i> Intra RW13</a>
                                <a href="{{ route('admin.penduduk.akun.ganti_password', $nik) }}" class="dropdown-item"><i class="fas fa-user-alt me-2"></i> Ganti Password</a>
                                <a href="{{ route('user.profile') }}" class="dropdown-item"><i class="fas fa-user me-2"></i> Profil Saya</a>
                                <a href="{{ route('user.berita.dashboard') }}" class="dropdown-item"><i class="fas fa-newspaper me-2"></i> Artikel</a>
                                <a href="{{ route('user.umkm.dashboard') }}" class="dropdown-item"><i class="fas fa-shopping-cart me-2"></i> UKM</a>

                                <a href="{{ route('user.aspirasi.riwayataspirasi') }}" class="dropdown-item"><i class="fas fa-comments me-2"></i> Aspirasi</a>
                                <a href="{{ route('user.inventaris.riwayatinventaris') }}" class="dropdown-item"><i class="fas fa-people-carry me-2"></i> Inventaris</a>
                                {{-- <a href="{{ route('logout') }}" class="dropdown-item"><i class="fas fa-power-off me-2"></i> Keluar</a> --}}
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    @method('post')
                                    <button type="submit" class="btn btn-link text-decoration-none"><i class="fas fa-power-off me-2"></i> Keluar</button>
                                </form>

                            </div>
                        </div>
                    </div>
                    @endauth
                </div>
        </div>
    </nav>

            