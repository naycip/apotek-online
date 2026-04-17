<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin - Edit Obat</title>
    <link href="{{ asset('assets/be/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/be/css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container-fluid position-relative d-flex p-0">
        <div class="content w-100">
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded p-4">
                    <h6 class="mb-4">Edit Data Obat: {{ $obat->nama_obat }}</h6>
                    
                    <form action="{{ route('obat.update', $obat->id) }}" method="POST">
                        @csrf
                        @method('PUT') <div class="mb-3">
                            <label class="form-label">Nama Obat</label>
                            <input type="text" name="nama_obat" class="form-control" value="{{ $obat->nama_obat }}">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Jenis Obat</label>
                            <select name="idjenis" class="form-select bg-dark text-white">
                                @foreach($jenis_obats as $jo)
                                    <option value="{{ $jo->id }}" {{ $obat->idjenis == $jo->id ? 'selected' : '' }}>
                                        {{ $jo->jenis }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Harga Jual</label>
                            <input type="number" name="harga_jual" class="form-control" value="{{ $obat->harga_jual }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Stok</label>
                            <input type="number" name="stok" class="form-control" value="{{ $obat->stok }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="deskripsi_obat" class="form-control" rows="3">{{ $obat->deskripsi_obat }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Data</button>
                        <a href="{{ route('obat.index') }}" class="btn btn-outline-light">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
