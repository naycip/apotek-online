

<?php $__env->startSection('content'); ?>
<div class="bg-secondary rounded p-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0">Daftar Pembelian (Stok Masuk)</h6>
        <a href="<?php echo e(route('pembelian.create')); ?>" class="btn btn-primary">Tambah Pembelian Baru</a>
    </div>

    <div class="table-responsive">
        <table class="table text-start align-middle table-bordered table-hover mb-0 text-white">
            <thead>
                <tr class="text-white">
                    <th width="50">No</th>
                    <th>No. Nota</th>
                    <th>Tanggal Pembelian</th>
                    <th>Distributor</th>
                    <th>Total Bayar</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $pembelians; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($key + 1); ?></td>
                    <td><?php echo e($p->nonota); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($p->tgl_pembelian)->format('d M Y')); ?></td>
                    <td><?php echo e($p->distributor->nama_distributor ?? 'N/A'); ?></td>
                    <td>Rp <?php echo e(number_format($p->total_bayar, 0, ',', '.')); ?></td>
                    <td>
                        <a class="btn btn-sm btn-warning" href="<?php echo e(route('pembelian.edit', $p->id)); ?>">Edit</a>
                        <form action="<?php echo e(route('pembelian.destroy', $p->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm btn-primary" onclick="return confirm('Hapus data pembelian ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" class="text-center">Belum ada data pembelian.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\APOTEK_ONLINE\resources\views/pembelian/index.blade.php ENDPATH**/ ?>