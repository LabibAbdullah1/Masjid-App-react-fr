<?php

namespace App\Http\Controllers\Umum;

use App\Models\Quote;
use App\Models\Galeri;
use Illuminate\Http\Request;
use App\Models\JadwalCeramah;
use App\Models\KategoriKeuangan;
use App\Http\Controllers\Controller;
use App\Http\Controllers\JadwalSholatController;
use App\Models\Transaksi; // Asumsi model Transaksi sudah ada

class UmumDashboardController extends Controller
{
    public function index(JadwalSholatController $jadwalSholat)
    {
        $jadwal = $jadwalSholat->getJadwal('Pekanbaru', 'Indonesia');
        // 1. Ambil ID dari kategori "Kas Masjid"
        $kategoriKasMasjid = KategoriKeuangan::where('nama_kategori', 'Kas Masjid')->first();

        // Pastikan kategori "Kas Masjid" ditemukan sebelum melanjutkan
        if ($kategoriKasMasjid) {
            // 2. Ambil data transaksi hanya untuk kategori "Kas Masjid"
            $totalPemasukan = Transaksi::where('jenis', 'pemasukan')
                                    ->where('kategori_id', $kategoriKasMasjid->id)
                                    ->sum('jumlah');

            $totalPengeluaran = Transaksi::where('jenis', 'pengeluaran')
                                    ->where('kategori_id', $kategoriKasMasjid->id)
                                    ->sum('jumlah');

        } else {
            // Jika kategori tidak ditemukan, set nilai ke 0
            $totalPemasukan = 0;
            $totalPengeluaran = 0;
        }

        $saldo = $totalPemasukan - $totalPengeluaran;

        // Ambil kutipan acak
        $quote = Quote::inRandomOrder()->first();

        // Ambil jadwal ceramah bulanan
        $jadwalCeramah = JadwalCeramah::whereMonth('tanggal', now()->month)
                                        ->orderBy('tanggal')
                                        ->get();

        // Ambil beberapa item galeri terbaru (contoh: 4 foto)
        $galeri = Galeri::latest()->take(4)->get();
        return view('dashboard', compact(
            'jadwal',
            'totalPemasukan',
            'totalPengeluaran',
            'saldo',
            'quote',
            'jadwalCeramah',
            'galeri'
        ));
    }
}
