

<?php $__env->startSection('content'); ?>
<div class="row g-4">
    <div class="col-sm-12 col-xl-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Tambah Metode Pembayaran</h6>
            
            <form action="<?php echo e(route('metodebayar.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                
                <div class="mb-3">
                    <label class="form-label">Nama Metode (Contoh: Transfer Bank / E-Wallet)</label>
                    <input type="text" name="metode_pembayaran" class="form-control" placeholder="Masukkan jenis pembayaran..." required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Tempat Bayar / Nama Bank (Contoh: BCA / ShopeePay)</label>
                    <input type="text" name="tempat_bayar" class="form-control" placeholder="Masukkan nama bank..." required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nomor Rekening / HP</label>
                    <input type="text" name="no_rekening" class="form-control" placeholder="Masukkan nomor rekening..." required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Logo Pembayaran</label>
                    <input type="file" name="url_logo" class="form-control bg-dark">
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?php echo e(route('metodebayar.index')); ?>" class="btn btn-outline-light ms-2">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\APOTEK_ONLINE\resources\views\metode_bayar\create.blade.php ENDPATH**/ ?>