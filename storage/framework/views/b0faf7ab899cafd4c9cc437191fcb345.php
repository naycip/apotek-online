<?php $__env->startSection('title', 'Checkout | ApotekKu'); ?>

<?php $__env->startSection('content'); ?>
<section class="section" style="margin-top: 80px; min-height: 80vh;">
    <div class="container py-5">
        <h2 class="fw-bold mb-4">Checkout Pesanan</h2>

        <form action="<?php echo e(route('pelanggan.proses_checkout')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="row g-4">
                <div class="col-lg-8">
                    <!-- Alamat Pengiriman -->
                    <div class="card shadow-sm border-0 p-4 mb-4">
                        <h5 class="fw-bold border-bottom pb-3 mb-3"><i class="fa-solid fa-location-dot text-danger me-2"></i> Alamat Pengiriman</h5>
                        <div class="mb-3">
                            <label class="form-label text-muted">Alamat Lengkap</label>
                            <textarea name="alamat_lengkap" class="form-control" rows="3" required placeholder="Tuliskan alamat lengkap pengiriman..."><?php echo e(Auth::guard('pelanggan')->user()->alamat1); ?></textarea>
                            <small class="text-muted">Pastikan alamat sesuai agar kurir mudah menemukan lokasi Anda.</small>
                        </div>
                    </div>

                    <!-- Pilihan Kurir & Pembayaran -->
                    <div class="card shadow-sm border-0 p-4 mb-4">
                        <h5 class="fw-bold border-bottom pb-3 mb-3"><i class="fa-solid fa-truck text-primary me-2"></i> Kurir & Pembayaran</h5>
                        
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label text-muted">Pilih Kurir / Jenis Pengiriman</label>
                                <select name="id_jenis_kirim" class="form-select" required>
                                    <option value="">-- Pilih Pengiriman --</option>
                                    <?php $__currentLoopData = $jenis_kirims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kirim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($kirim->id); ?>"><?php echo e($kirim->nama_ekspedisi); ?> - <?php echo e(Str::title($kirim->jenis_kirim)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted">Pilih Metode Pembayaran</label>
                                <select name="id_metode_bayar" class="form-select" required>
                                    <option value="">-- Pilih Pembayaran --</option>
                                    <?php $__currentLoopData = $metode_bayars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bayar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($bayar->id); ?>"><?php echo e($bayar->tempat_bayar); ?> - <?php echo e($bayar->metode_pembayaran); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Upload Resep -->
                    <div class="card shadow-sm border-0 p-4">
                        <h5 class="fw-bold border-bottom pb-3 mb-3"><i class="fa-solid fa-file-prescription text-success me-2"></i> Resep Dokter (Opsional)</h5>
                        <p class="text-muted small">Jika pesanan Anda mengandung obat keras yang memerlukan resep dokter, silakan unggah foto resep di sini.</p>
                        <input type="file" name="url_resep" class="form-control">
                    </div>
                </div>

                <!-- Ringkasan Order -->
                <div class="col-lg-4">
                    <div class="card shadow-sm border-0 p-4 sticky-top" style="top: 100px;">
                        <h5 class="fw-bold border-bottom pb-3 mb-3">Ringkasan Pesanan</h5>
                        
                        <div class="mb-3">
                            <?php $__currentLoopData = $keranjangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="d-flex justify-content-between small mb-2">
                                    <span class="text-truncate pe-2"><?php echo e($item->obat->nama_obat); ?> (x<?php echo e($item->jumlah_order); ?>)</span>
                                    <span>Rp <?php echo e(number_format($item->subtotal, 0, ',', '.')); ?></span>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-2 small text-muted">
                            <span>Total Harga Barang</span>
                            <span>Rp <?php echo e(number_format($total_belanja, 0, ',', '.')); ?></span>
                        </div>
                        <div class="d-flex justify-content-between mb-2 small text-muted">
                            <span>Estimasi Ongkos Kirim</span>
                            <span>Rp 15.000</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3 small text-muted">
                            <span>Biaya Aplikasi</span>
                            <span>Rp 2.000</span>
                        </div>
                        <div class="d-flex justify-content-between mb-4 border-top pt-3">
                            <span class="fw-bold">Total Pembayaran</span>
                            <span class="fw-bold text-primary fs-5">Rp <?php echo e(number_format($total_belanja + 17000, 0, ',', '.')); ?></span>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-3">
                            Buat Pesanan Sekarang
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.fe', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\APOTEK_ONLINE\resources\views\pelanggan\checkout.blade.php ENDPATH**/ ?>