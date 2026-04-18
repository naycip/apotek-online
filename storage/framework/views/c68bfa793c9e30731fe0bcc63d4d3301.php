

<?php $__env->startSection('content'); ?>
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0 text-white">Daftar Jenis Pengiriman</h6>
            <?php if(auth()->user()->jabatan != 'pemilik'): ?>
            <a href="<?php echo e(route('jenispengiriman.create')); ?>" class="btn btn-primary">Tambah Data</a>
            <?php endif; ?>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                        <th scope="col">No</th>
                        <th scope="col">Nama Ekspedisi</th>
                        <th scope="col">Jenis Layanan</th>
                        <th scope="col">Logo</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $jenis_kirims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="text-white">
                        <td><?php echo e($key + 1); ?></td>
                        <td><?php echo e($j->nama_ekspedisi); ?></td>
                        <td><span class="badge bg-info"><?php echo e($j->jenis_kirim); ?></span></td>
                        <td>
                            <?php if($j->logo_ekspedisi): ?>
                                <img src="<?php echo e(asset($j->logo_ekspedisi)); ?>" width="50" class="rounded">
                            <?php else: ?>
                                <span class="text-muted">Tidak ada logo</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if(auth()->user()->jabatan != 'pemilik'): ?>
                            <a class="btn btn-sm btn-warning" href="<?php echo e(route('jenispengiriman.edit', $j->id)); ?>">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <form action="<?php echo e(route('jenispengiriman.destroy', $j->id)); ?>" method="POST" style="display:inline;">
                                <?php echo csrf_field(); ?> 
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-primary" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                    <i class="fa fa-trash"></i> Hapus
                                </button>
                            </form>
                            <?php else: ?>
                            -
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="text-center text-danger">Data belum tersedia di database.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\APOTEK_ONLINE\resources\views\jenis_kirim\index.blade.php ENDPATH**/ ?>