<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pelanggan | Apotek Online</title>
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
        }
        .login-card {
            background: white;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 2rem;
            width: 100%;
            max-width: 400px;
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
    </style>
</head>
<body>

    <div class="login-card">
        <div class="brand-logo">
            <i class="fa-solid fa-pills"></i>
            <h2>ApotekKu</h2>
            <p class="text-muted">Portal Pelanggan</p>
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

        <form method="POST" action="<?php echo e(route('pelanggan.login')); ?>">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus placeholder="Masukkan email Anda">
            </div>

            <div class="mb-3">
                <label for="katakunci" class="form-label">Password</label>
                <input type="password" class="form-control" id="katakunci" name="katakunci" required placeholder="Masukkan password Anda">
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3">Masuk Sekarang</button>
        </form>

        <div class="text-center mt-4">
            <p class="mb-2">Belum punya akun? <a href="<?php echo e(route('pelanggan.register')); ?>">Daftar di sini</a></p>
            <hr>
            <p class="text-muted small mb-0">Pegawai Apotek? <a href="<?php echo e(route('login')); ?>" class="text-primary">Login Karyawan</a></p>
        </div>
    </div>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\APOTEK_ONLINE\resources\views\pelanggan\auth\login.blade.php ENDPATH**/ ?>