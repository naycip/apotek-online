@extends('layouts.fe')
@section('title', 'Riwayat Belanja | ApotekKu')

@section('content')
<section class="section" style="margin-top: 80px; min-height: 80vh;">
    <div class="container py-5">
        <h2 class="fw-bold mb-4">Riwayat Belanja</h2>

        <div class="row g-4">
            <div class="col-12">
                @forelse($penjualans as $penjualan)
                    <div class="card shadow-sm border-0 p-4 mb-4">
                        <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
                            <div>
                                <span class="text-muted small"><i class="fa-solid fa-calendar-day me-1"></i> {{ \Carbon\Carbon::parse($penjualan->tgl_penjualan)->format('d M Y') }}</span>
                                <span class="mx-2 text-muted">|</span>
                                <span class="fw-bold text-primary">INV-{{ $penjualan->id }}</span>
                            </div>
                            <div>
                                @if($penjualan->status_order == 'Selesai')
                                    <span class="badge bg-success px-3 py-2 rounded-pill"><i class="fa-solid fa-check-circle me-1"></i> Selesai</span>
                                @elseif(in_array($penjualan->status_order, ['Dibatalkan Pembeli', 'Dibatalkan Penjual', 'Bermasalah']))
                                    <span class="badge bg-danger px-3 py-2 rounded-pill"><i class="fa-solid fa-xmark-circle me-1"></i> {{ $penjualan->status_order }}</span>
                                @else
                                    <span class="badge bg-warning text-dark px-3 py-2 rounded-pill"><i class="fa-solid fa-clock me-1"></i> {{ $penjualan->status_order }}</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <p class="mb-1 text-muted small">Metode Pembayaran: <span class="fw-semibold text-dark">{{ $penjualan->metodeBayar->metode_pembayaran ?? '-' }} ({{ $penjualan->metodeBayar->tempat_bayar ?? '-' }})</span></p>
                                <p class="mb-1 text-muted small">Jenis Pengiriman: <span class="fw-semibold text-dark">{{ $penjualan->jenisKirim->nama_ekspedisi ?? '-' }} - {{ Str::title($penjualan->jenisKirim->jenis_kirim ?? '-') }}</span></p>
                                <p class="mb-0 text-muted small">Status/Keterangan: <span class="text-dark">{{ $penjualan->keterangan_status ?? 'Tidak ada catatan' }}</span></p>
                            </div>
                            <div class="col-md-4 text-md-end mt-3 mt-md-0 border-md-start">
                                <p class="text-muted small mb-1">Total Belanja</p>
                                <h4 class="fw-bold text-primary mb-3">Rp {{ number_format($penjualan->total_bayar, 0, ',', '.') }}</h4>
                                <button class="btn btn-sm btn-outline-primary px-3 rounded-pill">Detail Invoice</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="card shadow-sm border-0 text-center py-5">
                        <i class="fa-solid fa-box-open text-muted mb-3" style="font-size: 4rem;"></i>
                        <h4 class="text-muted">Belum ada riwayat belanja</h4>
                        <a href="{{ route('pelanggan.katalog') }}" class="btn btn-primary mt-3">Mulai Belanja</a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>
@endsection
