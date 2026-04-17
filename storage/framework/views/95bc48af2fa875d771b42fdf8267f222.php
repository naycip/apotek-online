<?php $__env->startSection('content'); ?>
<div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
            <i class="fa fa-users fa-3x text-primary"></i>
            <div class="ms-3">
                <p class="mb-2">Total User</p>
                <h6 class="mb-0"><?php echo e($total_user); ?></h6>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
            <i class="fa fa-medkit fa-3x text-primary"></i>
            <div class="ms-3">
                <p class="mb-2">Total Obat</p>
                <h6 class="mb-0"><?php echo e($total_obat); ?></h6>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
            <i class="fa fa-shopping-cart fa-3x text-primary"></i>
            <div class="ms-3">
                <p class="mb-2">Total Penjualan</p>
                <h6 class="mb-0"><?php echo e($total_penjualan); ?></h6>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
            <i class="fa fa-chart-line fa-3x text-primary"></i>
            <div class="ms-3">
                <p class="mb-2">Total Pendapatan</p>
                <h6 class="mb-0">Rp <?php echo e(number_format($pendapatan, 0, ',', '.')); ?></h6>
            </div>
        </div>
    </div>
</div>

<div class="bg-secondary text-center rounded p-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0">Penjualan Terbaru</h6>
        <a href="<?php echo e(route('penjualan.index')); ?>">Lihat Semua</a>
    </div>
    <div class="table-responsive">
        <table class="table text-start align-middle table-bordered table-hover mb-0 text-white">
            <thead>
                <tr>
                    <th>Tgl Penjualan</th>
                    <th>Pelanggan</th>
                    <th>Total Bayar</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $penjualan_terbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($p->tgl_penjualan); ?></td>
                    <td><?php echo e($p->pelanggan->nama_pelanggan ?? 'Umum'); ?></td>
                    <td>Rp <?php echo e(number_format($p->total_bayar, 0, ',', '.')); ?></td>
                    <td><span class="badge bg-primary"><?php echo e($p->status_order); ?></span></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="4" class="text-center">Belum ada data penjualan.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\APOTEK_ONLINE\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>