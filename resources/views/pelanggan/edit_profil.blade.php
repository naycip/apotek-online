@extends('layouts.pelanggan')
@section('title', 'Edit Profil | ApotekKu')

@section('content')
<div class="container py-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="content-card p-4">
                <h4 class="fw-bold mb-4 border-bottom pb-3"><i class="fa-solid fa-user-pen text-primary me-2"></i>Edit Profil</h4>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('pelanggan.profil.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <h5 class="mb-3 text-secondary">Informasi Pribadi</h5>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_pelanggan" value="{{ old('nama_pelanggan', $pelanggan->nama_pelanggan) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email (Tidak dapat diubah)</label>
                            <input type="email" class="form-control" value="{{ $pelanggan->email }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">No. Telepon</label>
                            <input type="text" class="form-control" name="no_telp" value="{{ old('no_telp', $pelanggan->no_telp) }}" required>
                        </div>
                    </div>

                    <h5 class="mb-3 text-secondary">Alamat Utama</h5>
                    <div class="row g-3 mb-4">
                        <div class="col-12">
                            <label class="form-label">Alamat Lengkap</label>
                            <textarea class="form-control" name="alamat1" rows="2">{{ old('alamat1', $pelanggan->alamat1) }}</textarea>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Kota</label>
                            <input type="text" class="form-control" name="kota1" value="{{ old('kota1', $pelanggan->kota1) }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Provinsi</label>
                            <input type="text" class="form-control" name="propinsi1" value="{{ old('propinsi1', $pelanggan->propinsi1) }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Kode Pos</label>
                            <input type="text" class="form-control" name="kodepos1" value="{{ old('kodepos1', $pelanggan->kodepos1) }}">
                        </div>
                    </div>

                    <h5 class="mb-3 text-secondary">Alamat Tambahan 1 (Opsional)</h5>
                    <div class="row g-3 mb-4">
                        <div class="col-12">
                            <label class="form-label">Alamat Lengkap</label>
                            <textarea class="form-control" name="alamat2" rows="2">{{ old('alamat2', $pelanggan->alamat2) }}</textarea>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Kota</label>
                            <input type="text" class="form-control" name="kota2" value="{{ old('kota2', $pelanggan->kota2) }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Provinsi</label>
                            <input type="text" class="form-control" name="propinsi2" value="{{ old('propinsi2', $pelanggan->propinsi2) }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Kode Pos</label>
                            <input type="text" class="form-control" name="kodepos2" value="{{ old('kodepos2', $pelanggan->kodepos2) }}">
                        </div>
                    </div>

                    <h5 class="mb-3 text-secondary">Alamat Tambahan 2 (Opsional)</h5>
                    <div class="row g-3 mb-4">
                        <div class="col-12">
                            <label class="form-label">Alamat Lengkap</label>
                            <textarea class="form-control" name="alamat3" rows="2">{{ old('alamat3', $pelanggan->alamat3) }}</textarea>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Kota</label>
                            <input type="text" class="form-control" name="kota3" value="{{ old('kota3', $pelanggan->kota3) }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Provinsi</label>
                            <input type="text" class="form-control" name="propinsi3" value="{{ old('propinsi3', $pelanggan->propinsi3) }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Kode Pos</label>
                            <input type="text" class="form-control" name="kodepos3" value="{{ old('kodepos3', $pelanggan->kodepos3) }}">
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                        <a href="{{ route('pelanggan.dashboard') }}" class="btn btn-light px-4">Batal</a>
                        <button type="submit" class="btn btn-custom px-4">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
