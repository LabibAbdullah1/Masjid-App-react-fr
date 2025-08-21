<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Ambil semua anggota umum default
        $umums = User::where('role', 'umum')
            ->orderBy('name', 'asc')
            ->paginate(10);

        $totalAnggota = User::where('role', 'umum')->count();

        // Jika request dari AJAX (live search)
        if ($request->ajax()) {
            $query = User::where('role', 'umum')
                ->when($search, function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->orderBy('name', 'asc')
                ->get();

            return response()->json($query);
        }

        return view('admin.anggota.index', compact('umums', 'totalAnggota'));
    }


    public function create()
    {
        return view('admin.anggota.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'umum',
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.anggota.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function show($id)
    {
        $umums = User::findOrFail($id);

        return view('admin.anggota.show', compact('umums'));
    }

    public function edit(User $umums)
    {
        return view('admin.anggota.edit', compact('umums'));
    }

    public function update(Request $request, User $umums)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $umums->id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        // Data yang akan di-update
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        // Update password jika diisi
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        // Cek hasil update
        $updated = $umums->update($data);

        if ($updated) {
            return redirect()->route('admin.anggota.index')->with('success', 'Data anggota diperbarui.');
        } else {
            return redirect()->route('admin.anggota.index')->with('error', 'Gagal memperbarui data anggota.');
        }
    }

    public function destroy(User $umums)
    {
        $umums->delete();

        return redirect()->route('admin.anggota.index')->with('success', 'Anggota berhasil dihapus.');
    }
}
