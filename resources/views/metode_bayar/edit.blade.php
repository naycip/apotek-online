@extends('layouts.admin')

@section('content')
<div class="row g-4">
    <div class="col-sm-12 col-xl-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Edit Metode Pembayaran</h6>
            
            <form action="{{ route('metodebayar.update', $metode->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') {{-- PENTING: Untuk proses update wajib pakai @method('PUT') --}}
                
                <div class="mb-3">
                    <label class="form-label">Nama Metode</label>
                    <input type="text" name="metode_pembayaran" class="form-control" value="{{ $metode->metode_pembayaran }}" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Tempat Bayar / Nama Bank</label>
                    <input type="text" name="tempat_bayar" class="form-control" value="{{ $metode->tempat_bayar }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nomor Rekening / HP</label>
                    <input type="text" name="no_rekening" class="form-control" value="{{ $metode->no_rekening }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Logo Saat Ini</label><br>
                    @if($metode->url_logo)
                        <img src="{{ asset('storage/pembayaran/'.$metode->url_logo) }}" width="100" class="rounded mb-2 border">
                    @else
                        <p class="text-muted">Tidak ada logo.</p>
                    @endif
                    <input type="file" name="url_logo" class="form-control bg-dark">
                    <small class="text-muted">Biarkan kosong jika tidak ingin mengganti logo.</small>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Update Data</button>
                    <a href="{{ route('metodebayar.index') }}" class="btn btn-outline-light ms-2">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection