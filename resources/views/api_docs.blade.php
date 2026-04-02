<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Documentation - Sistem Inventaris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f8f9fa; }
        .method-badge { width: 80px; text-align: center; }
        .card { margin-bottom: 20px; border: none; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .code-block { background: #2d2d2d; color: #f8f8f2; padding: 15px; border-radius: 5px; font-family: 'Consolas', monospace; }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container">
            <span class="navbar-brand mb-0 h1">📦 API Documentation - Sistem Inventaris</span>
            <a href="/" class="btn btn-outline-light btn-sm">Kembali ke Aplikasi</a>
        </div>
    </nav>

    <div class="container">
        <div class="alert alert-info">
            <strong>Base URL:</strong> <code>{{ url('/api') }}</code><br>
            Gunakan Endpoint ini untuk integrasi dengan aplikasi lain (Mobile App, Frontend Terpisah, dll).
        </div>

        <!-- GET Index -->
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <span class="badge bg-success me-3 method-badge">GET</span>
                <code class="fs-5">/api/barang</code>
                <span class="ms-auto text-muted">Ambil Semua Data Barang</span>
            </div>
            <div class="card-body">
                <p>Mengembalikan daftar semua barang yang tersimpan dalam database.</p>
                <h6>Contoh Response (JSON):</h6>
                <div class="code-block">
{
  "success": true,
  "message": "List Data Barang",
  "data": [
    {
      "id": 1,
      "nama_barang": "Contoh Barang",
      "kategori": "Elektronik",
      "stok": 10,
      "lokasi": "Gudang Utama",
      "created_at": "2024-01-01 10:00:00",
      "updated_at": "2024-01-01 10:00:00"
    }
  ]
}
                </div>
                <div class="mt-3">
                    <button onclick="fetchData()" class="btn btn-primary btn-sm">
                        <i class="bi bi-cloud-download"></i> Load Data via API
                    </button>
                    <small class="text-muted ms-2">*Klik untuk simulasi Client App mengambil data</small>
                </div>
                
                <!-- Result Container (Table UI) -->
                <div id="result-container" class="mt-4" style="display:none;">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="m-0">Hasil Response (Rendered UI):</h6>
                        <span class="badge bg-success">Status: 200 OK</span>
                    </div>

                    <div class="table-responsive shadow-sm" style="border-radius: 8px; overflow: hidden;">
                        <table class="table table-hover mb-0" style="vertical-align: middle;">
                            <thead style="background-color: #87CEEB; color: #000;">
                                <tr>
                                    <th class="py-3 ps-4">ID</th>
                                    <th class="py-3">Nama Barang</th>
                                    <th class="py-3">Kategori</th>
                                    <th class="py-3">Lokasi</th>
                                    <th class="py-3">Stok</th>
                                    <th class="py-3 text-center">Status</th>
                                    <th class="py-3 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="table-body" class="bg-white">
                                <!-- Data rows will be inserted here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script>
        function fetchData() {
            const btn = document.querySelector('button[onclick="fetchData()"]');
            const container = document.getElementById('result-container');
            const tbody = document.getElementById('table-body');
            
            btn.disabled = true;
            btn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Loading...';
            
            fetch('/api/barang')
                .then(response => response.json())
                .then(response => {
                    // Reset UI
                    container.style.display = 'block';
                    tbody.innerHTML = '';
                    
                    if(response.success && response.data.length > 0) {
                        response.data.forEach(item => {
                            // Logic status sederhana
                            let statusBadge = item.stok > 0 
                                ? '<span class="badge rounded-pill bg-success bg-opacity-25 text-success border border-success">Tersedia</span>'
                                : '<span class="badge rounded-pill bg-danger bg-opacity-25 text-danger border border-danger">Habis</span>';

                            let row = `
                                <tr>
                                    <td class="ps-4 fw-bold text-muted">#DATA-${item.id}</td>
                                    <td class="fw-bold">${item.nama_barang}</td>
                                    <td>${item.kategori}</td>
                                    <td>${item.lokasi}</td>
                                    <td class="fw-bold">${item.stok}</td>
                                    <td class="text-center">${statusBadge}</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-light text-primary"><i class="bi bi-eye"></i></button>
                                        <button class="btn btn-sm btn-light text-warning"><i class="bi bi-pencil-square"></i></button>
                                        <button class="btn btn-sm btn-light text-danger"><i class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                            `;
                            tbody.innerHTML += row;
                        });
                    } else {
                        tbody.innerHTML = '<tr><td colspan="7" class="text-center py-4 text-muted">Tidak ada data ditemukan</td></tr>';
                    }

                    btn.disabled = false;
                    btn.innerHTML = '<i class="bi bi-cloud-download"></i> Load Data via API';
                })
                .catch(error => {
                    alert('Error fetch data: ' + error);
                    btn.disabled = false;
                    btn.innerHTML = '<i class="bi bi-cloud-download"></i> Load Data via API';
                });
        }
        </script>

        <!-- GET Show -->
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <span class="badge bg-success me-3 method-badge">GET</span>
                <code class="fs-5">/api/barang/{id}</code>
                <span class="ms-auto text-muted">Ambil Detail Barang</span>
            </div>
            <div class="card-body">
                <p>Mengembalikan detail satu barang berdasarkan ID.</p>
                <h6>Contoh Request:</h6>
                <code>GET /api/barang/1</code>
            </div>
        </div>

        <!-- POST Store -->
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <span class="badge bg-warning text-dark me-3 method-badge">POST</span>
                <code class="fs-5">/api/barang</code>
                <span class="ms-auto text-muted">Tambah Barang Baru</span>
            </div>
            <div class="card-body">
                <p>Menambahkan data barang baru ke sistem.</p>
                <h6>Body Parameters (JSON):</h6>
                <div class="code-block">
{
  "nama_barang": "Laptop Gaming",
  "kategori": "Elektronik",
  "stok": 5,
  "lokasi": "Rak A1"
}
                </div>
            </div>
        </div>

        <!-- PUT Update -->
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <span class="badge bg-primary me-3 method-badge">PUT</span>
                <code class="fs-5">/api/barang/{id}</code>
                <span class="ms-auto text-muted">Update Data Barang</span>
            </div>
            <div class="card-body">
                <p>Memperbarui data barang yang sudah ada.</p>
            </div>
        </div>

        <!-- DELETE Destroy -->
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <span class="badge bg-danger me-3 method-badge">DELETE</span>
                <code class="fs-5">/api/barang/{id}</code>
                <span class="ms-auto text-muted">Hapus Barang</span>
            </div>
            <div class="card-body">
                <p>Menghapus data barang secara permanen dari sistem.</p>
            </div>
        </div>

    </div>
    
    <footer class="text-center py-4 text-muted">
        <small>&copy; {{ date('Y') }} Sistem Inventaris PAW</small>
    </footer>
</body>
</html>
