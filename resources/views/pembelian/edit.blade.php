@extends('layouts.admin')

@section('content')
<div class="bg-secondary rounded h-100 p-4">
    <h6 class="mb-4">Edit Transaksi Pembelian</h6>
    
    <form action="{{ route('pembelian.update', $pembelian->id) }}" method="POST">
        @csrf
        @method('PUT') {{-- Wajib ada untuk update --}}
        
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Nomor Nota</label>
                    <input type="text" name="nonota" class="form-control" value="{{ $pembelian->nonota }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Pembelian</label>
                    <input type="date" name="tgl_pembelian" class="form-control" value="{{ $pembelian->tgl_pembelian }}" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Pilih Distributor</label>
                    <select name="id_distributor" class="form-select bg-dark text-white" required>
                        @foreach($distributors as $d)
                            <option value="{{ $d->id }}" {{ $pembelian->id_distributor == $d->id ? 'selected' : '' }}>
                                {{ $d->nama_distributor }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Total Bayar (Rp)</label>
                    <input type="number" name="total_bayar" class="form-control" value="{{ $pembelian->total_bayar }}" required>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Update Transaksi</button>
            <a href="{{ route('pembelian.index') }}" class="btn btn-outline-light ms-2">Batal</a>
        </div>
    </form>
</div>
@endsection