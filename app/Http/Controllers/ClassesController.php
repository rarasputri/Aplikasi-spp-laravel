<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;

class ClassesController extends Controller
{

    public function index()
    {
        $classes = Classes::all();
        return view('classes', compact('classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
        ]);

        Classes::create($request->only(['name', 'major', 'kelas']));

        return redirect()->back()->with('success', 'Data kelas berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $class = Classes::findOrFail($id);
        return view('classes_edit', compact('class'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
        ]);

        $class = Classes::findOrFail($id);
        $class->update($request->only(['name', 'major', 'kelas']));

        return redirect()->route('classes.index')->with('success', 'Data kelas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Classes::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Data kelas berhasil dihapus.');
    }
}
