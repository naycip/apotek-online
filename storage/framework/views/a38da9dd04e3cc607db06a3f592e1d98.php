<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="<?php echo e(asset('/assets/be/img/favicon.ico')); ?>" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="<?php echo e(asset('/assets/be/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/assets/be/css/style.css')); ?>" rel="stylesheet">
</head>

<body>
<div class="container-fluid position-relative d-flex p-0">

    <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-secondary navbar-dark">
            <a href="<?php echo e(route('be.admin')); ?>" class="navbar-brand mx-4 mb-3">
                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Admin</h3>
            </a>

            <div class="navbar-nav w-100">
                <a href="<?php echo e(route('be.admin')); ?>" class="nav-item nav-link active">
                    <i class="fa fa-tachometer-alt me-2"></i>Dashboard
                </a>
                
                <a href="<?php echo e(route('obat.index')); ?>" class="nav-item nav-link">
                    <i class="fa fa-medkit me-2"></i>Obat
                </a>
    
                <a href="<?php echo e(route('user.index')); ?>" class="nav-item nav-link <?php echo e(request()->is('user*') ? 'active' : ''); ?>">
                    <i class="fa fa-users me-2"></i>User
                </a>

                <a href="<?php echo e(route('jenisobat.index')); ?>" class="nav-item nav-link <?php echo e(request()->is('jenisobat*') ? 'active' : ''); ?>">
                    <i class="fa fa-th me-2"></i>Jenis Obat
                </a>

                <a href="<?php echo e(route('metodebayar.index')); ?>" class="nav-item nav-link <?php echo e(request()->is('metodebayar*') ? 'active' : ''); ?>">
                    <i class="fa fa-credit-card me-2"></i>Metode Bayar
                </a>
            </div>
        </nav>
    </div>
    <div class="content">

        <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
            <a href="#" class="sidebar-toggler flex-shrink-0">
                <i class="fa fa-bars"></i>
            </a>
            <div class="navbar-nav ms-auto">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <span class="d-none d-lg-inline-flex">Admin</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                        <a href="#" class="dropdown-item">Logout</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-secondary rounded p-4 text-center">
                        <h6>Today Sale</h6>
                        <h3>$1234</h3>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-secondary rounded p-4 text-center">
                        <h6>Total Sale</h6>
                        <h3>$5000</h3>
                    </div>
                </div>
            </div>

            <div class="bg-secondary rounded p-4 mt-4">
                <h6 class="mb-4">Data Produk</h6>
                <div class="table-responsive">
                    <table class="table table-bordered text-white">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Paracetamol</td>
                                <td>5000</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Vitamin C</td>
                                <td>10000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo e(asset('/assets/be/js/main.js')); ?>"></script>

</body>
</html><?php /**PATH C:\xampp\htdocs\APOTEK_ONLINE\resources\views\be\admin.blade.php ENDPATH**/ ?>