<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BarangController;
use App\Models\Barang;

// Redirect awal
Route::get('/', function () {
    return Auth::check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});

Auth::routes();

// ADMIN
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', function () {
        $barangs_count = Barang::count();
        $stok_count = Barang::sum('stok');
        $kategori_count = Barang::distinct('kategori')->count('kategori');
        $latest_barangs = Barang::latest()->take(5)->get();
        $updated_barangs = Barang::orderBy('updated_at', 'desc')->take(5)->get();
        $categories = Barang::select('kategori', \DB::raw('count(*) as total'))
            ->groupBy('kategori')
            ->pluck('total', 'kategori')->all();
        return view('dashboard', compact(
            'barangs_count',
            'stok_count',
            'kategori_count',
            'latest_barangs',
            'updated_barangs',
            'categories'
        ));
    })->name('admin.dashboard');

    Route::resource('barang', BarangController::class);
});


// MANAJER
Route::middleware(['auth', 'role:manajer'])->group(function () {

    Route::get('/manajer/dashboard', function () {
        $barangs_count = Barang::count();
        $stok_count = Barang::sum('stok');
        $kategori_count = Barang::distinct('kategori')->count('kategori');
        $latest_barangs = Barang::latest()->take(5)->get();
        $updated_barangs = Barang::orderBy('updated_at', 'desc')->take(5)->get();
        $categories = Barang::select('kategori', \DB::raw('count(*) as total'))
            ->groupBy('kategori')
            ->pluck('total', 'kategori')->all();
        return view('dashboard', compact(
            'barangs_count',
            'stok_count',
            'kategori_count',
            'latest_barangs',
            'updated_barangs',
            'categories'
        ));
    })->name('manajer.dashboard');
});


// Fallback kalau gak ada role
Route::middleware('auth')->get('/dashboard', function () {
    return redirect('/');
})->name('dashboard');
