

<?php $__env->startSection('content'); ?>
<div class="bg-secondary text-center rounded p-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0">Data Jenis Obat</h6>
        <a href="<?php echo e(route('jenisobat.create')); ?>" class="btn btn-primary">Tambah Jenis</a>
    </div>
    <div class="table-responsive">
        <table class="table text-start align-middle table-bordered table-hover mb-0 text-white">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Icon</th>
                    <th>Nama Jenis</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $jenis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($key + 1); ?></td>
                    <td>
                        <?php if($j->image_url): ?>
                            <img src="<?php echo e(asset('storage/jenis_obat/'.$j->image_url)); ?>" width="50px" class="rounded">
                        <?php else: ?>
                            <i class="fa fa-pills text-primary"></i>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($j->jenis); ?></td>
                    <td><?php echo e($j->deskripsi_jenis); ?></td>
                    <td>
                        <a class="btn btn-sm btn-warning" href="<?php echo e(route('jenisobat.edit', $j->id)); ?>">Edit</a>
                        <form action="<?php echo e(route('jenisobat.destroy', $j->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm btn-primary" onclick="return confirm('Hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\APOTEK_ONLINE\resources\views/jenis_obat/index.blade.php ENDPATH**/ ?>