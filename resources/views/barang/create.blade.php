@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">
            <i class="bi bi-plus-circle"></i> Tambah Barang
        </h4>
        <a href="{{ route('barang.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-4">
            <form method="POST" action="{{ route('barang.store') }}">
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="nama_barang" class="form-label fw-semibold">Nama Barang</label>
                        <input type="text" 
                               class="form-control @error('nama_barang') is-invalid @enderror" 
                               id="nama_barang" 
                               name="nama_barang" 
                               placeholder="Nama Barang"
                               value="{{ old('nama_barang') }}"
                               required>
                        @error('nama_barang')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="kategori" class="form-label fw-semibold">Kategori</label>
                        <input type="text" 
                               class="form-control @error('kategori') is-invalid @enderror" 
                               id="kategori" 
                               name="kategori" 
                               placeholder="Kategori"
                               value="{{ old('kategori') }}"
                               required>
                        @error('kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="stok" class="form-label fw-semibold">Stok</label>
                        <input type="number" 
                               class="form-control @error('stok') is-invalid @enderror" 
                               id="stok" 
                               name="stok" 
                               placeholder="Stok"
                               value="{{ old('stok') }}"
                               min="0"
                               required>
                        @error('stok')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="lokasi" class="form-label fw-semibold">Lokasi</label>
                        <input type="text" 
                               class="form-control @error('lokasi') is-invalid @enderror" 
                               id="lokasi" 
                               name="lokasi" 
                               placeholder="Lokasi"
                               value="{{ old('lokasi') }}"
                               required>
                        @error('lokasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mt-4">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check-circle"></i> Simpan
                        </button>
                        <a href="{{ route('barang.index') }}" class="btn btn-secondary px-4">
                            <i class="bi bi-x-circle"></i> Batal
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
