<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use App\Models\Kas_Perbulan;
use Illuminate\Http\Request;

class Kas_PerbulanController extends Controller
{
    public function index()
    {
        $bulanKas = Kas_perbulan::latest()->paginate(10);
        return view('bulan_kas.index', compact('bulanKas'));
    }

    public function create()
    {
        return view('bulan_kas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bulan' => 'required|string|max:50',
            'jumlah' => 'required|integer|min:0',
        ]);

        Kas_Perbulan::create($request->all());

        return redirect()->route('bulan_kas.index')->with('success', 'Bulan kas berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $bulanKas = Kas_Perbulan::findOrFail($id);
        return view('bulan_kas.edit', compact('bulanKas'));
    }

    public function update(Request $request, $id)
    {
        $bulanKas = Kas_Perbulan::findOrFail($id);

        $request->validate([
            'bulan' => 'required|string|max:50',
            'jumlah' => 'required|integer|min:0',
        ]);

        $bulanKas->update($request->all());

        return redirect()->route('bulan_kas.index')->with('success', 'Bulan kas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Kas_Perbulan::findOrFail($id)->delete();
        return redirect()->route('bulan_kas.index')->with('success', 'Bulan kas berhasil dihapus.');
    }
}
