<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin - Apotek Online</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="<?php echo e(asset('assets/be/img/favicon.ico')); ?>" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo e(asset('assets/be/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/be/css/style.css')); ?>" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="<?php echo e(route('be.admin')); ?>" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Admin</h3>
                </a>
                <div class="navbar-nav w-100">
                    
                    <a href="<?php echo e(route('be.admin')); ?>" class="nav-item nav-link <?php echo e(request()->is('admin') ? 'active' : ''); ?>">
                        <i class="fa fa-tachometer-alt me-2"></i>Dashboard
                    </a>

                    
                    <?php if(auth()->user()->jabatan == 'admin'): ?>
                    <a href="<?php echo e(route('user.index')); ?>" class="nav-item nav-link <?php echo e(request()->is('user*') ? 'active' : ''); ?>">
                        <i class="fa fa-users me-2"></i>User
                    </a>
                    <?php endif; ?>

                    
                    <?php if(in_array(auth()->user()->jabatan, ['apoteker', 'karyawan', 'admin'])): ?>
                    <a href="<?php echo e(route('obat.index')); ?>" class="nav-item nav-link <?php echo e(request()->is('obat*') ? 'active' : ''); ?>">
                        <i class="fa fa-medkit me-2"></i>Obat
                    </a>
                    <a href="<?php echo e(route('jenisobat.index')); ?>" class="nav-item nav-link <?php echo e(request()->is('jenisobat*') ? 'active' : ''); ?>">
                        <i class="fa fa-th me-2"></i>Jenis Obat
                    </a>
                    <a href="<?php echo e(route('distributor.index')); ?>" class="nav-item nav-link <?php echo e(request()->is('distributor*') ? 'active' : ''); ?>">
                        <i class="fa fa-truck me-2"></i>Distributor
                    </a>
                    <?php endif; ?>

                    
                    <?php if(in_array(auth()->user()->jabatan, ['kasir', 'pemilik', 'admin'])): ?>
                    <a href="<?php echo e(route('penjualan.index')); ?>" class="nav-item nav-link <?php echo e(request()->is('penjualan*') ? 'active' : ''); ?>">
                        <i class="fa fa-shopping-cart me-2"></i>Laporan Jual
                    </a>
                    <a href="<?php echo e(route('pelanggan.index')); ?>" class="nav-item nav-link <?php echo e(request()->is('pelanggan*') ? 'active' : ''); ?>">
                        <i class="fa fa-user-friends me-2"></i>Pelanggan
                    </a>
                    <?php endif; ?>

                    
                    <?php if(in_array(auth()->user()->jabatan, ['kasir', 'pemilik', 'admin'])): ?>
                    <a href="<?php echo e(route('metodebayar.index')); ?>" class="nav-item nav-link <?php echo e(request()->is('metodebayar*') ? 'active' : ''); ?>">
                        <i class="fa fa-credit-card me-2"></i>Metode Bayar
                    </a>
                    <?php endif; ?>

                    
                    <?php if(auth()->user()->jabatan == 'pemilik' || auth()->user()->jabatan == 'admin'): ?>
                    <a href="<?php echo e(route('pembelian.index')); ?>" class="nav-item nav-link <?php echo e(request()->is('pembelian*') ? 'active' : ''); ?>">
                        <i class="fa fa-cash-register me-2"></i>Laporan Beli
                    </a>
                    <a href="<?php echo e(route('jenispengiriman.index')); ?>" class="nav-item nav-link <?php echo e(request()->is('jenispengiriman*') ? 'active' : ''); ?>">
                        <i class="fa fa-truck me-2"></i>Jenis Kirim
                    </a>
                    <?php endif; ?>

                    
                    <form action="<?php echo e(route('logout')); ?>" method="POST" class="nav-item nav-link">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn text-white p-0"><i class="fa fa-sign-out-alt me-2"></i>Logout</button>
                    </form>
                </div>
            </nav>
        </div>
        <div class="content">
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
            </nav>
            <div class="container-fluid pt-4 px-4">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
            </div>
        </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(asset('assets/be/js/main.js')); ?>"></script>
</body>

</html><?php /**PATH C:\xampp\htdocs\APOTEK_ONLINE\resources\views/layouts/admin.blade.php ENDPATH**/ ?>