@extends('layouts.admin')

@section('content')
<div class="bg-secondary rounded p-4">
    <h6 class="mb-4">Daftar Transaksi Penjualan</h6>
    <div class="table-responsive">
        <table class="table text-start align-middle table-bordered table-hover mb-0 text-white">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th>Total Bayar</th>
                    <th>Metode</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($penjualans as $p)
                <tr>
                    <td>{{ $p->tgl_penjualan }}</td>
                    <td>{{ $p->pelanggan->nama_pelanggan ?? 'Umum' }}</td>
                    <td>Rp {{ number_format($p->total_bayar) }}</td>
                    <td>{{ $p->metodeBayar->metode_pembayaran ?? '-' }}</td>
                    <td>
                        <span class="badge bg-{{ $p->status_order == 'Selesai' ? 'success' : 'warning' }}">
                            {{ $p->status_order }}
                        </span>
                    </td>
                    <td>
                        <a class="btn btn-sm btn-info" href="{{ route('penjualan.show', $p->id) }}">Detail</a>
                        @if(auth()->user()->jabatan == 'kasir' || auth()->user()->jabatan == 'admin')
                        <a class="btn btn-sm btn-warning" href="{{ route('penjualan.edit', $p->id) }}">Update Status</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection