@extends('layouts.admin')

@section('content')
<div class="bg-secondary rounded h-100 p-4">
    <h6 class="mb-4">Tambah Pembelian Stok (Ke Distributor)</h6>
    
    <form action="{{ route('pembelian.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Nomor Nota</label>
                    <input type="text" name="nonota" class="form-control" placeholder="Contoh: INV-2024-001" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Pembelian</label>
                    <input type="date" name="tgl_pembelian" class="form-control" value="{{ date('Y-m-d') }}" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Pilih Distributor</label>
                    <select name="id_distributor" class="form-select bg-dark text-white" required>
                        <option value="">-- Pilih Distributor --</option>
                        @foreach($distributors as $d)
                            <option value="{{ $d->id }}">{{ $d->nama_distributor }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Total Bayar (Rp)</label>
                    <input type="number" name="total_bayar" class="form-control" placeholder="0" required>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
            <a href="{{ route('pembelian.index') }}" class="btn btn-outline-light ms-2">Batal</a>
        </div>
    </form>
</div>
@endsection