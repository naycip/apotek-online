<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin - Tambah Obat</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="{{ asset('assets/be/img/favicon.ico') }}" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('assets/be/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/be/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="{{ route('be.admin') }}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Admin</h3>
                </a>
                <div class="navbar-nav w-100">
                    <a href="{{ route('be.admin') }}" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="{{ route('obat.index') }}" class="nav-item nav-link active"><i class="fa fa-medkit me-2"></i>Obat</a>
                </div>
            </nav>
        </div>
        <div class="content">
            <nav class="navbar navbar-expand bg-secondary navbar-dark px-4 py-0">
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
            </nav>
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Tambah Data Obat Baru</h6>
                            <form action="{{ route('obat.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
    
                            <div class="mb-3">
                                <label class="form-label">Nama Obat</label>
                                <input type="text" name="nama_obat" class="form-control" placeholder="Masukkan nama obat">
                            </div>
    
                            <div class="mb-3">
                                <label class="form-label">Jenis Obat</label>
                                <select name="idjenis" class="form-select bg-dark text-white">
                                    <option value="" selected disabled>Pilih Jenis</option>
                                    @foreach($jenis_obats as $jo)
                                        <option value="{{ $jo->id }}">{{ $jo->jenis }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Foto Utama Obat (Foto 1)</label>
                                <input type="file" name="foto1" class="form-control bg-dark text-white">
                                <small class="text-muted">Format: jpg, png, jpeg (Maks 2MB)</small>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Foto Tambahan (Foto 2)</label>
                                    <input type="file" name="foto2" class="form-control bg-dark text-white">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Foto Tambahan (Foto 3)</label>
                                    <input type="file" name="foto3" class="form-control bg-dark text-white">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Harga Jual</label>
                                <input type="number" name="harga_jual" class="form-control" placeholder="Contoh: 50000">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Stok</label>
                                <input type="number" name="stok" class="form-control" placeholder="0">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea name="deskripsi_obat" class="form-control" rows="3"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                            <a href="{{ route('obat.index') }}" class="btn btn-outline-light ms-2">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/be/js/main.js') }}"></script>
</body>
</html>