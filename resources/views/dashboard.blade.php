@extends('layout.home')
@section('title', 'Dashboard')
@section('content')
<div class="row">

<div class="col-md-6 col-xl-3">
    <div class="card bg-c-green order-card">
        <div class="card-block">
            <h6 class="m-b-20">Total Siswa</h6>
            <h2 class="text-right"><i class="ti-user f-left"></i><span>{{ $totalStudents }}</span></h2>
            <p class="m-b-0">Bulan Ini<span class="f-right">{{ $studentsThisMonth }}</span></p>
        </div>
    </div>
</div>
<div class="col-md-6 col-xl-3">
    <div class="card bg-c-pink order-card">
        <div class="card-block">
            <h6 class="m-b-20">Total Payments</h6>
            <h2 class="text-right">
                <i class="ti-wallet f-left"></i>
                <span>Rp. {{ number_format($totalPayments, 0, ',', '.') }}</span>
            </h2>
            <p class="m-b-0">Bulan Ini <span class="f-right">Rp. {{ number_format($paymentsThisMonth, 0, ',', '.') }}</span></p>
        </div>
    </div>
</div>
</div>
<!-- order
@endsection
