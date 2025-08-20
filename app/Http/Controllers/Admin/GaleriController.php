<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    // untuk admin
    public function index()
    {
        $galeri = Galeri::latest()->paginate(10);
        return view('admin.galeri.index', compact('galeri'));
    }

    //untuk umum
    public function public()
    {
        $galeri = Galeri::latest()->paginate(20);
        return view('umum.galeri', compact('galeri'));
    }

    // buat Galeri
    public function create()
    {
        return view('admin.galeri.create');
    }

    //simpan galeri
    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'nama'   => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Ambil data dasar
        $data = $request->only('nama');

        // Kalau ada gambar yang diupload
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('images', 'public');
            $data['gambar'] = $gambarPath;
        } else {
        $data['gambar'] = null; // <-- kasih nilai default
    }

        // Simpan ke database
        Galeri::create($data);

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil ditambahkan.');
    }

    //edit galeri
    public function edit(Galeri $galeri)
    {
        return view('admin.galeri.edit', compact('galeri'));
    }

    // update galeri
    public function update(Request $request, Galeri $galeri)
    {
        // Validasi input
        $request->validate([
            'nama'   => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Ambil data dasar
        $data = $request->only('nama');

        // Jika ada gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($galeri->gambar && Storage::disk('public')->exists($galeri->gambar)) {
                Storage::disk('public')->delete($galeri->gambar);
            }

            // Upload gambar baru
            $gambarPath = $request->file('gambar')->store('images', 'public');
            $data['gambar'] = $gambarPath;
        }

        // Update ke database
        $galeri->update($data);

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    // hapus galeri
    public function destroy(Galeri $galeri)
    {
        if ($galeri->gambar) {
            Storage::disk('public')->delete($galeri->gambar);
        }
        $galeri->delete();
        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil dihapus.');
    }
}
