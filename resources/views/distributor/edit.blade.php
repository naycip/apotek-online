@extends('layouts.admin')

@section('content')
<div class="row g-4">
    <div class="col-sm-12 col-xl-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Edit Data Distributor</h6>
            
            <form action="{{ route('distributor.update', $distributor->id) }}" method="POST">
                @csrf
                @method('PUT') {{-- PENTING: Untuk proses update wajib ada ini --}}
                
                <div class="mb-3">
                    <label class="form-label">Nama Distributor</label>
                    <input type="text" name="nama_distributor" class="form-control" value="{{ $distributor->nama_distributor }}" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Nomor Telepon</label>
                    <input type="text" name="telepon" class="form-control" value="{{ $distributor->telepon }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat Lengkap</label>
                    <textarea name="alamat" class="form-control" rows="3" required>{{ $distributor->alamat }}</textarea>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Update Distributor</button>
                    <a href="{{ route('distributor.index') }}" class="btn btn-outline-light ms-2">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection