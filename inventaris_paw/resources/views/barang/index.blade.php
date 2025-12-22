@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">
            <i class="bi bi-archive"></i> Data Barang
        </h4>
        <a href="{{ route('barang.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Barang
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">
            @if($barangs->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Stok</th>
                                <th>Lokasi</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barangs as $index => $b)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="fw-semibold">{{ $b->nama_barang }}</td>
                                <td>
                                    <span class="badge bg-info">{{ $b->kategori }}</span>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $b->stok > 0 ? 'success' : 'danger' }}">
                                        {{ $b->stok }}
                                    </span>
                                </td>
                                <td>{{ $b->lokasi }}</td>
                                <td>
                                    <!-- TOMBOL AKSI: Detail, Edit, dan Hapus dengan label jelas -->
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('barang.show', $b) }}" 
                                           class="btn btn-sm btn-info text-white" 
                                           title="Detail">
                                            <i class="bi bi-eye me-1"></i> Detail
                                        </a>
                                        <a href="{{ route('barang.edit', $b) }}" 
                                           class="btn btn-sm btn-warning text-white" 
                                           title="Edit">
                                            <i class="bi bi-pencil me-1"></i> Edit
                                        </a>
                                        <form action="{{ route('barang.destroy', $b) }}" 
                                              method="POST" 
                                              class="d-inline"
                                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang ini?');">
                                            @csrf 
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-danger" 
                                                    title="Hapus">
                                                <i class="bi bi-trash me-1"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="bi bi-inbox fs-1 text-muted"></i>
                    <p class="text-muted mt-3">Belum ada data barang. Silakan tambah barang terlebih dahulu.</p>
                    <a href="{{ route('barang.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Tambah Barang
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
