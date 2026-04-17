<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin - Edit User</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="{{ asset('assets/be/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/be/css/style.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
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
                    <a href="{{ route('obat.index') }}" class="nav-item nav-link"><i class="fa fa-medkit me-2"></i>Obat</a>
                    <a href="{{ route('user.index') }}" class="nav-item nav-link active"><i class="fa fa-users me-2"></i>User</a>
                </div>
            </nav>
        </div>

        <div class="content">
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Edit Pengguna: {{ $user->name }}</h6>
                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT') <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin ganti">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jabatan</label>
                            <select name="jabatan" class="form-select bg-dark text-white" required>
                                <option value="admin" {{ $user->jabatan == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="apoteker" {{ $user->jabatan == 'apoteker' ? 'selected' : '' }}>Apoteker</option>
                                <option value="kasir" {{ $user->jabatan == 'kasir' ? 'selected' : '' }}>Kasir</option>
                                <option value="karyawan" {{ $user->jabatan == 'karyawan' ? 'selected' : '' }}>Karyawan</option>
                                <option value="pemilik" {{ $user->jabatan == 'pemilik' ? 'selected' : '' }}>Pemilik</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update User</button>
                        <a href="{{ route('user.index') }}" class="btn btn-outline-light ms-2">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>