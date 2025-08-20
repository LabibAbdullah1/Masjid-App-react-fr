<?php

namespace App\Http\Controllers\Admin;

use App\Models\KategoriKeuangan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KategoriKeuanganController extends Controller
{

     // Tampilkan daftar semua kategori.

    public function index()
    {
        // Ambil semua kategori
        $kategoris = KategoriKeuangan::orderBy('id', 'desc')->paginate(10);

        return view('kategori.index', compact('kategoris'));
    }


     // Form tambah kategori baru.

    public function create()
    {
        return view('kategori.create');
    }


     // Simpan kategori baru ke database.

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        KategoriKeuangan::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }


     // Form edit kategori.

    public function edit($id)
    {
        $kategori = KategoriKeuangan::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }


     // Update kategori.

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $kategori = KategoriKeuangan::findOrFail($id);
        $kategori->update([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }


     // Hapus kategori.

    public function destroy($id)
    {
        $kategori = KategoriKeuangan::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
