@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">
            <i class="bi bi-info-circle"></i> Detail Barang
        </h4>
        <a href="{{ route('barang.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-borderless">
                        <tr>
                            <th width="150" class="text-muted">Nama Barang</th>
                            <td><strong>{{ $barang->nama_barang }}</strong></td>
                        </tr>
                        <tr>
                            <th class="text-muted">Kategori</th>
                            <td>
                                <span class="badge bg-info">{{ $barang->kategori }}</span>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-muted">Stok</th>
                            <td>
                                <span class="badge bg-{{ $barang->stok > 0 ? 'success' : 'danger' }} fs-6">
                                    {{ $barang->stok }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-muted">Lokasi</th>
                            <td><strong>{{ $barang->lokasi }}</strong></td>
                        </tr>
                        <tr>
                            <th class="text-muted">Ditambahkan</th>
                            <td>{{ $barang->created_at->format('d M Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th class="text-muted">Terakhir Diupdate</th>
                            <td>{{ $barang->updated_at->format('d M Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="mt-4 pt-4 border-top">
                <a href="{{ route('barang.edit', $barang) }}" class="btn btn-warning">
                    <i class="bi bi-pencil"></i> Edit Barang
                </a>
                <form action="{{ route('barang.destroy', $barang) }}" 
                      method="POST" 
                      class="d-inline"
                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang ini?');">
                    @csrf 
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash"></i> Hapus Barang
                    </button>
                </form>
                <a href="{{ route('barang.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali ke Daftar
                </a>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
