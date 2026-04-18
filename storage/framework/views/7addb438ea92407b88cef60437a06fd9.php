<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin - Edit Jenis Obat</title>
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
                    <a href="<?php echo e(route('be.admin')); ?>" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="<?php echo e(route('obat.index')); ?>" class="nav-item nav-link"><i class="fa fa-medkit me-2"></i>Obat</a>
                    <a href="<?php echo e(route('user.index')); ?>" class="nav-item nav-link"><i class="fa fa-users me-2"></i>User</a>
                    <a href="<?php echo e(route('jenisobat.index')); ?>" class="nav-item nav-link active"><i class="fa fa-th me-2"></i>Jenis Obat</a>
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
                            <h6 class="mb-4">Edit Jenis Obat: <?php echo e($jenis->jenis); ?></h6>
                            
                            <form action="<?php echo e(route('jenisobat.update', $jenis->id)); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>

                                <div class="mb-3">
                                    <label class="form-label">Nama Jenis</label>
                                    <input type="text" name="jenis" class="form-control" value="<?php echo e($jenis->jenis); ?>" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi</label>
                                    <textarea name="deskripsi_jenis" class="form-control" rows="3" required><?php echo e($jenis->deskripsi_jenis); ?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Ganti Icon/Gambar (Biarkan kosong jika tidak ingin ganti)</label>
                                    <input type="file" name="image_url" class="form-control bg-dark text-white">
                                    <?php if($jenis->image_url): ?>
                                        <div class="mt-2">
                                            <p class="small mb-1">Gambar saat ini:</p>
                                            <img src="<?php echo e(asset('storage/jenis_obat/' . $jenis->image_url)); ?>" width="100px" class="rounded border border-primary">
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <button type="submit" class="btn btn-primary">Update Data</button>
                                <a href="<?php echo e(route('jenisobat.index')); ?>" class="btn btn-outline-light ms-2">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(asset('assets/be/js/main.js')); ?>"></script>
</body>

</html><?php /**PATH C:\xampp\htdocs\APOTEK_ONLINE\resources\views\jenis_obat\edit.blade.php ENDPATH**/ ?>