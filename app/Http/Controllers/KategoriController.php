<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori; // TAMBAHKAN

class KategoriController extends Controller
{
    // 1. TAMPILKAN SELURUH DATA (INDEX)
    public function index()
    {
        try {
            $kategoris = Kategori::all(); // Mengambil semua data kategori
            return view('kategori.index', compact('kategoris'));
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menampilkan data kategori: ' . $e->getMessage());
        }
    }

    // 2. TAMPILKAN FORM TAMBAH (CREATE)
    public function create()
    {
        return view('kategori.create');
    }

    // 3. PROSES SIMPAN DATA BARU (STORE)
    public function store(Request $request)
    {
        // VALIDASI INPUTAN
        $request->validate([
            'nama' => ['required', 'regex:/^[^0-9]+$/'],
            'deskripsi' => ['nullable'],
        ], [
            'nama.required' => 'Nama kategori wajib diisi.',
            'nama.regex' => 'Nama kategori tidak boleh mengandung angka.',
        ]);

        try {
            $kategori = new Kategori;
            // Gunakan 'nama' agar konsisten dengan validasi
            $kategori->nama = $request->get('nama'); // mengambil request di method name blade
            $kategori->deskripsi = $request->get('deskripsi');
            $kategori->save();

            return redirect()->route('kategori.index')->with('sukses', 'Data Kategori berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->route('kategori.index')->with('error', 'Gagal menambah data kategori: ' . $e->getMessage());
        }
    }

    // 4. TAMPILKAN FORM UBAH (EDIT)
    public function edit(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.update', compact('kategori'));
    }
    // awal masuk dari index.blade setelah itu akan masuk html kategori.update

    // 5. PROSES UBAH DATA (UPDATE)
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => ['required', 'regex:/^[^0-9]+$/'],
            'deskripsi' => ['nullable'],
        ], [
            'nama.required' => 'Nama kategori wajib diisi.',
            'nama.regex' => 'Nama kategori tidak boleh mengandung angka.',
        ]);

        try {
            $kategori = Kategori::findOrFail($id);
            $kategori->nama = $request->get('nama');
            $kategori->deskripsi = $request->get('deskripsi');
            $kategori->save();

            return redirect()->route('kategori.index')->with('sukses', 'Data Kategori berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('kategori.index')->with('error', 'Gagal memperbarui data kategori: ' . $e->getMessage());
        }
    }

    // 6. PROSES HAPUS DATA (DESTROY)
    public function destroy(string $id)
    {
        try {
            $kategori = Kategori::findOrFail($id);
            $kategori->delete();
            return redirect()->route('kategori.index')->with('sukses', 'Data Kategori berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('kategori.index')->with('error', 'Gagal menghapus data kategori: ' . $e->getMessage());
        }
    }
}
