<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = user::all();
        return view('user', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users,email',
            'password' => 'required|string|min:3',
            'role' => 'required|in:admin,petugas',
        ]);

        user::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => $request->input('role'),
        ]);

        return redirect()->route('user')->with('success', 'user created successfully!');
    }

    public function edit(user $user)
    {
        return view('users_edit', compact('user'));
    }

    public function update(Request $request, user $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,petugas',
        ]);

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
        ]);

        return redirect()->route('user')->with('success', 'user updated successfully!');
    }

    public function destroy(user $user)
    {
        $user->delete();
        return redirect()->route('user')->with('success', 'user deleted successfully!');
    }
}
