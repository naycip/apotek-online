<?php $__env->startSection('title', 'Keranjang Belanja | ApotekKu'); ?>

<?php $__env->startSection('content'); ?>
<section class="section" style="margin-top: 80px; min-height: 80vh;">
    <div class="container py-5">
        <h2 class="fw-bold mb-4">Keranjang Belanja</h2>

        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card p-0 overflow-hidden shadow-sm border-0">
                    <?php $__empty_1 = true; $__currentLoopData = $keranjangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="d-flex align-items-center p-3 border-bottom">
                            <div style="width: 80px; height: 80px; background: #f1f3f5; border-radius: 10px; display: flex; align-items: center; justify-content: center; overflow: hidden; margin-right: 1rem;">
                                <?php if($item->obat->foto): ?>
                                    <img src="<?php echo e(asset('storage/' . $item->obat->foto)); ?>" alt="<?php echo e($item->obat->nama_obat); ?>" style="max-height: 100%; max-width: 100%;">
                                <?php else: ?>
                                    <i class="fa-solid fa-pills text-muted fs-3"></i>
                                <?php endif; ?>
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="fw-bold mb-1"><?php echo e($item->obat->nama_obat); ?></h5>
                                <p class="text-muted small mb-0">Rp <?php echo e(number_format($item->harga, 0, ',', '.')); ?> x <?php echo e($item->jumlah_order); ?></p>
                            </div>
                            <div class="text-end me-4">
                                <h6 class="fw-bold text-primary mb-0">Rp <?php echo e(number_format($item->subtotal, 0, ',', '.')); ?></h6>
                            </div>
                            <div>
                                <form action="<?php echo e(route('pelanggan.hapus_keranjang', $item->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus Item">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="text-center py-5">
                            <i class="fa-solid fa-cart-shopping text-muted mb-3" style="font-size: 4rem;"></i>
                            <h4 class="text-muted">Keranjang Anda masih kosong</h4>
                            <a href="<?php echo e(route('pelanggan.katalog')); ?>" class="btn btn-primary mt-3">Mulai Belanja</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm border-0 p-4">
                    <h5 class="fw-bold border-bottom pb-3 mb-3">Ringkasan Belanja</h5>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Total Harga (<?php echo e($keranjangs->count()); ?> barang)</span>
                        <span class="fw-semibold">Rp <?php echo e(number_format($total, 0, ',', '.')); ?></span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-4">
                        <span class="fw-bold">Total Belanja</span>
                        <span class="fw-bold text-primary fs-5">Rp <?php echo e(number_format($total, 0, ',', '.')); ?></span>
                    </div>
                    <a href="<?php echo e(route('pelanggan.checkout')); ?>" class="btn btn-primary w-100 py-2 <?php echo e($keranjangs->count() == 0 ? 'disabled' : ''); ?>">
                        Lanjut ke Pembayaran <i class="fa-solid fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.fe', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\APOTEK_ONLINE\resources\views\pelanggan\keranjang.blade.php ENDPATH**/ ?>