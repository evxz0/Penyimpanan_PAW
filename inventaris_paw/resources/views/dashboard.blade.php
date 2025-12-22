@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1 text-dark fw-bold">Dashboard Overview</h4>
            <p class="text-muted mb-0">Selamat Datang, {{ Auth::user()->name }} 👋</p>
        </div>
        <div>
            <span class="badge bg-light text-dark border px-3 py-2">
                <i class="bi bi-calendar-event me-2"></i> {{ now()->format('d F Y') }}
            </span>
        </div>
    </div>

    <!-- STATISTICS CARDS -->
    <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <div class="card border-0 shadow-sm overflow-hidden h-100">
                <div class="card-body p-4 position-relative">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="bg-primary bg-opacity-10 rounded-3 p-3 text-primary">
                            <i class="bi bi-box-seam fs-3"></i>
                        </div>
                        <span class="badge bg-primary bg-opacity-10 text-primary">+{{ \App\Models\Barang::where('created_at', '>=', now()->subDays(7))->count() }} minggu ini</span>
                    </div>
                    <div>
                        <h6 class="text-muted text-uppercase fw-semibold mb-1" style="font-size: 0.8rem; letter-spacing: 0.5px;">Total Barang</h6>
                        <h2 class="mb-0 fw-bold text-dark">{{ $barangs_count }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card border-0 shadow-sm overflow-hidden h-100">
                <div class="card-body p-4 position-relative">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="bg-success bg-opacity-10 rounded-3 p-3 text-success">
                            <i class="bi bi-layers fs-3"></i>
                        </div>
                         <span class="badge bg-success bg-opacity-10 text-success">Stok Tersedia</span>
                    </div>
                    <div>
                        <h6 class="text-muted text-uppercase fw-semibold mb-1" style="font-size: 0.8rem; letter-spacing: 0.5px;">Total Stok</h6>
                        <h2 class="mb-0 fw-bold text-dark">{{ $stok_count }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card border-0 shadow-sm overflow-hidden h-100">
                <div class="card-body p-4 position-relative">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="bg-info bg-opacity-10 rounded-3 p-3 text-info">
                            <i class="bi bi-tags fs-3"></i>
                        </div>
                        <span class="badge bg-info bg-opacity-10 text-info">{{ count($categories) }} Kategori</span>
                    </div>
                    <div>
                        <h6 class="text-muted text-uppercase fw-semibold mb-1" style="font-size: 0.8rem; letter-spacing: 0.5px;">Kategori</h6>
                        <h2 class="mb-0 fw-bold text-dark">{{ $kategori_count }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CHARTS & HISTORY -->
    <div class="row">
        <!-- CHARTS -->
        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 pt-4 px-4">
                    <h5 class="card-title fw-bold mb-0">Statistik Barang per Kategori</h5>
                </div>
                <div class="card-body p-4">
                     <canvas id="categoryChart" style="max-height: 300px;"></canvas>
                </div>
            </div>
        </div>

        <!-- RECENT ACTIVITY -->
        <div class="col-lg-6 mb-4">
             <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
                    <h5 class="card-title fw-bold mb-0">Barang Masuk & Keluar (Update)</h5>
                    <a href="{{ route('barang.index') }}" class="btn btn-sm btn-light text-primary fw-semibold">Lihat Semua</a>
                </div>
                <div class="card-body p-0">
                    <ul class="nav nav-tabs nav-fill border-0 border-bottom" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active rounded-0 border-0 py-3" id="in-tab" data-bs-toggle="tab" data-bs-target="#in-pane" type="button" role="tab" aria-controls="in-pane" aria-selected="true">Barang Baru Masuk</button>
                        </li>
                        <li class="nav-item" role="presentation">
                             <button class="nav-link rounded-0 border-0 py-3" id="update-tab" data-bs-toggle="tab" data-bs-target="#update-pane" type="button" role="tab" aria-controls="update-pane" aria-selected="false">Barang di-Update</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="in-pane" role="tabpanel" aria-labelledby="in-tab" tabindex="0">
                             <div class="list-group list-group-flush">
                                @forelse($latest_barangs as $barang)
                                <div class="list-group-item px-4 py-3 border-0 d-flex align-items-center">
                                    <div class="bg-primary bg-opacity-10 rounded-circle p-2 text-primary me-3">
                                        <i class="bi bi-download"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0 fw-semibold">{{ $barang->nama_barang }}</h6>
                                        <small class="text-muted">Stok: {{ $barang->stok }} • {{ $barang->kategori }}</small>
                                    </div>
                                    <small class="text-muted">{{ $barang->created_at->diffForHumans() }}</small>
                                </div>
                                @empty
                                <div class="text-center py-4 text-muted">Belum ada data.</div>
                                @endforelse
                             </div>
                        </div>
                        <div class="tab-pane fade" id="update-pane" role="tabpanel" aria-labelledby="update-tab" tabindex="0">
                            <div class="list-group list-group-flush">
                                @forelse($updated_barangs as $barang)
                                <div class="list-group-item px-4 py-3 border-0 d-flex align-items-center">
                                    <div class="bg-warning bg-opacity-10 rounded-circle p-2 text-warning me-3">
                                        <i class="bi bi-arrow-repeat"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0 fw-semibold">{{ $barang->nama_barang }}</h6>
                                        <small class="text-muted">Stok: {{ $barang->stok }} • {{ $barang->kategori }}</small>
                                    </div>
                                    <small class="text-muted">{{ $barang->updated_at->diffForHumans() }}</small>
                                </div>
                                @empty
                                <div class="text-center py-4 text-muted">Belum ada data.</div>
                                @endforelse
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('categoryChart').getContext('2d');
        const categories = @json(array_keys($categories));
        const data = @json(array_values($categories));
        
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: categories,
                datasets: [{
                    label: 'Jumlah Barang',
                    data: data,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                    }
                }
            }
        });
    });
</script>
@endsection
