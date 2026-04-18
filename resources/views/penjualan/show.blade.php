@extends('layouts.admin')

@section('content')
<div class="bg-secondary rounded p-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0">Detail Transaksi Penjualan #{{ $penjualan->id }}</h6>
        <a href="{{ route('penjualan.index') }}" class="btn btn-outline-light">Kembali</a>
    </div>

    <div class="row mb-4">
        <div class="col-sm-6">
            <div class="card bg-dark text-white border-0">
                <div class="card-body">
                    <h6 class="card-title text-primary">Informasi Pelanggan</h6>
                    <p class="mb-1"><strong>Nama:</strong> {{ $penjualan->pelanggan->nama_pelanggan ?? 'Pelanggan Umum' }}</p>
                    <p class="mb-1"><strong>No. Telp:</strong> {{ $penjualan->pelanggan->no_telp ?? '-' }}</p>
                    <p class="mb-0"><strong>Alamat:</strong> {{ $penjualan->pelanggan->alamat1 ?? '-' }}</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card bg-dark text-white border-0">
                <div class="card-body">
                    <h6 class="card-title text-primary">Informasi Pesanan</h6>
                    <p class="mb-1"><strong>Tanggal:</strong> {{ date('d F Y H:i', strtotime($penjualan->tgl_penjualan)) }}</p>
                    <p class="mb-1"><strong>Metode Bayar:</strong> {{ $penjualan->metodeBayar->metode_pembayaran ?? '-' }}</p>
                    <p class="mb-1"><strong>Jenis Kirim:</strong> {{ $penjualan->jenisKirim->jenis_pengiriman ?? '-' }}</p>
                    <p class="mb-0">
                        <strong>Status:</strong> 
                        <span class="badge bg-{{ $penjualan->status_order == 'Selesai' ? 'success' : 'warning' }}">
                            {{ $penjualan->status_order }}
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    @if($penjualan->url_resep)
    <div class="mb-4">
        <h6 class="text-primary">Resep Dokter</h6>
        <img src="{{ asset('storage/resep/' . $penjualan->url_resep) }}" alt="Resep" style="max-width: 100%; border-radius: 5px;">
    </div>
    @endif

    <div class="table-responsive">
        <table class="table text-start align-middle table-bordered table-hover mb-0 text-white">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Obat</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($penjualan->detailPenjualans as $key => $detail)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $detail->obat->nama_obat ?? 'Obat tidak ditemukan' }}</td>
                    <td>Rp {{ number_format($detail->harga_beli, 0, ',', '.') }}</td>
                    <td>{{ $detail->jumlah_beli }}</td>
                    <td>Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4" class="text-end">Total Harga Obat</th>
                    <th>Rp {{ number_format($penjualan->detailPenjualans->sum('subtotal'), 0, ',', '.') }}</th>
                </tr>
                <tr>
                    <th colspan="4" class="text-end">Ongkos Kirim</th>
                    <th>Rp {{ number_format($penjualan->ongkos_kirim, 0, ',', '.') }}</th>
                </tr>
                <tr>
                    <th colspan="4" class="text-end">Biaya Aplikasi</th>
                    <th>Rp {{ number_format($penjualan->biaya_app, 0, ',', '.') }}</th>
                </tr>
                <tr>
                    <th colspan="4" class="text-end text-primary">TOTAL BAYAR</th>
                    <th class="text-primary">Rp {{ number_format($penjualan->total_bayar, 0, ',', '.') }}</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection
