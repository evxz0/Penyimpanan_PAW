<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Documentation - Sistem Inventaris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
                    <button onclick="fetchData()" class="btn btn-primary btn-sm">Coba Langsung (Fetch Data)</button>
                </div>
                
                <!-- Result Container -->
                <div id="result-container" class="mt-3" style="display:none;">
                    <h6>Hasil Response (Live):</h6>
                    <div class="code-block" style="background: #1e1e1e; max-height: 300px; overflow-y: auto;">
                        <pre id="json-output" class="m-0"></pre>
                    </div>
                </div>
            </div>
        </div>

        <script>
        function fetchData() {
            const btn = document.querySelector('button[onclick="fetchData()"]');
            const container = document.getElementById('result-container');
            const output = document.getElementById('json-output');
            
            btn.disabled = true;
            btn.innerText = 'Loading...';
            
            fetch('/api/barang')
                .then(response => response.json())
                .then(data => {
                    container.style.display = 'block';
                    output.innerText = JSON.stringify(data, null, 2);
                    btn.disabled = false;
                    btn.innerText = 'Coba Langsung (Fetch Data)';
                })
                .catch(error => {
                    container.style.display = 'block';
                    output.innerText = 'Error: ' + error;
                    btn.disabled = false;
                    btn.innerText = 'Coba Langsung (Fetch Data)';
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
