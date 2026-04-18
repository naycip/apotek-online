<?php $__env->startSection('content'); ?>
<div class="bg-secondary rounded p-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0">Detail Transaksi Penjualan #<?php echo e($penjualan->id); ?></h6>
        <a href="<?php echo e(route('penjualan.index')); ?>" class="btn btn-outline-light">Kembali</a>
    </div>

    <div class="row mb-4">
        <div class="col-sm-6">
            <div class="card bg-dark text-white border-0">
                <div class="card-body">
                    <h6 class="card-title text-primary">Informasi Pelanggan</h6>
                    <p class="mb-1"><strong>Nama:</strong> <?php echo e($penjualan->pelanggan->nama_pelanggan ?? 'Pelanggan Umum'); ?></p>
                    <p class="mb-1"><strong>No. Telp:</strong> <?php echo e($penjualan->pelanggan->no_telp ?? '-'); ?></p>
                    <p class="mb-0"><strong>Alamat:</strong> <?php echo e($penjualan->pelanggan->alamat1 ?? '-'); ?></p>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card bg-dark text-white border-0">
                <div class="card-body">
                    <h6 class="card-title text-primary">Informasi Pesanan</h6>
                    <p class="mb-1"><strong>Tanggal:</strong> <?php echo e(date('d F Y H:i', strtotime($penjualan->tgl_penjualan))); ?></p>
                    <p class="mb-1"><strong>Metode Bayar:</strong> <?php echo e($penjualan->metodeBayar->metode_pembayaran ?? '-'); ?></p>
                    <p class="mb-1"><strong>Jenis Kirim:</strong> <?php echo e($penjualan->jenisKirim->jenis_pengiriman ?? '-'); ?></p>
                    <p class="mb-0">
                        <strong>Status:</strong> 
                        <span class="badge bg-<?php echo e($penjualan->status_order == 'Selesai' ? 'success' : 'warning'); ?>">
                            <?php echo e($penjualan->status_order); ?>

                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <?php if($penjualan->url_resep): ?>
    <div class="mb-4">
        <h6 class="text-primary">Resep Dokter</h6>
        <img src="<?php echo e(asset('storage/resep/' . $penjualan->url_resep)); ?>" alt="Resep" style="max-width: 100%; border-radius: 5px;">
    </div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table text-start align-middle table-bordered table-hover mb-0 text-white">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Obat</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $penjualan->detailPenjualans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($key + 1); ?></td>
                    <td><?php echo e($detail->obat->nama_obat ?? 'Obat tidak ditemukan'); ?></td>
                    <td>Rp <?php echo e(number_format($detail->harga_beli, 0, ',', '.')); ?></td>
                    <td><?php echo e($detail->jumlah_beli); ?></td>
                    <td>Rp <?php echo e(number_format($detail->subtotal, 0, ',', '.')); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4" class="text-end">Total Harga Obat</th>
                    <th>Rp <?php echo e(number_format($penjualan->detailPenjualans->sum('subtotal'), 0, ',', '.')); ?></th>
                </tr>
                <tr>
                    <th colspan="4" class="text-end">Ongkos Kirim</th>
                    <th>Rp <?php echo e(number_format($penjualan->ongkos_kirim, 0, ',', '.')); ?></th>
                </tr>
                <tr>
                    <th colspan="4" class="text-end">Biaya Aplikasi</th>
                    <th>Rp <?php echo e(number_format($penjualan->biaya_app, 0, ',', '.')); ?></th>
                </tr>
                <tr>
                    <th colspan="4" class="text-end text-primary">TOTAL BAYAR</th>
                    <th class="text-primary">Rp <?php echo e(number_format($penjualan->total_bayar, 0, ',', '.')); ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\APOTEK_ONLINE\resources\views\penjualan\show.blade.php ENDPATH**/ ?>