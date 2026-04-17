@extends('layouts.admin')

@section('content')
<div class="bg-secondary rounded p-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0">Daftar Distributor / Supplier</h6>
        <a href="{{ route('distributor.create') }}" class="btn btn-primary">Tambah Distributor</a>
    </div>

    <div class="table-responsive">
        <table class="table text-start align-middle table-bordered table-hover mb-0 text-white">
            <thead>
                <tr class="text-white">
                    <th width="50">No</th>
                    <th>Nama Distributor</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th width="200">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($distributors as $key => $d)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $d->nama_distributor }}</td>
                    <td>{{ $d->telepon }}</td>
                    <td>{{ $d->alamat }}</td>
                    <td>
                        <a class="btn btn-sm btn-warning" href="{{ route('distributor.edit', $d->id) }}">Edit</a>
                        <form action="{{ route('distributor.destroy', $d->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-primary" onclick="return confirm('Yakin hapus distributor ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada data distributor.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection