@extends('layouts.app')

@section('content')
<div class="dashboard-container">

    {{-- Header --}}
    <div class="header-box d-flex justify-content-between align-items-center p-4 rounded mb-4">
        <div>
            <h3 class="fw-bold">Selamat Datang, <span class="text-primary">{{ Auth::user()->name }}</span></h3>
        </div>
        <img src="/assets/char.png" class="header-avatar" alt="">
    </div>

    {{-- 3 Tombol Aksi --}}
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <a href="{{ route('barang.create') }}" class="menu-card tambah">
                <i class="bi bi-plus-circle fs-3"></i> Tambah Barang
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('barang.index') }}" class="menu-card hapus">
                <i class="bi bi-trash fs-3"></i> Hapus Barang
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('barang.index') }}" class="menu-card edit">
                <i class="bi bi-pencil-square fs-3"></i> Edit Barang
            </a>
        </div>
    </div>

    {{-- Konten --}}
    <div class="row g-4">
        
        <div class="col-md-5">
            <div class="box p-3 rounded h-100">
                <h5 class="fw-bold mb-3">Riwayat Barang</h5>                

                @foreach($latest_barangs as $item)
                    <div class="barang-item d-flex justify-content-between mb-2 p-2 rounded">
                        <div>
                            <strong>{{ $item->nama_barang }}</strong><br>
                            <small>Lokasi: {{ $item->lokasi }}</small>
                        </div>
                        <span class="badge {{ $item->kondisi == 'Rusak' ? 'bg-danger' : 'bg-success' }}">
                            {{ $item->kondisi }}
                        </span>
                    </div>
                @endforeach
                
            </div>
        </div>

        <div class="col-md-7">
            <div class="box p-3 rounded h-100">
                <h5 class="fw-bold mb-3 text-center">Inventaris Per Kategori</h5>
                <canvas id="chartKategori"></canvas>
            </div>
        </div>

    </div>
</div>
@endsection

@section('scripts')
<script>
    const ctx = document.getElementById('chartKategori');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json(array_keys($categories)),
            datasets: [{
                label: 'Jumlah',
                data: @json(array_values($categories)),
                backgroundColor: '#0d6efd'
            }]
        }
    });
</script>
@endsection

