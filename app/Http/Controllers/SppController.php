<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spp;

class SppController extends Controller
{

    public function index()
    {
        $spps = Spp::all();
        return view('spp', compact('spps'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'nominal' => 'required|integer|min:0',
        ]);

        Spp::create([
            'nominal' => $request->nominal,
            'tahun' => now()->format('Y'),
        ]);
        return redirect()->back()->with('success', 'Data SPP berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $spp = Spp::findOrFail($id);
        return view('spp_edit', compact('spp'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nominal' => 'required|integer|min:0',

        ]);

        $spp = Spp::findOrFail($id);
        $spp->update($request->only(['nominal']));

        return redirect()->route('spp.index')->with('success', 'Data spp berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $spp = Spp::findOrFail($id);
        $spp->delete();
        return redirect()->back()->with('success', 'Data SPP berhasil dihapus.');
    }
}
