<?php
namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Payment;
use App\Models\Classes;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStudents = Student::count();
        $totalPayments = Payment::sum('jumlah_bayar');
        $totalTransaksi = Payment::count();
        $totalMajor = Classes::count('major');
        return view('dashboard', compact('totalStudents', 'totalPayments', 'totalTransaksi', 'totalMajor'));
    }
}
