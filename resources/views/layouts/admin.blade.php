<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin - Apotek Online</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="{{ asset('assets/be/img/favicon.ico') }}" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('assets/be/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/be/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="{{ route('be.admin') }}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Admin</h3>
                </a>
                <div class="navbar-nav w-100">
                    {{-- SEMUA ROLE: Bisa lihat Dashboard --}}
                    <a href="{{ route('be.admin') }}" class="nav-item nav-link {{ request()->is('admin') ? 'active' : '' }}">
                        <i class="fa fa-tachometer-alt me-2"></i>Dashboard
                    </a>

                    {{-- KHUSUS ADMIN: Kelola User --}}
                    @if(auth()->user()->jabatan == 'admin')
                    <a href="{{ route('user.index') }}" class="nav-item nav-link {{ request()->is('user*') ? 'active' : '' }}">
                        <i class="fa fa-users me-2"></i>User
                    </a>
                    @endif

                    {{-- KHUSUS APOTEKER / KARYAWAN: Input Data Obat --}}
                    @if(in_array(auth()->user()->jabatan, ['apoteker', 'karyawan', 'admin']))
                    <a href="{{ route('obat.index') }}" class="nav-item nav-link {{ request()->is('obat*') ? 'active' : '' }}">
                        <i class="fa fa-medkit me-2"></i>Obat
                    </a>
                    <a href="{{ route('jenisobat.index') }}" class="nav-item nav-link {{ request()->is('jenisobat*') ? 'active' : '' }}">
                        <i class="fa fa-th me-2"></i>Jenis Obat
                    </a>
                    <a href="{{ route('distributor.index') }}" class="nav-item nav-link {{ request()->is('distributor*') ? 'active' : '' }}">
                        <i class="fa fa-truck me-2"></i>Distributor
                    </a>
                    @endif

                    {{-- KHUSUS KASIR, PEMILIK, ADMIN: Penjualan --}}
                    @if(in_array(auth()->user()->jabatan, ['kasir', 'pemilik', 'admin']))
                    <a href="{{ route('penjualan.index') }}" class="nav-item nav-link {{ request()->is('penjualan*') ? 'active' : '' }}">
                        <i class="fa fa-shopping-cart me-2"></i>Laporan Jual
                    </a>
                    <a href="{{ route('pelanggan.index') }}" class="nav-item nav-link {{ request()->is('pelanggan*') ? 'active' : '' }}">
                        <i class="fa fa-user-friends me-2"></i>Pelanggan
                    </a>
                    @endif

                    {{-- KHUSUS KASIR, PEMILIK, ADMIN: Metode Bayar --}}
                    @if(in_array(auth()->user()->jabatan, ['kasir', 'pemilik', 'admin']))
                    <a href="{{ route('metodebayar.index') }}" class="nav-item nav-link {{ request()->is('metodebayar*') ? 'active' : '' }}">
                        <i class="fa fa-credit-card me-2"></i>Metode Bayar
                    </a>
                    @endif

                    {{-- KHUSUS PEMILIK: Laporan & Dashboard Utama --}}
                    @if(auth()->user()->jabatan == 'pemilik' || auth()->user()->jabatan == 'admin')
                    <a href="{{ route('pembelian.index') }}" class="nav-item nav-link {{ request()->is('pembelian*') ? 'active' : '' }}">
                        <i class="fa fa-cash-register me-2"></i>Laporan Beli
                    </a>
                    <a href="{{ route('jenispengiriman.index') }}" class="nav-item nav-link {{ request()->is('jenispengiriman*') ? 'active' : '' }}">
                        <i class="fa fa-truck me-2"></i>Jenis Kirim
                    </a>
                    @endif

                    {{-- LOGOUT --}}
                    <form action="{{ route('logout') }}" method="POST" class="nav-item nav-link">
                        @csrf
                        <button type="submit" class="btn text-white p-0"><i class="fa fa-sign-out-alt me-2"></i>Logout</button>
                    </form>
                </div>
            </nav>
        </div>
        <div class="content">
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
            </nav>
            <div class="container-fluid pt-4 px-4">
                @yield('content')
            </div>
            </div>
        </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/be/js/main.js') }}"></script>
</body>

</html>