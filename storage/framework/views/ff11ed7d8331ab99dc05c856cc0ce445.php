

<?php $__env->startSection('content'); ?>
<div class="bg-secondary rounded p-4">
    <h6 class="mb-4">Update Status Pesanan #<?php echo e($penjualan->id); ?></h6>
    <div class="row">
        <div class="col-md-6">
            <p><strong>Pelanggan:</strong> <?php echo e($penjualan->pelanggan->nama_pelanggan ?? 'Umum'); ?></p>
            <p><strong>Total Bayar:</strong> Rp <?php echo e(number_format($penjualan->total_bayar)); ?></p>
        </div>
    </div>

    <form action="<?php echo e(route('penjualan.update', $penjualan->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="mb-3">
            <label class="form-label">Status Pesanan</label>
            <select name="status_order" class="form-select bg-dark text-white">
                <option value="Menunggu Konfirmasi" <?php echo e($penjualan->status_order == 'Menunggu Konfirmasi' ? 'selected' : ''); ?>>Menunggu Konfirmasi</option>
                <option value="Diproses" <?php echo e($penjualan->status_order == 'Diproses' ? 'selected' : ''); ?>>Diproses (Approve)</option>
                <option value="Menunggu Kurir" <?php echo e($penjualan->status_order == 'Menunggu Kurir' ? 'selected' : ''); ?>>Menunggu Kurir (Sedang Dikirim)</option>
                <option value="Selesai" <?php echo e($penjualan->status_order == 'Selesai' ? 'selected' : ''); ?>>Selesai</option>
                <option value="Bermasalah" <?php echo e($penjualan->status_order == 'Bermasalah' ? 'selected' : ''); ?>>Bermasalah</option>
                <option value="Dibatalkan Penjual" <?php echo e($penjualan->status_order == 'Dibatalkan Penjual' ? 'selected' : ''); ?>>Dibatalkan Penjual (Cancel)</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Metode Pembayaran</label>
            <select name="id_metode_bayar" class="form-select bg-dark text-white" required>
                <option value="" disabled <?php echo e(!$penjualan->id_metode_bayar ? 'selected' : ''); ?>>-- Pilih Metode Pembayaran --</option>
                <?php $__currentLoopData = $metodeBayars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($mb->id); ?>" <?php echo e($penjualan->id_metode_bayar == $mb->id ? 'selected' : ''); ?>>
                        <?php echo e($mb->metode_pembayaran); ?> - <?php echo e($mb->tempat_bayar); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Keterangan (Contoh: No. Resi atau Alasan Batal)</label>
            <textarea name="keterangan_status" class="form-control" rows="3"><?php echo e($penjualan->keterangan_status); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="<?php echo e(route('penjualan.index')); ?>" class="btn btn-outline-light">Batal</a>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\APOTEK_ONLINE\resources\views\penjualan\edit.blade.php ENDPATH**/ ?>