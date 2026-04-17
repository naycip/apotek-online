@extends('layouts.admin')

@section('content')
<div class="bg-secondary rounded p-4">
    <div class="d-flex justify-content-between mb-4">
        <h6>Metode Pembayaran</h6>
        @if(auth()->user()->jabatan != 'pemilik')
        <a href="{{ route('metodebayar.create') }}" class="btn btn-primary">Tambah Metode</a>
        @endif
    </div>
    <div class="table-responsive">
        <table class="table text-start align-middle table-bordered table-hover mb-0 text-white">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Logo</th>
                    <th>Metode</th>
                    <th>Bank/Tempat</th>
                    <th>No. Rekening</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($metodebayars as $m)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if($m->url_logo)
                            <img src="{{ asset('storage/pembayaran/'.$m->url_logo) }}" width="50" class="rounded">
                        @else
                            <i class="fa fa-credit-card"></i>
                        @endif
                    </td>
                    <td>{{ $m->metode_pembayaran }}</td>
                    <td>{{ $m->tempat_bayar }}</td>
                    <td>{{ $m->no_rekening }}</td>
                    <td>
                        @if(auth()->user()->jabatan != 'pemilik')
                        <a href="{{ route('metodebayar.edit', $m->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('metodebayar.destroy', $m->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-primary" onclick="return confirm('Yakin?')">Hapus</button>
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