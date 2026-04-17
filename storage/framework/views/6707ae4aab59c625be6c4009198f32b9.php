

<?php $__env->startSection('content'); ?>
<div class="bg-secondary rounded p-4">
    <h6 class="mb-4">Daftar Transaksi Penjualan</h6>
    <div class="table-responsive">
        <table class="table text-start align-middle table-bordered table-hover mb-0 text-white">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th>Total Bayar</th>
                    <th>Metode</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $penjualans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($p->tgl_penjualan); ?></td>
                    <td><?php echo e($p->pelanggan->nama_pelanggan ?? 'Umum'); ?></td>
                    <td>Rp <?php echo e(number_format($p->total_bayar)); ?></td>
                    <td><?php echo e($p->metodeBayar->metode_pembayaran ?? '-'); ?></td>
                    <td>
                        <span class="badge bg-<?php echo e($p->status_order == 'Selesai' ? 'success' : 'warning'); ?>">
                            <?php echo e($p->status_order); ?>

                        </span>
                    </td>
                    <td>
                        <a class="btn btn-sm btn-info" href="<?php echo e(route('penjualan.show', $p->id)); ?>">Detail</a>
                        <?php if(auth()->user()->jabatan == 'kasir' || auth()->user()->jabatan == 'admin'): ?>
                        <a class="btn btn-sm btn-warning" href="<?php echo e(route('penjualan.edit', $p->id)); ?>">Update Status</a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\APOTEK_ONLINE\resources\views/penjualan/index.blade.php ENDPATH**/ ?>