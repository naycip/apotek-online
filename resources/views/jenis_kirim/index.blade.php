@extends('layouts.admin')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0 text-white">Daftar Jenis Pengiriman</h6>
            @if(auth()->user()->jabatan != 'pemilik')
            <a href="{{ route('jenispengiriman.create') }}" class="btn btn-primary">Tambah Data</a>
            @endif
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                        <th scope="col">No</th>
                        <th scope="col">Nama Ekspedisi</th>
                        <th scope="col">Jenis Layanan</th>
                        <th scope="col">Logo</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jenis_kirims as $key => $j)
                    <tr class="text-white">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $j->nama_ekspedisi }}</td>
                        <td><span class="badge bg-info">{{ $j->jenis_kirim }}</span></td>
                        <td>
                            @if($j->logo_ekspedisi)
                                <img src="{{ asset($j->logo_ekspedisi) }}" width="50" class="rounded">
                            @else
                                <span class="text-muted">Tidak ada logo</span>
                            @endif
                        </td>
                        <td>
                            @if(auth()->user()->jabatan != 'pemilik')
                            <a class="btn btn-sm btn-warning" href="{{ route('jenispengiriman.edit', $j->id) }}">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('jenispengiriman.destroy', $j->id) }}" method="POST" style="display:inline;">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-primary" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                    <i class="fa fa-trash"></i> Hapus
                                </button>
                            </form>
                            @else
                            -
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-danger">Data belum tersedia di database.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection