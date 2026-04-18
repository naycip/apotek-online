<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portal Pelanggan | ApotekKu')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background: #f4f6f9;
            color: #333;
        }
        .navbar-custom {
            background-color: #007bff;
            padding: 1rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .navbar-brand {
            color: #fff !important;
            font-weight: bold;
            font-size: 1.25rem;
        }
        .navbar-brand i {
            color: #fff;
        }
        .nav-link {
            color: #fff !important;
        }
        .nav-link:hover, .nav-link.active {
            color: #f8f9fa !important;
            font-weight: bold;
        }
        .header-section {
            background-color: #007bff;
            padding: 2rem 0;
            color: white;
            margin-bottom: 2rem;
        }
        .content-card {
            background: white;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
        .btn-custom {
            background-color: #007bff;
            border: none;
            color: white;
            border-radius: 5px;
            padding: 0.5rem 1rem;
        }
        .btn-custom:hover {
            background-color: #0056b3;
            color: white;
        }
        .badge-cart {
            position: absolute;
            top: 0;
            right: -5px;
            background: #ff4757;
            font-size: 0.65rem;
            padding: 0.3em 0.5em;
        }
    </style>
    @yield('styles')
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fa-solid fa-pills me-2"></i>ApotekKu
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('pelanggan.dashboard') ? 'active' : '' }}" href="{{ route('pelanggan.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('pelanggan.katalog') ? 'active text-primary' : 'text-light' }}" href="{{ route('pelanggan.katalog') }}">Belanja Obat</a>
                    </li>
                    <li class="nav-item position-relative">
                        <a class="nav-link {{ request()->routeIs('pelanggan.keranjang') ? 'active' : '' }}" href="{{ route('pelanggan.keranjang') }}">
                            <i class="fa-solid fa-cart-shopping"></i> Keranjang
                            @php
                                $keranjang_count = \App\Models\Keranjang::where('id_pelanggan', Auth::guard('pelanggan')->id())->count();
                            @endphp
                            @if($keranjang_count > 0)
                                <span class="badge rounded-pill badge-cart">{{ $keranjang_count }}</span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('pelanggan.riwayat') ? 'active' : '' }}" href="{{ route('pelanggan.riwayat') }}">Riwayat</a>
                    </li>
                    <li class="nav-item ms-3">
                        <form action="{{ route('pelanggan.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm rounded-pill px-3">
                                <i class="fa-solid fa-arrow-right-from-bracket me-1"></i> Keluar
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const confirmElements = document.querySelectorAll('[onclick*="confirm"]');
            confirmElements.forEach(el => {
                const match = el.getAttribute('onclick').match(/confirm\(['"](.*?)['"]\)/);
                if (match) {
                    const message = match[1];
                    el.removeAttribute('onclick');
                    el.addEventListener('click', function(e) {
                        e.preventDefault();
                        Swal.fire({
                            title: 'Konfirmasi',
                            text: message,
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#4facfe',
                            cancelButtonColor: '#6c7293',
                            confirmButtonText: 'Ya, Lanjutkan',
                            cancelButtonText: 'Batal',
                            background: '#fff',
                            color: '#333'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                if (el.tagName.toLowerCase() === 'button' && el.type === 'submit' && el.closest('form')) {
                                    el.closest('form').submit();
                                } else if (el.tagName.toLowerCase() === 'a') {
                                    window.location.href = el.href;
                                } else {
                                    if(el.closest('form')) el.closest('form').submit();
                                }
                            }
                        })
                    });
                }
            });
        });
    </script>

    @if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                icon: 'success',
                background: '#fff',
                color: '#333',
                confirmButtonColor: '#4facfe',
                timer: 3000,
                timerProgressBar: true
            });
        });
    </script>
    @endif

    @if(session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                title: 'Gagal!',
                text: "{{ session('error') }}",
                icon: 'error',
                background: '#fff',
                color: '#333',
                confirmButtonColor: '#4facfe',
            });
        });
    </script>
    @endif

    @yield('scripts')
</body>
</html>
