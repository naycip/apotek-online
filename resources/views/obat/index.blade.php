@extends('layouts.admin')

@section('content')
<div class="bg-secondary rounded p-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0">Daftar Stok Obat</h6>
        <a href="{{ route('obat.create') }}" class="btn btn-primary">Tambah Obat</a>
    </div>

    <div class="table-responsive">
        <table class="table text-start align-middle table-bordered table-hover mb-0 text-white">
            <thead>
                <tr class="text-white">
                    <th>No</th>
                    <th>Nama Obat</th>
                    <th>Jenis</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($obats as $key => $o)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $o->nama_obat }}</td>
                    <td>{{ $o->jenisObat->jenis ?? 'Tidak Ada Jenis' }}</td> 
                    <td>Rp {{ number_format($o->harga_jual, 0, ',', '.') }}</td>
                    <td>{{ $o->stok }}</td>
                    <td>
                        <a class="btn btn-sm btn-warning" href="{{ route('obat.edit', $o->id) }}">Edit</a>
                        <form action="{{ route('obat.destroy', $o->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-primary" onclick="return confirm('Hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada data obat.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection