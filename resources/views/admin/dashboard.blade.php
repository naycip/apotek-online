@extends('layouts.admin')

@section('content')
<div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
            <i class="fa fa-users fa-3x text-primary"></i>
            <div class="ms-3">
                <p class="mb-2">Total User</p>
                <h6 class="mb-0">{{ $total_user }}</h6>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
            <i class="fa fa-medkit fa-3x text-primary"></i>
            <div class="ms-3">
                <p class="mb-2">Total Obat</p>
                <h6 class="mb-0">{{ $total_obat }}</h6>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
            <i class="fa fa-shopping-cart fa-3x text-primary"></i>
            <div class="ms-3">
                <p class="mb-2">Total Penjualan</p>
                <h6 class="mb-0">{{ $total_penjualan }}</h6>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
            <i class="fa fa-chart-line fa-3x text-primary"></i>
            <div class="ms-3">
                <p class="mb-2">Total Pendapatan</p>
                <h6 class="mb-0">Rp {{ number_format($pendapatan, 0, ',', '.') }}</h6>
            </div>
        </div>
    </div>
</div>

<div class="bg-secondary text-center rounded p-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0">Penjualan Terbaru</h6>
        <a href="{{ route('penjualan.index') }}">Lihat Semua</a>
    </div>
    <div class="table-responsive">
        <table class="table text-start align-middle table-bordered table-hover mb-0 text-white">
            <thead>
                <tr>
                    <th>Tgl Penjualan</th>
                    <th>Pelanggan</th>
                    <th>Total Bayar</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($penjualan_terbaru as $p)
                <tr>
                    <td>{{ $p->tgl_penjualan }}</td>
                    <td>{{ $p->pelanggan->nama_pelanggan ?? 'Umum' }}</td>
                    <td>Rp {{ number_format($p->total_bayar, 0, ',', '.') }}</td>
                    <td><span class="badge bg-primary">{{ $p->status_order }}</span></td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada data penjualan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
