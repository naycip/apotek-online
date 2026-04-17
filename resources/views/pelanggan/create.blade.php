@extends('layouts.admin')

@section('content')
<div class="bg-secondary rounded h-100 p-4">
    <h6 class="mb-4">Tambah Pelanggan Baru</h6>
    <form action="{{ route('pelanggan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_pelanggan" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password (Kata Kunci)</label>
                    <input type="password" name="katakunci" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nomor Telepon</label>
                    <input type="text" name="no_telp" class="form-control" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Alamat Utama</label>
                    <textarea name="alamat1" class="form-control" rows="2" required></textarea>
                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                        <label class="form-label">Kota</label>
                        <input type="text" name="kota1" class="form-control" required>
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label">Provinsi</label>
                        <input type="text" name="propinsi1" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Foto Profil</label>
                    <input type="file" name="foto" class="form-control bg-dark">
                </div>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Simpan Pelanggan</button>
            <a href="{{ route('pelanggan.index') }}" class="btn btn-outline-light ms-2">Batal</a>
        </div>
    </form>
</div>
@endsection