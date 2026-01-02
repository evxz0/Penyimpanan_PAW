<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $query = Barang::query();

        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'name_asc':
                    $query->orderBy('nama_barang', 'asc');
                    break;
                case 'stok_asc':
                    $query->orderBy('stok', 'asc');
                    break;
                case 'stok_desc':
                    $query->orderBy('stok', 'desc');
                    break;
                default:
                    // Default sorting if needed
                    break;
            }
        }

        $barangs = $query->get();
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
            'merk'        => 'nullable|string',
            'status'      => 'required|string',
        ]);

        // Simpan data ke database
        Barang::create([
            'nama_barang' => $request->nama_barang,
            'kategori'    => $request->kategori,
            'stok'        => $request->stok,
            'lokasi'      => $request->lokasi,
            'merk'        => $request->merk,
            'status'      => $request->status,
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
            'merk'        => 'nullable|string',
            'status'      => 'required|string',
        ]);

        $barang->update([
            'nama_barang' => $request->nama_barang,
            'kategori'    => $request->kategori,
            'stok'        => $request->stok,
            'lokasi'      => $request->lokasi,
            'merk'        => $request->merk,
            'status'      => $request->status,
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
