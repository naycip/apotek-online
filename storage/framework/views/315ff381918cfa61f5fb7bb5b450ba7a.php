

<?php $__env->startSection('content'); ?>
<div class="bg-secondary rounded p-4">
    <h6 class="mb-4">Tambah Ekspedisi Pengiriman</h6>
    <form action="<?php echo e(route('jenispengiriman.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label class="form-label">Nama Ekspedisi</label>
            <input type="text" name="nama_ekspedisi" class="form-control" placeholder="Contoh: JNE, J&T, SiCepat" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Jenis Layanan (Kategori)</label>
            <select name="jenis_kirim" class="form-select bg-dark text-white">
                <option value="ekonomi">Ekonomi</option>
                <option value="regular">Regular</option>
                <option value="kargo">Kargo</option>
                <option value="same_day">Same Day</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Link Logo Ekspedisi (Opsional)</label>
            <input type="text" name="logo_ekspedisi" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Ekspedisi</button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\APOTEK_ONLINE\resources\views/jenis_kirim/create.blade.php ENDPATH**/ ?>