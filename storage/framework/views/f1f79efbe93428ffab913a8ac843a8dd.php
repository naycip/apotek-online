

<?php $__env->startSection('content'); ?>
<div class="bg-secondary rounded p-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0">Daftar Distributor / Supplier</h6>
        <a href="<?php echo e(route('distributor.create')); ?>" class="btn btn-primary">Tambah Distributor</a>
    </div>

    <div class="table-responsive">
        <table class="table text-start align-middle table-bordered table-hover mb-0 text-white">
            <thead>
                <tr class="text-white">
                    <th width="50">No</th>
                    <th>Nama Distributor</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th width="200">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $distributors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($key + 1); ?></td>
                    <td><?php echo e($d->nama_distributor); ?></td>
                    <td><?php echo e($d->telepon); ?></td>
                    <td><?php echo e($d->alamat); ?></td>
                    <td>
                        <a class="btn btn-sm btn-warning" href="<?php echo e(route('distributor.edit', $d->id)); ?>">Edit</a>
                        <form action="<?php echo e(route('distributor.destroy', $d->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm btn-primary" onclick="return confirm('Yakin hapus distributor ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="text-center">Belum ada data distributor.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\APOTEK_ONLINE\resources\views\distributor\index.blade.php ENDPATH**/ ?>