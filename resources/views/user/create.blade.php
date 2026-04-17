@extends('layouts.admin')

@section('content')
<div class="row g-4">
    <div class="col-sm-12 col-xl-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Tambah Pengguna Baru</h6>
            
            {{-- Tambahkan ini untuk melihat error jika validasi gagal --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control" placeholder="Masukkan nama lengkap" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="nama@email.com" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Minimal 8 karakter" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jabatan</label>
                    <select name="jabatan" class="form-select bg-dark text-white" required>
                        <option value="">Pilih Jabatan</option>
                        <option value="admin">Admin</option>
                        <option value="apoteker">Apoteker</option>
                        <option value="kasir">Kasir</option>
                        <option value="karyawan">Karyawan</option>
                        <option value="pemilik">Pemilik</option>
                    </select>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Simpan User</button>
                    <a href="{{ route('user.index') }}" class="btn btn-outline-light ms-2">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection