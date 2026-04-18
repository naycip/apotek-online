@extends('layouts.pelanggan')
@section('title', 'Dashboard Pelanggan | ApotekKu')

@section('content')
<div class="header-section">
    <div class="container text-center">
        <h1 class="display-5 fw-bold mb-3">Selamat Datang, {{ Auth::guard('pelanggan')->user()->nama_pelanggan }}!</h1>
        <p class="lead" style="opacity: 0.9;">Kelola pesanan, riwayat belanja, dan profil kesehatan Anda di sini.</p>
    </div>
</div>

<div class="container mb-5">
    <div class="row g-4">
        <!-- Profil Singkat -->
        <div class="col-lg-4">
            <div class="content-card text-center h-100">
                <div class="mx-auto mb-3" style="width: 80px; height: 80px; background: linear-gradient(45deg, #4facfe, #00f2fe); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2.5rem; color: white;">
                    <i class="fa-solid fa-user"></i>
                </div>
                <h4 class="mb-1">{{ Auth::guard('pelanggan')->user()->nama_pelanggan }}</h4>
                <p class="text-muted mb-4">{{ Auth::guard('pelanggan')->user()->email }}</p>
                
                <div class="d-flex justify-content-between text-start mb-3 border-bottom pb-2">
                    <span class="text-muted">No. Telepon</span>
                    <span class="fw-semibold">{{ Auth::guard('pelanggan')->user()->no_telp }}</span>
                </div>
                <div class="d-flex justify-content-between text-start mb-4">
                    <span class="text-muted">Bergabung</span>
                    <span class="fw-semibold">{{ Auth::guard('pelanggan')->user()->created_at->format('d M Y') }}</span>
                </div>

                <a href="{{ route('pelanggan.profil.edit') }}" class="btn btn-custom w-100"><i class="fa-solid fa-pen-to-square me-2"></i>Edit Profil</a>
            </div>
        </div>

        <!-- Stats & Informasi -->
        <div class="col-lg-8">
            <div class="row g-4 mb-4">
                <div class="col-md-4">
                    <div class="content-card mb-0 h-100 p-3" style="display: flex; align-items: center; gap: 1rem;">
                        <div style="width: 50px; height: 50px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; background: rgba(79, 172, 254, 0.1); color: #4facfe;">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </div>
                        <div>
                            <h3 class="mb-0 fw-bold">{{ $pesanan_aktif ?? 0 }}</h3>
                            <span class="text-muted small">Pesanan Aktif</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="content-card mb-0 h-100 p-3" style="display: flex; align-items: center; gap: 1rem;">
                        <div style="width: 50px; height: 50px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; background: rgba(40, 167, 69, 0.1); color: #28a745;">
                            <i class="fa-solid fa-box-open"></i>
                        </div>
                        <div>
                            <h3 class="mb-0 fw-bold">{{ $riwayat_belanja ?? 0 }}</h3>
                            <span class="text-muted small">Riwayat Belanja</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="content-card mb-0 h-100 p-3" style="display: flex; align-items: center; gap: 1rem;">
                        <div style="width: 50px; height: 50px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; background: rgba(253, 126, 20, 0.1); color: #fd7e14;">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </div>
                        <div>
                            <h3 class="mb-0 fw-bold">{{ $isi_keranjang ?? 0 }}</h3>
                            <span class="text-muted small">Isi Keranjang</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section Alamat -->
            <div class="content-card p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-bold mb-0"><i class="fa-solid fa-map-location-dot text-primary me-2"></i>Daftar Alamat Pengiriman</h5>
                    <a href="{{ route('pelanggan.profil.edit') }}" class="btn btn-sm btn-outline-secondary rounded-pill px-3">Kelola Alamat</a>
                </div>
                
                <div class="row g-3">
                    @if(Auth::guard('pelanggan')->user()->alamat1)
                        <div class="col-md-12">
                            <div class="p-3 bg-light rounded-3 border position-relative">
                                <span class="badge bg-danger position-absolute top-0 end-0 m-2">Utama</span>
                                <strong>{{ Auth::guard('pelanggan')->user()->nama_pelanggan }}</strong><br>
                                {{ Auth::guard('pelanggan')->user()->no_telp }}<br>
                                {{ Auth::guard('pelanggan')->user()->alamat1 }}<br>
                                {{ Auth::guard('pelanggan')->user()->kota1 }}, {{ Auth::guard('pelanggan')->user()->propinsi1 }} {{ Auth::guard('pelanggan')->user()->kodepos1 }}
                            </div>
                        </div>
                    @else
                        <div class="col-md-12">
                            <div class="text-center p-4 bg-light rounded-3 border">
                                <i class="fa-solid fa-map-location-dot fs-1 text-muted mb-3"></i>
                                <h6>Belum ada alamat pengiriman</h6>
                                <p class="text-muted small">Tambahkan alamat untuk mempermudah proses checkout pesanan Anda.</p>
                                <a href="{{ route('pelanggan.profil.edit') }}" class="btn btn-sm btn-custom mt-2">Tambah Alamat</a>
                            </div>
                        </div>
                    @endif

                    @if(Auth::guard('pelanggan')->user()->alamat2)
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-3 border position-relative h-100">
                                <span class="badge bg-secondary position-absolute top-0 end-0 m-2">Tambahan 1</span>
                                <strong>{{ Auth::guard('pelanggan')->user()->nama_pelanggan }}</strong><br>
                                {{ Auth::guard('pelanggan')->user()->no_telp }}<br>
                                {{ Auth::guard('pelanggan')->user()->alamat2 }}<br>
                                {{ Auth::guard('pelanggan')->user()->kota2 }}, {{ Auth::guard('pelanggan')->user()->propinsi2 }} {{ Auth::guard('pelanggan')->user()->kodepos2 }}
                                <div class="mt-3 text-end">
                                    <form action="{{ route('pelanggan.alamat.hapus', 2) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger border-0" onclick="return confirm('Hapus alamat tambahan 1?')"><i class="fa-solid fa-trash me-1"></i>Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if(Auth::guard('pelanggan')->user()->alamat3)
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-3 border position-relative h-100">
                                <span class="badge bg-secondary position-absolute top-0 end-0 m-2">Tambahan 2</span>
                                <strong>{{ Auth::guard('pelanggan')->user()->nama_pelanggan }}</strong><br>
                                {{ Auth::guard('pelanggan')->user()->no_telp }}<br>
                                {{ Auth::guard('pelanggan')->user()->alamat3 }}<br>
                                {{ Auth::guard('pelanggan')->user()->kota3 }}, {{ Auth::guard('pelanggan')->user()->propinsi3 }} {{ Auth::guard('pelanggan')->user()->kodepos3 }}
                                <div class="mt-3 text-end">
                                    <form action="{{ route('pelanggan.alamat.hapus', 3) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger border-0" onclick="return confirm('Hapus alamat tambahan 2?')"><i class="fa-solid fa-trash me-1"></i>Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
