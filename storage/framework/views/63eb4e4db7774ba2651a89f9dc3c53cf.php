

<?php $__env->startSection('content'); ?>
<div class="bg-secondary rounded p-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0">Data Pelanggan</h6>
        <?php if(auth()->user()->jabatan != 'pemilik'): ?>
        <a href="<?php echo e(route('pelanggan.create')); ?>" class="btn btn-primary">Tambah Pelanggan</a>
        <?php endif; ?>
    </div>
    <div class="table-responsive">
        <table class="table text-start align-middle table-bordered table-hover mb-0 text-white">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No. Telp</th>
                    <th>Kota</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $pelanggans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($key + 1); ?></td>
                    <td><?php echo e($p->nama_pelanggan); ?></td>
                    <td><?php echo e($p->email); ?></td>
                    <td><?php echo e($p->no_telp); ?></td>
                    <td><?php echo e($p->kota1); ?></td>
                    <td>
                        <?php if(auth()->user()->jabatan != 'pemilik'): ?>
                        <a class="btn btn-sm btn-warning" href="<?php echo e(route('pelanggan.edit', $p->id)); ?>">Edit</a>
                        <form action="<?php echo e(route('pelanggan.destroy', $p->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-sm btn-primary" onclick="return confirm('Hapus?')">Hapus</button>
                        </form>
                        <?php else: ?>
                        -
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\APOTEK_ONLINE\resources\views/pelanggan/index.blade.php ENDPATH**/ ?>