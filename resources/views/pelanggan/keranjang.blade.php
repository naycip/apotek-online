@extends('layouts.fe')
@section('title', 'Keranjang Belanja | ApotekKu')

@section('content')
<section class="section" style="margin-top: 80px; min-height: 80vh;">
    <div class="container py-5">
        <h2 class="fw-bold mb-4">Keranjang Belanja</h2>

        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card p-0 overflow-hidden shadow-sm border-0">
                    @forelse($keranjangs as $item)
                        <div class="d-flex align-items-center p-3 border-bottom">
                            <div style="width: 80px; height: 80px; background: #f1f3f5; border-radius: 10px; display: flex; align-items: center; justify-content: center; overflow: hidden; margin-right: 1rem;">
                                @if($item->obat->foto)
                                    <img src="{{ asset('storage/' . $item->obat->foto) }}" alt="{{ $item->obat->nama_obat }}" style="max-height: 100%; max-width: 100%;">
                                @else
                                    <i class="fa-solid fa-pills text-muted fs-3"></i>
                                @endif
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="fw-bold mb-1">{{ $item->obat->nama_obat }}</h5>
                                <p class="text-muted small mb-0">Rp {{ number_format($item->harga, 0, ',', '.') }} x {{ $item->jumlah_order }}</p>
                            </div>
                            <div class="text-end me-4">
                                <h6 class="fw-bold text-primary mb-0">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</h6>
                            </div>
                            <div>
                                <form action="{{ route('pelanggan.hapus_keranjang', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus Item">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-5">
                            <i class="fa-solid fa-cart-shopping text-muted mb-3" style="font-size: 4rem;"></i>
                            <h4 class="text-muted">Keranjang Anda masih kosong</h4>
                            <a href="{{ route('pelanggan.katalog') }}" class="btn btn-primary mt-3">Mulai Belanja</a>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm border-0 p-4">
                    <h5 class="fw-bold border-bottom pb-3 mb-3">Ringkasan Belanja</h5>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Total Harga ({{ $keranjangs->count() }} barang)</span>
                        <span class="fw-semibold">Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-4">
                        <span class="fw-bold">Total Belanja</span>
                        <span class="fw-bold text-primary fs-5">Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                    <a href="{{ route('pelanggan.checkout') }}" class="btn btn-primary w-100 py-2 {{ $keranjangs->count() == 0 ? 'disabled' : '' }}">
                        Lanjut ke Pembayaran <i class="fa-solid fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
