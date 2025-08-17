<?php

namespace App\Http\Controllers;

use App\Models\PesanSaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesanSaranUmumController extends Controller
{
    /**
     * Halaman create untuk user umum.
     * Tampilkan pesan terakhir user yang masih aktif (belum dibalas atau < 1 hari sejak dibalas).
     */
    public function create()
    {
        $pesanAktif = PesanSaran::where('user_id', Auth::id())
            ->latest()
            ->get()
            ->filter->masihTampil();

        return view('umum.pesan', compact('pesanAktif'));
    }

    /**
     * Simpan pesan baru dari user umum.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pesan' => 'required|string|max:1000',
        ]);

        $pesanMenunggu = PesanSaran::where('user_id', auth::id())->whereNull('feedback')->count();

        if($pesanMenunggu >= 3){
            return redirect()->back()->with('error', 'anda memiliki 3 pesan yang belum di balas admin !');
        }

        PesanSaran::create([
            'user_id' => Auth::id(),
            'pesan' => $request->pesan,
        ]);

        return redirect()->route('umum.pesan.create')
            ->with('success', 'Pesan berhasil dikirim.');
    }
    public function destroy($id)
{
    $pesan = PesanSaran::where('id', $id)
        ->where('user_id', Auth::id()) // pastikan hanya bisa hapus pesan sendiri
        ->firstOrFail();

    $pesan->delete();

    return redirect()->route('umum.pesan.create')->with('success', 'Pesan berhasil dihapus.');
}

}
