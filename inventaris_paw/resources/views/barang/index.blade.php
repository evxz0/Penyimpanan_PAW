@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-0 fw-bold text-dark">Daftar Barang</h4>
            <small class="text-muted">Mengelola data pengambilan via API</small>
        </div>
        <div class="d-flex gap-2">
            <!-- Search bar mockup -->
            <input type="text" class="form-control" placeholder="Cari barang..." style="width: 250px;">
            <a href="{{ route('barang.create') }}" class="btn btn-primary d-flex align-items-center">
                <i class="bi bi-plus-circle me-1"></i> Tambah
            </a>
        </div>
    </div>

    <!-- Container Utama untuk Data API -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <!-- Loading Spinner Initially -->
            <div id="loading-spinner" class="text-center py-5">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p class="mt-2 text-muted">Mengambil data dari API...</p>
            </div>

            <!-- Tabel Data -->
            <div id="data-container" style="display:none;" class="table-responsive">
                <table class="table table-hover mb-0 align-middle">
                    <thead style="background-color: #87CEEB;">
                        <tr>
                            <th class="py-3 ps-4 text-nowrap">Kode Barang <i class="bi bi-funnel"></i></th>
                            <th class="py-3 text-nowrap">Brand <i class="bi bi-funnel"></i></th>
                            <th class="py-3 text-nowrap">Nama Barang <i class="bi bi-funnel"></i></th>
                            <th class="py-3 text-nowrap">Kategori <i class="bi bi-funnel"></i></th>
                            <th class="py-3 text-nowrap">Stok <i class="bi bi-funnel"></i></th>
                            <th class="py-3 text-center text-nowrap">Status <i class="bi bi-funnel"></i></th>
                            <th class="py-3 text-center text-nowrap">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="api-table-body" class="bg-white">
                        <!-- Data will be injected here via JS -->
                    </tbody>
                </table>
            
                <div class="d-flex justify-content-end bg-light p-3 border-top">
                    <!-- Pagination Mockup -->
                    <div class="btn-group btn-group-sm">
                        <button class="btn btn-outline-secondary">Previous</button>
                        <button class="btn btn-primary">1</button>
                        <button class="btn btn-outline-secondary">2</button>
                        <button class="btn btn-outline-secondary">3</button>
                        <button class="btn btn-outline-secondary">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    fetchDataBarang();
});

function fetchDataBarang() {
    const url = '/api/barang'; // Endpoint API kita
    const loading = document.getElementById('loading-spinner');
    const container = document.getElementById('data-container');
    const tbody = document.getElementById('api-table-body');

    fetch(url)
        .then(response => response.json())
        .then(res => {
            // Sembunyikan loading
            loading.style.display = 'none';
            container.style.display = 'block';

            tbody.innerHTML = ''; // Clear existing

            if(res.success && res.data.length > 0) {
                res.data.forEach((item, index) => {
                    // Generate Mock Brand/Kode (karena di DB belum ada)
                    const kodeBarang = 'BRG' + String(item.id).padStart(3, '0');
                    const mockBrand = ['AER', 'Bolde', 'Phillips', 'Unknown'][Math.floor(Math.random() * 4)];
                    
                    // Logic Status
                    const statusHtml = item.stok > 10 
                        ? '<span class="badge rounded-pill bg-success bg-opacity-25 text-success border border-success px-3">Baik</span>'
                        : '<span class="badge rounded-pill bg-warning bg-opacity-25 text-warning border border-warning px-3">Menipis</span>';

                    const row = `
                        <tr>
                            <td class="ps-4 fw-bold">${kodeBarang}</td>
                            <td>${mockBrand}</td>
                            <td class="fw-bold">${item.nama_barang}</td>
                            <td>${item.kategori}</td>
                            <td class="fw-bold fs-5">${item.stok}</td>
                            <td class="text-center">${statusHtml}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="/barang/${item.id}" class="btn btn-link text-dark p-1"><i class="bi bi-eye"></i></a>
                                    <a href="/barang/${item.id}/edit" class="btn btn-link text-dark p-1"><i class="bi bi-pencil-square"></i></a>
                                    <button onclick="deleteBarang(${item.id})" class="btn btn-link text-dark p-1"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    `;
                    tbody.innerHTML += row;
                });
            } else {
                tbody.innerHTML = '<tr><td colspan="7" class="text-center py-5">Tidak ada data ditemukan</td></tr>';
            }
        })
        .catch(err => {
            console.error(err);
            loading.innerHTML = '<p class="text-danger">Gagal memuat data API.</p>';
        });
}

function deleteBarang(id) {
    if(confirm('Yakin ingin menghapus?')) {
        fetch(`/api/barang/${id}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(res => res.json())
        .then(data => {
            alert('Berhasil dihapus!');
            fetchDataBarang(); // Refresh data
        });
    }
}
</script>
@endsection
