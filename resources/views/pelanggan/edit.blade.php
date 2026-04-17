@extends('layouts.admin')

@section('content')
<div class="bg-secondary rounded h-100 p-4">
    <h6 class="mb-4">Edit Data Pelanggan</h6>
    
    <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') {{-- PENTING: Untuk proses update --}}

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_pelanggan" class="form-control" value="{{ $pelanggan->nama_pelanggan }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $pelanggan->email }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Ganti Password (Kosongkan jika tidak ingin ganti)</label>
                    <input type="password" name="katakunci" class="form-control" placeholder="Masukkan password baru...">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nomor Telepon</label>
                    <input type="text" name="no_telp" class="form-control" value="{{ $pelanggan->no_telp }}" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Alamat Utama</label>
                    <textarea name="alamat1" class="form-control" rows="2" required>{{ $pelanggan->alamat1 }}</textarea>
                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                        <label class="form-label">Kota</label>
                        <input type="text" name="kota1" class="form-control" value="{{ $pelanggan->kota1 }}" required>
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label">Provinsi</label>
                        <input type="text" name="propinsi1" class="form-control" value="{{ $pelanggan->propinsi1 }}" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Update Foto Profil</label>
                    <input type="file" name="foto" class="form-control bg-dark">
                    @if($pelanggan->foto)
                        <small class="text-info">File saat ini: {{ $pelanggan->foto }}</small>
                    @endif
                </div>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Update Data Pelanggan</button>
            <a href="{{ route('pelanggan.index') }}" class="btn btn-outline-light ms-2">Batal</a>
        </div>
    </form>
</div>
@endsection