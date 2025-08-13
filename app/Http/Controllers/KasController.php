<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KasController extends Controller
{
    public function index()
    {
        $kas = Kas::with('siswa')->latest()->paginate(10);
        return view('kas.index', compact('kas'));
    }

    public function create()
    {
        $siswa = Siswa::orderBy('nama')->get();
        return view('kas.create', compact('siswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:0',
            'keterangan' => 'nullable|string|max:255',
        ]);

        Kas::create($request->all());

        return redirect()->route('kas.index')->with('success', 'Pembayaran kas berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kas = Kas::findOrFail($id);
        $siswa = Siswa::orderBy('nama')->get();
        return view('kas.edit', compact('kas', 'siswa'));
    }

    public function update(Request $request, $id)
    {
        $kas = Kas::findOrFail($id);

        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:0',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $kas->update($request->all());

        return redirect()->route('kas.index')->with('success', 'Pembayaran kas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Kas::findOrFail($id)->delete();
        return redirect()->route('kas.index')->with('success', 'Pembayaran kas berhasil dihapus.');
    }
}
