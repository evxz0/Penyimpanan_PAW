<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('/barang', App\Http\Controllers\Api\BarangController::class)->names('api.barang');
