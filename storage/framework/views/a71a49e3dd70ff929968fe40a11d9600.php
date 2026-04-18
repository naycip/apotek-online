

<?php $__env->startSection('content'); ?>
<div class="row g-4">
    <div class="col-sm-12 col-xl-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Edit Data Distributor</h6>
            
            <form action="<?php echo e(route('distributor.update', $distributor->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?> 
                
                <div class="mb-3">
                    <label class="form-label">Nama Distributor</label>
                    <input type="text" name="nama_distributor" class="form-control" value="<?php echo e($distributor->nama_distributor); ?>" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Nomor Telepon</label>
                    <input type="text" name="telepon" class="form-control" value="<?php echo e($distributor->telepon); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat Lengkap</label>
                    <textarea name="alamat" class="form-control" rows="3" required><?php echo e($distributor->alamat); ?></textarea>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Update Distributor</button>
                    <a href="<?php echo e(route('distributor.index')); ?>" class="btn btn-outline-light ms-2">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\APOTEK_ONLINE\resources\views\distributor\edit.blade.php ENDPATH**/ ?>