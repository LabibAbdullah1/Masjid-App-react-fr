<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\KategoriKeuangan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TransaksiController extends Controller
{
    // untuk admin
    public function index(Request $request)
    {
        $kategoriId = $request->input('kategori_id');

        $query = Transaksi::query();

        if ($kategoriId && $kategoriId != 'semua') {
            $query->where('kategori_id', $kategoriId);
        }

        $totalPemasukan = (clone $query)->where('jenis', 'Pemasukan')->sum('jumlah');
        $totalPengeluaran = (clone $query)->where('jenis', 'Pengeluaran')->sum('jumlah');
        $saldo = $totalPemasukan - $totalPengeluaran;

        $transaksis = (clone $query)->with('kategori')->latest()->paginate(10);

        $kategoriList = KategoriKeuangan::all();

        $totalPerKategori = Transaksi::select('kategori_id', DB::raw('SUM(jumlah) as total'))
            ->with('kategori')
            ->groupBy('kategori_id')
            ->orderByDesc('total')
            ->get();

        return view('transaksi.index', compact(
            'transaksis',
            'kategoriList',
            'kategoriId',
            'totalPemasukan',
            'totalPengeluaran',
            'saldo',
            'totalPerKategori'
        ));
    }

    // untuk tampilan ke umum
    public function umumindex(Request $request)
    {
        $kategoriId = $request->input('kategori_id');

        $query = Transaksi::query();

        if ($kategoriId) {
            $query->where('kategori_id', $kategoriId);
        }

        if ($kategoriId) {
            $transaksiss = Transaksi::where('kategori_id', $kategoriId)->get();
        } else {

            $transaksiss = Transaksi::where('kategori_id' ,1)->get();
        }
        $kategoriList = KategoriKeuangan::all();
        $activeKategoriName = 'Semua Kategori';
        if ($kategoriId) {
            $activeKategori = $kategoriList->firstWhere('id', $kategoriId);
            if ($activeKategori) {
                $activeKategoriName = $activeKategori->nama_kategori;
            }
        }


        $totalPemasukan = (clone $query)->where('jenis', 'Pemasukan')->sum('jumlah');
        $totalPengeluaran = (clone $query)->where('jenis', 'Pengeluaran')->sum('jumlah');
        $saldo = $totalPemasukan - $totalPengeluaran;

        $transaksis = (clone $query)->with('kategori')->latest()->paginate(10);

        $kategoriList = KategoriKeuangan::all();

        $totalPerKategori = Transaksi::select('kategori_id', DB::raw('SUM(jumlah) as total'))
            ->with('kategori')
            ->groupBy('kategori_id')
            ->orderByDesc('total')
            ->get();

        return view('umum.transaksi', compact(
            'transaksis',
            'transaksiss',
            'kategoriList',
            'kategoriId',
            'totalPemasukan',
            'totalPengeluaran',
            'activeKategoriName',
            'saldo',
            'totalPerKategori'
        ));
    }

    // buat data kauangan
    public function create()
    {
        $kategoriKeuangan = KategoriKeuangan::all();

        return view('transaksi.create', compact('kategoriKeuangan'));
    }

    // simpan data keuangan
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'kategori_id' => 'required|exists:kategori_keuangan,id',
            'jenis' => 'required|in:Pemasukan,Pengeluaran',
            'jumlah' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string|max:255',
        ]);

        Transaksi::create($validatedData);

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil ditambahkan.');
    }

    // edit data keuangan
    public function edit(Transaksi $transaksi)
    {
        $kategoriKeuangan = KategoriKeuangan::all();

        return view('transaksi.edit', compact('transaksi', 'kategoriKeuangan'));
    }

    // update data kuangan
    public function update(Request $request, Transaksi $transaksi)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'kategori_id' => 'required|exists:kategori_keuangan,id',
            'jenis' => 'required|in:Pemasukan,Pengeluaran',
            'jumlah' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $transaksi->update($validatedData);

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil diperbarui.');
    }

    //hapus data keuangan
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil dihapus.');
    }
}
