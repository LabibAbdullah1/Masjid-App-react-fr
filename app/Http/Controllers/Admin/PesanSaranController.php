<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PesanSaran;
use Illuminate\Http\Request;

class PesanSaranController extends Controller
{
    /**
     * Halaman index admin untuk melihat semua pesan.
     */
    public function index()
    {
        
        $pesanSaran = PesanSaran::with('user')
            ->latest()
            ->paginate(10);

        return view('admin.pesan.index', compact('pesanSaran'));
    }

    /**
     * Form balas pesan (admin).
     */
    public function edit($id)
    {
        $pesan = PesanSaran::findOrFail($id);
        return view('admin.pesan.edit', compact('pesan'));
    }

    /**
     * Update balasan admin.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'feedback' => 'required|string|max:1000',
        ]);

        $pesan = PesanSaran::findOrFail($id);

        $pesan->update([
            'feedback' => $request->feedback,
            'dibalas_pada' => now(),
        ]);

        return redirect()->route('admin.pesan.index')
            ->with('success', 'Balasan berhasil dikirim.');
    }

    /**
     * Hapus pesan (admin).
     */
    public function destroy($id)
    {
        $pesan = PesanSaran::findOrFail($id);
        $pesan->delete();

        return redirect()->route('admin.pesan.index')
            ->with('success', 'Pesan berhasil dihapus.');
    }
}
