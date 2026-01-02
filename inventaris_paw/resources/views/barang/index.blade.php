@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-0 fw-bold text-dark">Daftar Barang</h4>
            <small class="text-muted">Mengelola data barang inventaris</small>
        </div>
        <div class="d-flex gap-2">
            <!-- Filter Form -->
            <form action="{{ route('barang.index') }}" method="GET" class="d-flex gap-2">
                <select name="sort" class="form-select" onchange="this.form.submit()" style="width: 200px;">
                    <option value="">Urutkan...</option>
                    <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Nama A-Z</option>
                    <option value="stok_asc" {{ request('sort') == 'stok_asc' ? 'selected' : '' }}>Stok Terkecil</option>
                    <option value="stok_desc" {{ request('sort') == 'stok_desc' ? 'selected' : '' }}>Stok Terbesar</option>
                </select>
            </form>

            <a href="{{ route('barang.create') }}" class="btn btn-primary d-flex align-items-center">
                <i class="bi bi-plus-circle me-1"></i> Tambah
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0 align-middle">
                    <thead style="background-color: #87CEEB;">
                        <tr>
                            <th class="py-3 ps-4 text-nowrap">No</th>
                            <th class="py-3 text-nowrap">Merk</th>
                            <th class="py-3 text-nowrap">Nama Barang</th>
                            <th class="py-3 text-nowrap">Kategori</th>
                            <th class="py-3 text-nowrap">Stok</th>
                            <th class="py-3 text-center text-nowrap">Status</th>
                            <th class="py-3 text-center text-nowrap">Lokasi</th>
                            <th class="py-3 text-center text-nowrap">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @forelse($barangs as $barang)
                            <tr>
                                <td class="ps-4 fw-bold">{{ $loop->iteration }}</td>
                                <td>{{ $barang->merk ?? '-' }}</td>
                                <td class="fw-bold">{{ $barang->nama_barang }}</td>
                                <td>{{ $barang->kategori }}</td>
                                <td class="fw-bold fs-5">{{ $barang->stok }}</td>
                                <td class="text-center">
                                    @if($barang->status == 'baik')
                                        <span class="badge rounded-pill bg-success bg-opacity-25 text-success border border-success px-3">Baik</span>
                                    @elseif($barang->status == 'rusak')
                                        <span class="badge rounded-pill bg-danger bg-opacity-25 text-danger border border-danger px-3">Rusak</span>
                                    @else
                                        <span class="badge rounded-pill bg-secondary bg-opacity-25 text-secondary border border-secondary px-3">{{ $barang->status }}</span>
                                    @endif
                                </td>
                                <td class="text-center">{{ $barang->lokasi }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('barang.show', $barang->id) }}" class="btn btn-link text-dark p-1"><i class="bi bi-eye"></i></a>
                                        <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-link text-dark p-1"><i class="bi bi-pencil-square"></i></a>
                                        <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link text-dark p-1"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-5">
                                    <div class="text-muted">
                                        <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                        Tidak ada data ditemukan
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

