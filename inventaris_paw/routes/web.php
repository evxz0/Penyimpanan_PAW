<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BarangController;
use App\Models\Barang;

Route::get('/', function () {
    return Auth::check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});

Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        $barangs_count = Barang::count();
        $stok_count = Barang::sum('stok');
        $kategori_count = Barang::distinct('kategori')->count('kategori');
        
        $latest_barangs = Barang::latest()->take(5)->get();
        $updated_barangs = Barang::orderBy('updated_at', 'desc')->take(5)->get();
        
        // Data for charts
        $categories = Barang::select('kategori', \Illuminate\Support\Facades\DB::raw('count(*) as total'))
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
    })->name('dashboard');

    Route::resource('barang', BarangController::class);
});
