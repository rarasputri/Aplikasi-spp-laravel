<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf; // Use PDF facade for generating PDFs

class HomeController extends Controller
{
    public function index()
    {
        $student = Auth::guard('student')->user();
        $payments = Payment::where('student_id', $student->id)->get();

        return view('home', compact('payments'));
    }

    public function generateReport()
    {
        $student = Auth::guard('student')->user();
        $payments = Payment::where('student_id', $student->id)->get();

        // Generate PDF using a Blade view
        $pdf = Pdf::loadView('report.payment_history', compact('payments', 'student'));

        // Return the PDF as a download
        return $pdf->download('payment_history_' . $student->nisn . '.pdf');
    }
}
