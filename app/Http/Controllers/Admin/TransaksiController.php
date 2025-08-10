<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\CheckUserRole;


class TransaksiController extends Controller
{

    // Tampilkan semua transaksi, bisa filter kategori
    public function index(Request $request)
    {
        $kategori = $request->get('kategori');

        $query = Transaksi::query();

        if ($kategori) {
            $query->where('kategori', $kategori);
        }

        $transaksi = $query->latest()->paginate(10);

        return view('transaksi.index', compact('transaksi', 'kategori'));
    }

    // Form tambah transaksi
    public function create()
    {
        $kategoriList = ['Kas Masjid', 'Anak Yatim', 'Ambulance', 'Wakaf Pembangunan'];
        return view('transaksi.create', compact('kategoriList'));
    }

    // Simpan transaksi baru
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kategori' => 'required|in:Kas Masjid,Anak Yatim,Ambulance,Wakaf Pembangunan',
            'jenis' => 'required|in:Pemasukan,Pengeluaran',
            'jumlah' => 'required|numeric|min:0',
            'role' => 'required|in:admin',
            'keterangan' => 'nullable|string',
        ]);

        Transaksi::create($request->all());

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan');
    }

    // Form edit transaksi
    public function edit(Transaksi $transaksi)
    {
        $kategoriList = ['Kas Masjid', 'Anak Yatim', 'Ambulance', 'Wakaf Pembangunan'];
        return view('transaksi.edit', compact('transaksi', 'kategoriList'));
    }

    // Update transaksi
    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kategori' => 'required|in:Kas Masjid,Anak Yatim,Ambulance,Wakaf Pembangunan',
            'jenis' => 'required|in:Pemasukan,Pengeluaran',
            'jumlah' => 'required|numeric|min:0',
            'role' => 'required|in:admin',
            'keterangan' => 'nullable|string',
        ]);

        $transaksi->update($request->all());

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui');
    }

    // Hapus transaksi
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus');
    }
}
