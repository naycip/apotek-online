<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelanggan | Apotek Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: #f4f6f9;
            color: #333;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 0;
        }
        .register-card {
            background: white;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 2rem;
            width: 100%;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .brand-logo {
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .brand-logo i {
            font-size: 3rem;
            color: #007bff;
        }
        .brand-logo h2 {
            font-weight: bold;
            margin-top: 10px;
            color: #333;
        }
        .section-title {
            font-size: 1.1rem;
            border-bottom: 1px solid #dee2e6;
            padding-bottom: 0.5rem;
            margin-bottom: 1.5rem;
            color: #007bff;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="register-card mx-auto">
                    <div class="brand-logo">
                        <i class="fa-solid fa-user-plus"></i>
                        <h2>Buat Akun Baru</h2>
                        <p class="text-muted">Bergabunglah dengan ApotekKu</p>
                    </div>

                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0 px-3">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo e(route('pelanggan.register')); ?>">
                        <?php echo csrf_field(); ?>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="section-title">Informasi Akun</div>
                                <div class="mb-3">
                                    <label for="nama_pelanggan" class="form-label">Nama Lengkap *</label>
                                    <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="<?php echo e(old('nama_pelanggan')); ?>" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address *</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo e(old('email')); ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="katakunci" class="form-label">Password * <small class="text-muted">(Max 15 karakter)</small></label>
                                    <input type="password" class="form-control" id="katakunci" name="katakunci" maxlength="15" required>
                                </div>

                                <div class="mb-3">
                                    <label for="no_telp" class="form-label">No. Telepon / WA *</label>
                                    <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?php echo e(old('no_telp')); ?>" required>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="section-title">Alamat Pengiriman (Opsional)</div>
                                <div class="mb-3">
                                    <label for="alamat1" class="form-label">Alamat Lengkap</label>
                                    <textarea class="form-control" id="alamat1" name="alamat1" rows="2"><?php echo e(old('alamat1')); ?></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label for="kota1" class="form-label">Kota/Kab</label>
                                        <input type="text" class="form-control" id="kota1" name="kota1" value="<?php echo e(old('kota1')); ?>">
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="propinsi1" class="form-label">Provinsi</label>
                                        <input type="text" class="form-control" id="propinsi1" name="propinsi1" value="<?php echo e(old('propinsi1')); ?>">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="kodepos1" class="form-label">Kode Pos</label>
                                    <input type="text" class="form-control" id="kodepos1" name="kodepos1" value="<?php echo e(old('kodepos1')); ?>">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mt-4">Daftar Sekarang</button>
                    </form>

                    <div class="text-center mt-4">
                        <p class="mb-2">Sudah punya akun? <a href="<?php echo e(route('pelanggan.login')); ?>">Login di sini</a></p>
                        <hr>
                        <p class="text-muted small mb-0">Pegawai Apotek? <a href="<?php echo e(route('login')); ?>" class="text-primary">Login Karyawan</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\APOTEK_ONLINE\resources\views\pelanggan\auth\register.blade.php ENDPATH**/ ?>