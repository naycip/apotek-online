<?php $__env->startSection('title', 'Belanja Obat | ApotekKu'); ?>

<?php $__env->startSection('content'); ?>
<section class="section" style="margin-top: 80px; min-height: 80vh;">
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Katalog Obat</h2>
            <div class="input-group w-25">
                <input type="text" class="form-control" placeholder="Cari obat...">
                <button class="btn btn-outline-secondary" type="button"><i class="fa-solid fa-search"></i></button>
            </div>
        </div>

        <div class="row g-4">
            <?php $__empty_1 = true; $__currentLoopData = $obats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $obat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-md-4 col-lg-3">
                    <div class="card h-100 p-0 overflow-hidden text-center shadow-sm border-0" style="transition: transform 0.3s; margin-bottom: 0;">
                        <div style="height: 180px; background: #f1f3f5; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                            <?php if($obat->foto): ?>
                                <img src="<?php echo e(asset('storage/' . $obat->foto)); ?>" alt="<?php echo e($obat->nama_obat); ?>" style="max-height: 100%; max-width: 100%; object-fit: contain;">
                            <?php else: ?>
                                <i class="fa-solid fa-pills text-muted" style="font-size: 4rem;"></i>
                            <?php endif; ?>
                        </div>
                        <div class="card-body p-3">
                            <h5 class="fw-bold text-truncate" title="<?php echo e($obat->nama_obat); ?>"><?php echo e($obat->nama_obat); ?></h5>
                            <p class="text-muted small mb-2"><?php echo e(Str::limit($obat->deskripsi ?? 'Tidak ada deskripsi', 50)); ?></p>
                            <h5 class="text-primary fw-bold mb-3">Rp <?php echo e(number_format($obat->harga_jual, 0, ',', '.')); ?></h5>
                            
                            <form action="<?php echo e(route('pelanggan.tambah_keranjang', $obat->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="input-group mb-2">
                                    <span class="input-group-text">Qty</span>
                                    <input type="number" name="qty" class="form-control text-center" value="1" min="1" max="<?php echo e($obat->stok); ?>">
                                </div>
                                <button type="submit" class="btn btn-primary w-100" <?php echo e($obat->stok < 1 ? 'disabled' : ''); ?>>
                                    <i class="fa-solid fa-cart-plus me-1"></i> <?php echo e($obat->stok < 1 ? 'Stok Habis' : 'Tambah'); ?>

                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-12 text-center py-5">
                    <i class="fa-solid fa-box-open text-muted mb-3" style="font-size: 4rem;"></i>
                    <h4 class="text-muted">Katalog obat masih kosong</h4>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.fe', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\APOTEK_ONLINE\resources\views\pelanggan\katalog.blade.php ENDPATH**/ ?>