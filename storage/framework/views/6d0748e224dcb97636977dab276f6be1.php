

<?php $__env->startSection('content'); ?>
<div class="row g-4">
    <div class="col-sm-12 col-xl-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Tambah Distributor Baru</h6>
            
            <form action="<?php echo e(route('distributor.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                
                <div class="mb-3">
                    <label class="form-label">Nama Distributor</label>
                    <input type="text" name="nama_distributor" class="form-control" placeholder="Contoh: PT. Kimia Farma" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Nomor Telepon</label>
                    <input type="text" name="telepon" class="form-control" placeholder="Contoh: 08123456789" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat Lengkap</label>
                    <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan alamat kantor distributor..." required></textarea>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Simpan Distributor</button>
                    <a href="<?php echo e(route('distributor.index')); ?>" class="btn btn-outline-light ms-2">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\APOTEK_ONLINE\resources\views\distributor\create.blade.php ENDPATH**/ ?>