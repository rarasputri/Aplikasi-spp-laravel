<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SiswaController extends Controller
{
    public function showLoginForm()
    {
        return view('siswa.login');
    }

    public function loginSiswa(Request $request)
    {
        $credentials = $request->only('email', 'password');

        Log::info('Login attempt', $credentials);

        if (Auth::guard('student')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('home')->with('success', 'Login berhasil.');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }

    public function logoutSiswa(Request $request)
    {

        Auth::guard('student')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('page.index')->with('success', 'Logout berhasil.');
    }
}
