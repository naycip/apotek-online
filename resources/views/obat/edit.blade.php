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

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{ route('obat.update', $obat->id) }}" method="POST" enctype="multipart/form-data">
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
                            <label class="form-label">Foto Utama Obat (Foto 1)</label>
                            @if($obat->foto1)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/obat/' . $obat->foto1) }}" alt="Foto 1" style="max-height: 100px; border-radius: 5px;">
                                </div>
                            @endif
                            <input type="file" name="foto1" class="form-control bg-dark text-white">
                            <small class="text-muted">Format: jpg, png, jpeg (Maks 2MB). Kosongkan jika tidak ingin mengubah foto.</small>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Foto Tambahan (Foto 2)</label>
                                @if($obat->foto2)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/obat/' . $obat->foto2) }}" alt="Foto 2" style="max-height: 100px; border-radius: 5px;">
                                    </div>
                                @endif
                                <input type="file" name="foto2" class="form-control bg-dark text-white">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Foto Tambahan (Foto 3)</label>
                                @if($obat->foto3)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/obat/' . $obat->foto3) }}" alt="Foto 3" style="max-height: 100px; border-radius: 5px;">
                                    </div>
                                @endif
                                <input type="file" name="foto3" class="form-control bg-dark text-white">
                            </div>
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
