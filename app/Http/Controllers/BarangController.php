<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang; // TAMBAHKAN
use App\Models\Kategori;

class BarangController extends Controller
{
    public function index()
    {
        try {
            $barangs = Barang::with('kategori')->get();
            return view('barang.index', compact('barangs'));
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menampilkan data barang: ' . $e->getMessage());
        }
    }

    public function create() // create akan muncul ketika user menekan tombol href create di index.blade
    {
        $kategoris = Kategori::all();
        return view('barang.create', compact('kategoris')); //compact= untuk mengirimkan var kategoris untuk diloop
    }

    public function store(Request $request) // store akan bekerja ketika submit form di create.blade.php
    {
        $request->validate([
            'nama' => ['required', 'max:100'],
            'harga' => ['required', 'numeric', 'min:0'],
            'stok' => ['required', 'integer', 'min:0'],
            'kategori_id' => ['required', 'exists:kategoris,id'],
        ]);

        try {
            $barang = new Barang;
            $barang->nama = $request->get('nama');
            $barang->harga = $request->get('harga');
            $barang->stok = $request->get('stok');
            $barang->kategori_id = $request->get('kategori_id');
            $barang->save();

            return redirect()->route('barang.index')->with('sukses', 'Data Barang berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->route('barang.index')->with('error', 'Gagal menambah data barang: ' . $e->getMessage());
        }
    }

    public function edit(string $id)
    {
        $barang = Barang::findOrFail($id);
        $kategoris = Kategori::all();
        return view('barang.update', compact('barang', 'kategoris'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => ['required', 'max:100'],
            'harga' => ['required', 'numeric', 'min:0'],
            'stok' => ['required', 'integer', 'min:0'],
            'kategori_id' => ['required', 'exists:kategoris,id'],
        ]);

        try {
            $barang = Barang::findOrFail($id);
            $barang->nama = $request->get('nama');
            $barang->harga = $request->get('harga');
            $barang->stok = $request->get('stok');
            $barang->kategori_id = $request->get('kategori_id');
            $barang->save();

            return redirect()->route('barang.index')->with('sukses', 'Data Barang berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('barang.index')->with('error', 'Gagal memperbarui data barang: ' . $e->getMessage());
        }
    }

    public function destroy(string $id)
    {
        try {
            $barang = Barang::findOrFail($id);
            $barang->delete();
            return redirect()->route('barang.index')->with('sukses', 'Data Barang berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('barang.index')->with('error', 'Gagal menghapus data barang: ' . $e->getMessage());
        }
    }
}
