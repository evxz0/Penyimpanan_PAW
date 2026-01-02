<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_barang' => 'required',
            'kategori'    => 'required',
            'stok'        => 'required|integer',
            'lokasi'      => 'required',
        ]);

        // Simpan data ke database (FIX error user)
        Barang::create([
            'nama_barang' => $request->nama_barang,
            'kategori'    => $request->kategori,
            'stok'        => $request->stok,
            'lokasi'      => $request->lokasi,
            'user_id'     => Auth::id(),
        ]);

        return redirect()->route('barang.index')
            ->with('success', 'Barang berhasil ditambahkan');
    }

    public function show(Barang $barang)
    {
        return view('barang.show', compact('barang'));
    }

    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama_barang' => 'required',
            'kategori'    => 'required',
            'stok'        => 'required|integer',
            'lokasi'      => 'required',
        ]);

        $barang->update([
            'nama_barang' => $request->nama_barang,
            'kategori'    => $request->kategori,
            'stok'        => $request->stok,
            'lokasi'      => $request->lokasi,
        ]);

        return redirect()->route('barang.index')
            ->with('success', 'Barang berhasil diperbarui');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();

        return redirect()->route('barang.index')
            ->with('success', 'Barang berhasil dihapus');
    }
}
