

<?php $__env->startSection('content'); ?>
<div class="bg-secondary rounded h-100 p-4">
    <h6 class="mb-4">Edit Data Pelanggan</h6>
    
    <form action="<?php echo e(route('pelanggan.update', $pelanggan->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?> 

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_pelanggan" class="form-control" value="<?php echo e($pelanggan->nama_pelanggan); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo e($pelanggan->email); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Ganti Password (Kosongkan jika tidak ingin ganti)</label>
                    <input type="password" name="katakunci" class="form-control" placeholder="Masukkan password baru...">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nomor Telepon</label>
                    <input type="text" name="no_telp" class="form-control" value="<?php echo e($pelanggan->no_telp); ?>" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Alamat Utama</label>
                    <textarea name="alamat1" class="form-control" rows="2" required><?php echo e($pelanggan->alamat1); ?></textarea>
                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                        <label class="form-label">Kota</label>
                        <input type="text" name="kota1" class="form-control" value="<?php echo e($pelanggan->kota1); ?>" required>
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label">Provinsi</label>
                        <input type="text" name="propinsi1" class="form-control" value="<?php echo e($pelanggan->propinsi1); ?>" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Update Foto Profil</label>
                    <input type="file" name="foto" class="form-control bg-dark">
                    <?php if($pelanggan->foto): ?>
                        <small class="text-info">File saat ini: <?php echo e($pelanggan->foto); ?></small>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Update Data Pelanggan</button>
            <a href="<?php echo e(route('pelanggan.index')); ?>" class="btn btn-outline-light ms-2">Batal</a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\APOTEK_ONLINE\resources\views/pelanggan/edit.blade.php ENDPATH**/ ?>