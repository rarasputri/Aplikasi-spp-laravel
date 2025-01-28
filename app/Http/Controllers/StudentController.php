<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Spp;
use Illuminate\Support\Facades\Hash;


class StudentController extends Controller
{

    public function index()
    {

        $students = Student::with('classes', 'spp')->get();
        $classes = Classes::pluck('kelas', 'id');
        $spps = Spp::pluck('nominal', 'id');
        return view('student', compact('students', 'spps', 'classes'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'spp_id' => 'required|exists:spps,id',
            'classes_id' => 'required|exists:classes,id',
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nis' => 'required|integer',
            'nisn' => 'required|integer',
            'no_telp' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:students,email',
            'password' => 'required|string|min:3',
        ]);
        Student::create([
            'spp_id' => $request->input('spp_id'),
            'classes_id' => $request->input('classes_id'),
            'name' => $request->input('name'),
            'alamat' => $request->input('alamat'),
            'nis' => $request->input('nis'),
            'nisn' => $request->input('nisn'),
            'no_telp' => $request->input('no_telp'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->back()->with('success', 'Data siswa berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('student_edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'spp_id' => 'required|exists:spps,id',
            'classes_id' => 'required|exists:classes,id',
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nis' => 'required|integer',
            'nisn' => 'required|integer',
            'no_telp' => 'required|string|max:255',
            'email' => 'required', 'email', 'max:255',
        ]);

        Student::findOrFail($id)->update($request->only([
            'spp_id', 'classes_id', 'name', 'alamat', 'nis', 'nisn', 'no_telp', 'email',
        ]));

        return redirect()->back()->with('success', 'Data siswa berhasil diperbarui.');
    }


    public function destroy($id)
    {
        Student::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Data siswa berhasil dihapus.');
    }
}
