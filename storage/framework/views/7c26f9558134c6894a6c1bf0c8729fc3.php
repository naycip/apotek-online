

<?php $__env->startSection('content'); ?>
<div class="bg-secondary rounded h-100 p-4">
    <h6 class="mb-4">Tambah Pembelian Stok (Ke Distributor)</h6>
    
    <form action="<?php echo e(route('pembelian.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Nomor Nota</label>
                    <input type="text" name="nonota" class="form-control" placeholder="Contoh: INV-2024-001" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Pembelian</label>
                    <input type="date" name="tgl_pembelian" class="form-control" value="<?php echo e(date('Y-m-d')); ?>" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Pilih Distributor</label>
                    <select name="id_distributor" class="form-select bg-dark text-white" required>
                        <option value="">-- Pilih Distributor --</option>
                        <?php $__currentLoopData = $distributors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($d->id); ?>"><?php echo e($d->nama_distributor); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Total Bayar (Rp)</label>
                    <input type="number" name="total_bayar" class="form-control" placeholder="0" required>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
            <a href="<?php echo e(route('pembelian.index')); ?>" class="btn btn-outline-light ms-2">Batal</a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\APOTEK_ONLINE\resources\views\pembelian\create.blade.php ENDPATH**/ ?>