<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\KategoriKeuangan;
use App\Http\Controllers\Controller;

class KategoriKeuanganController extends Controller
{
public function index(Request $request)
{
    $kategoriList = [
        'Kas Masjid' => 'Kas Masjid',
        'Anak Yatim' => 'Anak Yatim',
        'Ambulance' => 'Ambulance',
        'Wakaf Pembangunan' => 'Wakaf Pembangunan',
    ];

    $kategori = $request->get('kategori_id');

    $query = Transaksi::query();

    if ($kategori) {
        $query->where('kategori', $kategori);
    }

    $transaksis = $query->paginate(10);

    return view('transaksi.index', compact('transaksis', 'kategoriList', 'kategori'));
}


    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        KategoriKeuangan::create($request->all());
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit(KategoriKeuangan $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, KategoriKeuangan $kategori)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $kategori->update($request->all());
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diupdate');
    }

    public function destroy(KategoriKeuangan $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
    }
}
