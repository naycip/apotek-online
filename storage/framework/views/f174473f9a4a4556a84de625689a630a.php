

<?php $__env->startSection('content'); ?>
<div class="row g-4">
    <div class="col-sm-12 col-xl-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Edit Metode Pembayaran</h6>
            
            <form action="<?php echo e(route('metodebayar.update', $metode->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?> 
                
                <div class="mb-3">
                    <label class="form-label">Nama Metode</label>
                    <input type="text" name="metode_pembayaran" class="form-control" value="<?php echo e($metode->metode_pembayaran); ?>" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Tempat Bayar / Nama Bank</label>
                    <input type="text" name="tempat_bayar" class="form-control" value="<?php echo e($metode->tempat_bayar); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nomor Rekening / HP</label>
                    <input type="text" name="no_rekening" class="form-control" value="<?php echo e($metode->no_rekening); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Logo Saat Ini</label><br>
                    <?php if($metode->url_logo): ?>
                        <img src="<?php echo e(asset('storage/pembayaran/'.$metode->url_logo)); ?>" width="100" class="rounded mb-2 border">
                    <?php else: ?>
                        <p class="text-muted">Tidak ada logo.</p>
                    <?php endif; ?>
                    <input type="file" name="url_logo" class="form-control bg-dark">
                    <small class="text-muted">Biarkan kosong jika tidak ingin mengganti logo.</small>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Update Data</button>
                    <a href="<?php echo e(route('metodebayar.index')); ?>" class="btn btn-outline-light ms-2">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\APOTEK_ONLINE\resources\views\metode_bayar\edit.blade.php ENDPATH**/ ?>