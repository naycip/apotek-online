@extends('layouts.admin')

@section('content')
<div class="bg-secondary rounded p-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0">Data Pelanggan</h6>
        @if(auth()->user()->jabatan != 'pemilik')
        <a href="{{ route('pelanggan.create') }}" class="btn btn-primary">Tambah Pelanggan</a>
        @endif
    </div>
    <div class="table-responsive">
        <table class="table text-start align-middle table-bordered table-hover mb-0 text-white">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No. Telp</th>
                    <th>Kota</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pelanggans as $key => $p)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $p->nama_pelanggan }}</td>
                    <td>{{ $p->email }}</td>
                    <td>{{ $p->no_telp }}</td>
                    <td>{{ $p->kota1 }}</td>
                    <td>
                        @if(auth()->user()->jabatan != 'pemilik')
                        <a class="btn btn-sm btn-warning" href="{{ route('pelanggan.edit', $p->id) }}">Edit</a>
                        <form action="{{ route('pelanggan.destroy', $p->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-primary" onclick="return confirm('Hapus?')">Hapus</button>
                        </form>
                        @else
                        -
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection