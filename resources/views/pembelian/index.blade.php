@extends('layouts.admin')

@section('content')
<div class="bg-secondary rounded p-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0">Daftar Pembelian (Stok Masuk)</h6>
        <a href="{{ route('pembelian.create') }}" class="btn btn-primary">Tambah Pembelian Baru</a>
    </div>

    <div class="table-responsive">
        <table class="table text-start align-middle table-bordered table-hover mb-0 text-white">
            <thead>
                <tr class="text-white">
                    <th width="50">No</th>
                    <th>No. Nota</th>
                    <th>Tanggal Pembelian</th>
                    <th>Distributor</th>
                    <th>Total Bayar</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pembelians as $key => $p)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $p->nonota }}</td>
                    <td>{{ \Carbon\Carbon::parse($p->tgl_pembelian)->format('d M Y') }}</td>
                    <td>{{ $p->distributor->nama_distributor ?? 'N/A' }}</td>
                    <td>Rp {{ number_format($p->total_bayar, 0, ',', '.') }}</td>
                    <td>
                        <a class="btn btn-sm btn-warning" href="{{ route('pembelian.edit', $p->id) }}">Edit</a>
                        <form action="{{ route('pembelian.destroy', $p->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-primary" onclick="return confirm('Hapus data pembelian ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada data pembelian.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection