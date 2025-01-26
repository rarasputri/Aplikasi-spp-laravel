<?php
namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Payment;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStudents = Student::count();
        $studentsThisMonth = Student::whereMonth('created_at', Carbon::now()->month)->count();
        $totalPayments = Payment::sum('jumlah_bayar');

        $paymentsThisMonth = Payment::whereMonth('tgl_bayar', Carbon::now()->month)
                                     ->sum('jumlah_bayar');
        return view('dashboard', compact('totalStudents', 'studentsThisMonth', 'totalPayments', 'paymentsThisMonth'));
    }
}
