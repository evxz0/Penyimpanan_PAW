@extends('layouts.app')

@section('content')

<div class="rounded-4 p-4 shadow-sm mb-4 text-white" 
     style="background:linear-gradient(90deg,#9DD8EF,#0DB2E9);">
    <h3>Selamat Datang, <strong>{{ Auth::user()->name }}</strong></h3>
    <p class="m-0">Sistem Manajemen Inventaris Owabong</p>
</div>

<div class="row g-4">

    <div class="col-md-4">
        <a href="{{ route('barang.create') }}" class="btn w-100 p-4 shadow rounded-4" 
           style="background:#0DB2E9; color:white; font-size:20px;">
            <i class="bi bi-plus-circle me-2"></i> Tambah Barang
        </a>
    </div>
    
    <div class="col-md-4">
        <a href="{{ route('barang.index') }}" class="btn w-100 p-4 shadow rounded-4" 
           style="background:#B4E1F3; font-size:20px;">
            <i class="bi bi-pencil-square me-2"></i> Edit Barang
        </a>
    </div>

    <div class="col-md-4">
        <a href="{{ route('barang.index') }}" class="btn w-100 p-4 shadow rounded-4" 
           style="background:#FFCACA; font-size:20px;">
            <i class="bi bi-trash me-2"></i> Hapus Barang
        </a>
    </div>
</div>


<div class="mt-5">
    <h5 class="fw-bold mb-3">Inventaris Per Kategori</h5>
</div>

@endsection

