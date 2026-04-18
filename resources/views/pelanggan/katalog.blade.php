@extends('layouts.fe')
@section('title', 'Belanja Obat | ApotekKu')

@section('content')
<section class="section" style="margin-top: 80px; min-height: 80vh;">
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Katalog Obat</h2>
            <div class="input-group w-25">
                <input type="text" class="form-control" placeholder="Cari obat...">
                <button class="btn btn-outline-secondary" type="button"><i class="fa-solid fa-search"></i></button>
            </div>
        </div>

        <div class="row g-4">
            @forelse($obats as $obat)
                <div class="col-md-4 col-lg-3">
                    <div class="card h-100 p-0 overflow-hidden text-center shadow-sm border-0" style="transition: transform 0.3s; margin-bottom: 0;">
                        <div style="height: 180px; background: #f1f3f5; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                            @if($obat->foto)
                                <img src="{{ asset('storage/' . $obat->foto) }}" alt="{{ $obat->nama_obat }}" style="max-height: 100%; max-width: 100%; object-fit: contain;">
                            @else
                                <i class="fa-solid fa-pills text-muted" style="font-size: 4rem;"></i>
                            @endif
                        </div>
                        <div class="card-body p-3">
                            <h5 class="fw-bold text-truncate" title="{{ $obat->nama_obat }}">{{ $obat->nama_obat }}</h5>
                            <p class="text-muted small mb-2">{{ Str::limit($obat->deskripsi ?? 'Tidak ada deskripsi', 50) }}</p>
                            <h5 class="text-primary fw-bold mb-3">Rp {{ number_format($obat->harga_jual, 0, ',', '.') }}</h5>
                            
                            <form action="{{ route('pelanggan.tambah_keranjang', $obat->id) }}" method="POST">
                                @csrf
                                <div class="input-group mb-2">
                                    <span class="input-group-text">Qty</span>
                                    <input type="number" name="qty" class="form-control text-center" value="1" min="1" max="{{ $obat->stok }}">
                                </div>
                                <button type="submit" class="btn btn-primary w-100" {{ $obat->stok < 1 ? 'disabled' : '' }}>
                                    <i class="fa-solid fa-cart-plus me-1"></i> {{ $obat->stok < 1 ? 'Stok Habis' : 'Tambah' }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="fa-solid fa-box-open text-muted mb-3" style="font-size: 4rem;"></i>
                    <h4 class="text-muted">Katalog obat masih kosong</h4>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
