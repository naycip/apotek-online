

<?php $__env->startSection('content'); ?>
<div class="bg-secondary rounded p-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0">Daftar Stok Obat</h6>
        <a href="<?php echo e(route('obat.create')); ?>" class="btn btn-primary">Tambah Obat</a>
    </div>

    <div class="table-responsive">
        <table class="table text-start align-middle table-bordered table-hover mb-0 text-white">
            <thead>
                <tr class="text-white">
                    <th>No</th>
                    <th>Nama Obat</th>
                    <th>Jenis</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $obats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($key + 1); ?></td>
                    <td><?php echo e($o->nama_obat); ?></td>
                    <td><?php echo e($o->jenisObat->jenis ?? 'Tidak Ada Jenis'); ?></td> 
                    <td>Rp <?php echo e(number_format($o->harga_jual, 0, ',', '.')); ?></td>
                    <td><?php echo e($o->stok); ?></td>
                    <td>
                        <a class="btn btn-sm btn-warning" href="<?php echo e(route('obat.edit', $o->id)); ?>">Edit</a>
                        <form action="<?php echo e(route('obat.destroy', $o->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm btn-primary" onclick="return confirm('Hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" class="text-center">Belum ada data obat.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\APOTEK_ONLINE\resources\views/obat/index.blade.php ENDPATH**/ ?>