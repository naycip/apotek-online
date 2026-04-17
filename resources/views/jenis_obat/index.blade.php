@extends('layouts.admin')

@section('content')
<div class="bg-secondary text-center rounded p-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0">Data Jenis Obat</h6>
        <a href="{{ route('jenisobat.create') }}" class="btn btn-primary">Tambah Jenis</a>
    </div>
    <div class="table-responsive">
        <table class="table text-start align-middle table-bordered table-hover mb-0 text-white">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Icon</th>
                    <th>Nama Jenis</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jenis as $key => $j)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        @if($j->image_url)
                            <img src="{{ asset('storage/jenis_obat/'.$j->image_url) }}" width="50px" class="rounded">
                        @else
                            <i class="fa fa-pills text-primary"></i>
                        @endif
                    </td>
                    <td>{{ $j->jenis }}</td>
                    <td>{{ $j->deskripsi_jenis }}</td>
                    <td>
                        <a class="btn btn-sm btn-warning" href="{{ route('jenisobat.edit', $j->id) }}">Edit</a>
                        <form action="{{ route('jenisobat.destroy', $j->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-primary" onclick="return confirm('Hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection