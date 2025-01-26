<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Spp;
use App\Models\User;
use App\Models\Student;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return view('payment', compact('payments'));
    }


    public function create(Request $request)
    {

        $nisn = $request->nisn;

        $student = Student::where('nisn', $nisn)->first();
        if (!$student) {
            return view ('payment_search');
        }

        $users = User::pluck('name', 'id');
        $spps = Spp::pluck('nominal', 'id');

        return view('payment_create', compact('student', 'users', 'spps'));


    }

    public function show($id)
    {
        $payment = Payment::find($id);
        if (!$payment) {
            return redirect()->route('payment.index')->with('error', 'Payment not found.');
        }

        return view('payments.show', compact('payment'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'spp_id' => 'required|exists:spps,id',
            'jumlah_bayar' => 'required|numeric|min:1',
            'student_id' => 'required|exists:students,id',
        ]);

        Payment::create([
            'user_id' => $request->user_id,
            'spp_id' => $request->spp_id,
            'tgl_bayar' => now(),
            'bulan_bayar' => now()->format('m'),
            'tahun_bayar' => now()->format('Y'),
            'jumlah_bayar' => $request->jumlah_bayar,
            'student_id' => $request->student_id,
        ]);

        return redirect()->route('payment.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }
}
