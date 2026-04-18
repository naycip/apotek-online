<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin - Edit Obat</title>
    <link href="<?php echo e(asset('assets/be/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/be/css/style.css')); ?>" rel="stylesheet">
</head>
<body>
    <div class="container-fluid position-relative d-flex p-0">
        <div class="content w-100">
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded p-4">
                    <h6 class="mb-4">Edit Data Obat: <?php echo e($obat->nama_obat); ?></h6>

                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    
                    <form action="<?php echo e(route('obat.update', $obat->id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?> <div class="mb-3">
                            <label class="form-label">Nama Obat</label>
                            <input type="text" name="nama_obat" class="form-control" value="<?php echo e($obat->nama_obat); ?>">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Jenis Obat</label>
                            <select name="idjenis" class="form-select bg-dark text-white">
                                <?php $__currentLoopData = $jenis_obats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($jo->id); ?>" <?php echo e($obat->idjenis == $jo->id ? 'selected' : ''); ?>>
                                        <?php echo e($jo->jenis); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Foto Utama Obat (Foto 1)</label>
                            <?php if($obat->foto1): ?>
                                <div class="mb-2">
                                    <img src="<?php echo e(asset('storage/obat/' . $obat->foto1)); ?>" alt="Foto 1" style="max-height: 100px; border-radius: 5px;">
                                </div>
                            <?php endif; ?>
                            <input type="file" name="foto1" class="form-control bg-dark text-white">
                            <small class="text-muted">Format: jpg, png, jpeg (Maks 2MB). Kosongkan jika tidak ingin mengubah foto.</small>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Foto Tambahan (Foto 2)</label>
                                <?php if($obat->foto2): ?>
                                    <div class="mb-2">
                                        <img src="<?php echo e(asset('storage/obat/' . $obat->foto2)); ?>" alt="Foto 2" style="max-height: 100px; border-radius: 5px;">
                                    </div>
                                <?php endif; ?>
                                <input type="file" name="foto2" class="form-control bg-dark text-white">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Foto Tambahan (Foto 3)</label>
                                <?php if($obat->foto3): ?>
                                    <div class="mb-2">
                                        <img src="<?php echo e(asset('storage/obat/' . $obat->foto3)); ?>" alt="Foto 3" style="max-height: 100px; border-radius: 5px;">
                                    </div>
                                <?php endif; ?>
                                <input type="file" name="foto3" class="form-control bg-dark text-white">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Harga Jual</label>
                            <input type="number" name="harga_jual" class="form-control" value="<?php echo e($obat->harga_jual); ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Stok</label>
                            <input type="number" name="stok" class="form-control" value="<?php echo e($obat->stok); ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="deskripsi_obat" class="form-control" rows="3"><?php echo e($obat->deskripsi_obat); ?></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Data</button>
                        <a href="<?php echo e(route('obat.index')); ?>" class="btn btn-outline-light">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\APOTEK_ONLINE\resources\views\obat\edit.blade.php ENDPATH**/ ?>