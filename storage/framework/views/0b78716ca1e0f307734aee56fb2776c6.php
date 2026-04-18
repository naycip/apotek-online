

<?php $__env->startSection('content'); ?>
<div class="row g-4">
    <div class="col-sm-12 col-xl-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Tambah Kategori Jenis Obat</h6>
            
            <form action="<?php echo e(route('jenisobat.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                
                <div class="mb-3">
                    <label class="form-label">Nama Jenis</label>
                    <input type="text" name="jenis" class="form-control" placeholder="Contoh: Tablet, Sirup, Kapsul" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi_jenis" class="form-control" rows="3" placeholder="Masukkan keterangan jenis obat..."></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gambar/Icon Kategori</label>
                    <input type="file" name="image_url" class="form-control bg-dark">
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?php echo e(route('jenisobat.index')); ?>" class="btn btn-outline-light ms-2">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\APOTEK_ONLINE\resources\views\jenis_obat\create.blade.php ENDPATH**/ ?>