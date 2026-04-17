@extends('layouts.admin')

@section('content')
<div class="bg-secondary rounded p-4">
    <h6 class="mb-4">Tambah Ekspedisi Pengiriman</h6>
    <form action="{{ route('jenispengiriman.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Ekspedisi</label>
            <input type="text" name="nama_ekspedisi" class="form-control" placeholder="Contoh: JNE, J&T, SiCepat" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Jenis Layanan (Kategori)</label>
            <select name="jenis_kirim" class="form-select bg-dark text-white">
                <option value="ekonomi">Ekonomi</option>
                <option value="regular">Regular</option>
                <option value="kargo">Kargo</option>
                <option value="same_day">Same Day</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Link Logo Ekspedisi (Opsional)</label>
            <input type="text" name="logo_ekspedisi" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Ekspedisi</button>
    </form>
</div>
@endsection