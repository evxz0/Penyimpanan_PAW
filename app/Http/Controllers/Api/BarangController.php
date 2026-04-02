<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BarangResource;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::all();
        return response()->json([
            'success' => true,
            'message' => 'List Data Barang',
            'data'    => BarangResource::collection($barangs)
        ], 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required',
            'kategori'    => 'required',
            'stok'        => 'required|integer',
            'lokasi'      => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422, [], JSON_PRETTY_PRINT);
        }

        $barang = Barang::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Barang Created Successfully',
            'data'    => new BarangResource($barang)
        ], 201, [], JSON_PRETTY_PRINT);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            return response()->json([
                'success' => false,
                'message' => 'Barang Not Found',
            ], 404, [], JSON_PRETTY_PRINT);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail Data Barang',
            'data'    => new BarangResource($barang)
        ], 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required',
            'kategori'    => 'required',
            'stok'        => 'required|integer',
            'lokasi'      => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422, [], JSON_PRETTY_PRINT);
        }

        $barang = Barang::find($id);

        if (!$barang) {
            return response()->json([
                'success' => false,
                'message' => 'Barang Not Found',
            ], 404, [], JSON_PRETTY_PRINT);
        }

        $barang->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Barang Updated Successfully',
            'data'    => new BarangResource($barang)
        ], 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            return response()->json([
                'success' => false,
                'message' => 'Barang Not Found',
            ], 404, [], JSON_PRETTY_PRINT);
        }

        $barang->delete();

        return response()->json([
            'success' => true,
            'message' => 'Barang Deleted Successfully',
        ], 200, [], JSON_PRETTY_PRINT);
    }
}
