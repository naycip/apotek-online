@extends('layouts.admin')

@section('content')
<div class="bg-secondary rounded p-4">
    <h6 class="mb-4">Update Status Pesanan #{{ $penjualan->id }}</h6>
    <div class="row">
        <div class="col-md-6">
            <p><strong>Pelanggan:</strong> {{ $penjualan->pelanggan->nama_pelanggan ?? 'Umum' }}</p>
            <p><strong>Total Bayar:</strong> Rp {{ number_format($penjualan->total_bayar) }}</p>
        </div>
    </div>

    <form action="{{ route('penjualan.update', $penjualan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Status Pesanan</label>
            <select name="status_order" class="form-select bg-dark text-white">
                <option value="Menunggu Konfirmasi" {{ $penjualan->status_order == 'Menunggu Konfirmasi' ? 'selected' : '' }}>Menunggu Konfirmasi</option>
                <option value="Diproses" {{ $penjualan->status_order == 'Diproses' ? 'selected' : '' }}>Diproses (Approve)</option>
                <option value="Dibatalkan Penjual" {{ $penjualan->status_order == 'Dibatalkan Penjual' ? 'selected' : '' }}>Dibatalkan Penjual (Cancel)</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Metode Pembayaran</label>
            <select name="id_metode_bayar" class="form-select bg-dark text-white" required>
                <option value="" disabled {{ !$penjualan->id_metode_bayar ? 'selected' : '' }}>-- Pilih Metode Pembayaran --</option>
                @foreach($metodeBayars as $mb)
                    <option value="{{ $mb->id }}" {{ $penjualan->id_metode_bayar == $mb->id ? 'selected' : '' }}>
                        {{ $mb->metode_pembayaran }} - {{ $mb->tempat_bayar }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Keterangan (Contoh: No. Resi atau Alasan Batal)</label>
            <textarea name="keterangan_status" class="form-control" rows="3">{{ $penjualan->keterangan_status }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('penjualan.index') }}" class="btn btn-outline-light">Batal</a>
    </form>
</div>
@endsection