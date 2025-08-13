<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\KategoriKeuangan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $kategoriId = $request->input('kategori_id');


        $query = Transaksi::query();


        if ($kategoriId) {
            $query->where('kategori_id', $kategoriId);
        }
        // Jika ada kategori_id, filter transaksinya
        if ($kategoriId) {
            $transaksiss = Transaksi::where('kategori_id', $kategoriId)->get();
        } else {
            // Jika tidak ada kategori_id, tampilkan semua transaksi
            $transaksiss = Transaksi::all(1);
        }

        // Calculate totals based on the filtered query.
        $totalPemasukan = (clone $query)->where('jenis', 'Pemasukan')->sum('jumlah');
        $totalPengeluaran = (clone $query)->where('jenis', 'Pengeluaran')->sum('jumlah');
        $saldo = $totalPemasukan - $totalPengeluaran;

        // Fetch paginated and filtered transactions.
        $transaksis = (clone $query)->with('kategori')->latest()->paginate(10);

        // Fetch all categories for the filter buttons in the view.
        $kategoriList = KategoriKeuangan::id(1);

        // Calculate total per category.
        $totalPerKategori = Transaksi::select('kategori_id', DB::raw('SUM(jumlah) as total'))
            ->with('kategori')
            ->groupBy('kategori_id')
            ->orderByDesc('total')
            ->get();

        return view('transaksi.index', compact(
            'transaksis',
            'transaksiss',
            'kategoriList',
            'kategoriId',
            'totalPemasukan',
            'totalPengeluaran',
            'saldo',
            'totalPerKategori'
        ));
    }

        public function indexUmum(Request $request)
    {
        // Get the category ID from the URL, if it exists.
        $kategoriId = $request->input('kategori_id');

        // Base query for all transactions.
        $query = Transaksi::query();

        // If a category ID is present, filter the query.
        if ($kategoriId) {
            $query->where('kategori_id', $kategoriId);
        }
                // Jika ada kategori_id, filter transaksinya
        if ($kategoriId) {
            $transaksiss = Transaksi::where('kategori_id', $kategoriId)->get();
        } else {
            // Jika tidak ada kategori_id, tampilkan semua transaksi
            $transaksiss = Transaksi::where('kategori_id' ,1)->get();
        }
        $kategoriList = KategoriKeuangan::all();
        $activeKategoriName = 'Semua Kategori'; // Default
        if ($kategoriId) {
            $activeKategori = $kategoriList->firstWhere('id', $kategoriId);
            if ($activeKategori) {
                $activeKategoriName = $activeKategori->nama_kategori;
            }
        }

        // Calculate totals based on the filtered query.
        $totalPemasukan = (clone $query)->where('jenis', 'Pemasukan')->sum('jumlah');
        $totalPengeluaran = (clone $query)->where('jenis', 'Pengeluaran')->sum('jumlah');
        $saldo = $totalPemasukan - $totalPengeluaran;

        // Fetch paginated and filtered transactions.
        $transaksis = (clone $query)->with('kategori')->latest()->paginate(10);

        // Fetch all categories for the filter buttons in the view.
        $kategoriList = KategoriKeuangan::all();

        // Calculate total per category.
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
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoriKeuangan = KategoriKeuangan::all();

        return view('transaksi.create', compact('kategoriKeuangan'));
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        $kategoriKeuangan = KategoriKeuangan::all();

        return view('transaksi.edit', compact('transaksi', 'kategoriKeuangan'));
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil dihapus.');
    }
}
