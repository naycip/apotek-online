

<?php $__env->startSection('content'); ?>
<div class="bg-secondary rounded p-4">
    <div class="d-flex justify-content-between mb-4">
        <h6>Metode Pembayaran</h6>
        <?php if(auth()->user()->jabatan != 'pemilik'): ?>
        <a href="<?php echo e(route('metodebayar.create')); ?>" class="btn btn-primary">Tambah Metode</a>
        <?php endif; ?>
    </div>
    <div class="table-responsive">
        <table class="table text-start align-middle table-bordered table-hover mb-0 text-white">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Logo</th>
                    <th>Metode</th>
                    <th>Bank/Tempat</th>
                    <th>No. Rekening</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $metodebayars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td>
                        <?php if($m->url_logo): ?>
                            <img src="<?php echo e(asset('storage/pembayaran/'.$m->url_logo)); ?>" width="50" class="rounded">
                        <?php else: ?>
                            <i class="fa fa-credit-card"></i>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($m->metode_pembayaran); ?></td>
                    <td><?php echo e($m->tempat_bayar); ?></td>
                    <td><?php echo e($m->no_rekening); ?></td>
                    <td>
                        <?php if(auth()->user()->jabatan != 'pemilik'): ?>
                        <a href="<?php echo e(route('metodebayar.edit', $m->id)); ?>" class="btn btn-sm btn-warning">Edit</a>
                        <form action="<?php echo e(route('metodebayar.destroy', $m->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-sm btn-primary" onclick="return confirm('Yakin?')">Hapus</button>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\APOTEK_ONLINE\resources\views/metode_bayar/index.blade.php ENDPATH**/ ?>