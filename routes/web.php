<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\BarangController;
use App\Models\Barang;



Route::get('/', function () {
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    return Auth::user()->role === 'admin'
        ? redirect()->route('admin.dashboard')
        : redirect()->route('manajer.dashboard');
});



Auth::routes();


function getDashboardData()
{
    return [
        'barangs_count'   => Barang::count(),
        'stok_count'      => Barang::sum('stok'),
        'kategori_count'  => Barang::distinct('kategori')->count('kategori'),
        'latest_barangs'  => Barang::latest()->take(5)->get(),
        'updated_barangs' => Barang::orderBy('updated_at', 'desc')->take(5)->get(),
        'categories'      => Barang::select('kategori', DB::raw('count(*) as total'))
                                ->groupBy('kategori')
                                ->pluck('total', 'kategori')
                                ->all(),
    ];
}


Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', function () {
        $data = getDashboardData();
        return view('dashboard', $data);
    })->name('admin.dashboard');


    Route::resource('barang', BarangController::class);
});




Route::middleware(['auth', 'role:manajer'])->group(function () {

    Route::get('/manajer/dashboard', function () {
        $data = getDashboardData();
        return view('dashboard', $data);
    })->name('manajer.dashboard');

});

Route::get('/api-docs', function () {
    return view('api_docs');
});