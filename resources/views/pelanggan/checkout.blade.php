@extends('layouts.fe')
@section('title', 'Checkout | ApotekKu')

@section('content')
<section class="section" style="margin-top: 80px; min-height: 80vh;">
    <div class="container py-5">
        <h2 class="fw-bold mb-4">Checkout Pesanan</h2>

        <form action="{{ route('pelanggan.proses_checkout') }}" method="POST">
            @csrf
            <div class="row g-4">
                <div class="col-lg-8">
                    <!-- Alamat Pengiriman -->
                    <div class="card shadow-sm border-0 p-4 mb-4">
                        <h5 class="fw-bold border-bottom pb-3 mb-3"><i class="fa-solid fa-location-dot text-danger me-2"></i> Alamat Pengiriman</h5>
                        <div class="mb-3">
                            <label class="form-label text-muted">Alamat Lengkap</label>
                            <textarea name="alamat_lengkap" class="form-control" rows="3" required placeholder="Tuliskan alamat lengkap pengiriman...">{{ Auth::guard('pelanggan')->user()->alamat1 }}</textarea>
                            <small class="text-muted">Pastikan alamat sesuai agar kurir mudah menemukan lokasi Anda.</small>
                        </div>
                    </div>

                    <!-- Pilihan Kurir & Pembayaran -->
                    <div class="card shadow-sm border-0 p-4 mb-4">
                        <h5 class="fw-bold border-bottom pb-3 mb-3"><i class="fa-solid fa-truck text-primary me-2"></i> Kurir & Pembayaran</h5>
                        
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label text-muted">Pilih Kurir / Jenis Pengiriman</label>
                                <select name="id_jenis_kirim" class="form-select" required>
                                    <option value="">-- Pilih Pengiriman --</option>
                                    @foreach($jenis_kirims as $kirim)
                                        <option value="{{ $kirim->id }}">{{ $kirim->nama_ekspedisi }} - {{ Str::title($kirim->jenis_kirim) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted">Pilih Metode Pembayaran</label>
                                <select name="id_metode_bayar" class="form-select" required>
                                    <option value="">-- Pilih Pembayaran --</option>
                                    @foreach($metode_bayars as $bayar)
                                        <option value="{{ $bayar->id }}">{{ $bayar->tempat_bayar }} - {{ $bayar->metode_pembayaran }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Upload Resep -->
                    <div class="card shadow-sm border-0 p-4">
                        <h5 class="fw-bold border-bottom pb-3 mb-3"><i class="fa-solid fa-file-prescription text-success me-2"></i> Resep Dokter (Opsional)</h5>
                        <p class="text-muted small">Jika pesanan Anda mengandung obat keras yang memerlukan resep dokter, silakan unggah foto resep di sini.</p>
                        <input type="file" name="url_resep" class="form-control">
                    </div>
                </div>

                <!-- Ringkasan Order -->
                <div class="col-lg-4">
                    <div class="card shadow-sm border-0 p-4 sticky-top" style="top: 100px;">
                        <h5 class="fw-bold border-bottom pb-3 mb-3">Ringkasan Pesanan</h5>
                        
                        <div class="mb-3">
                            @foreach($keranjangs as $item)
                                <div class="d-flex justify-content-between small mb-2">
                                    <span class="text-truncate pe-2">{{ $item->obat->nama_obat }} (x{{ $item->jumlah_order }})</span>
                                    <span>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</span>
                                </div>
                            @endforeach
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-2 small text-muted">
                            <span>Total Harga Barang</span>
                            <span>Rp {{ number_format($total_belanja, 0, ',', '.') }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2 small text-muted">
                            <span>Estimasi Ongkos Kirim</span>
                            <span>Rp 15.000</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3 small text-muted">
                            <span>Biaya Aplikasi</span>
                            <span>Rp 2.000</span>
                        </div>
                        <div class="d-flex justify-content-between mb-4 border-top pt-3">
                            <span class="fw-bold">Total Pembayaran</span>
                            <span class="fw-bold text-primary fs-5">Rp {{ number_format($total_belanja + 17000, 0, ',', '.') }}</span>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-3">
                            Buat Pesanan Sekarang
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
