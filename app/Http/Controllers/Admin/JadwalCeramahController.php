<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalCeramah;
use Illuminate\Http\Request;

class JadwalCeramahController extends Controller
{
    public function index()
    {
        $jadwal = JadwalCeramah::latest()->paginate(10);
        return view('admin.jadwal-ceramah.index', compact('jadwal'));
    }

    //untuk umum
    public function ceramahUmum()
    {
    $jadwal = JadwalCeramah::orderBy('tanggal', 'asc')->paginate(10);
    return view('umum.ceramah', compact('jadwal'));
    }

    public function create()
    {
        return view('admin.jadwal-ceramah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'penceramah' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu' => 'required',
        ]);

        JadwalCeramah::create($request->all());

        return redirect()->route('admin.jadwal-ceramah.index')->with('success', 'Jadwal ceramah berhasil ditambahkan.');
    }

    public function edit(JadwalCeramah $jadwalCeramah)
    {
        return view('admin.jadwal-ceramah.edit', compact('jadwalCeramah'));
    }

    public function update(Request $request, JadwalCeramah $jadwalCeramah)
    {
        $request->validate([
            'penceramah' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu' => 'required',
        ]);

        $jadwalCeramah->update($request->all());

        return redirect()->route('admin.jadwal-ceramah.index')->with('success', 'Jadwal ceramah berhasil diperbarui.');
    }

    public function destroy(JadwalCeramah $jadwalCeramah)
    {
        $jadwalCeramah->delete();
        return redirect()->route('admin.jadwal-ceramah.index')->with('success', 'Jadwal ceramah berhasil dihapus.');
    }
}
