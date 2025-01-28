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

    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        return view('payment', compact('payment'));
    }


    public function update(Request $request, $id)
    {

        $payment = Payment::findOrFail($id);

        $aa = $payment->jumlah_bayar + $request->jumlah_bayar;

        $payment->user_id  = $request->user_id;
        $payment->spp_id = $request->spp_id;
        $payment->student_id = $request->student_id;
        $payment->jumlah_bayar = $aa;
        $payment->save();

        return redirect()->route('payment.index')->with('success', 'Data payment berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Student::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Pembayaran berhasil dihapus.');
    }
}
