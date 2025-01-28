@extends('layout.home')
@section('title', 'Dashboard')
@section('content')
<div class="row">

<div class="col-md-6 col-xl-3">
    <div class="card bg-c-green order-card">
        <div class="card-block">
            <h6 class="m-b-20">Total Siswa</h6>
            <h2 class="text-right"><i class="ti-user f-left"></i><span>{{ $totalStudents }}</span></h2>
        </div>
    </div>
</div>
<div class="col-md-6 col-xl-3">
    <div class="card bg-c-yellow order-card">
        <div class="card-block">
            <h6 class="m-b-20">Program Keahlian</h6>
            <h2 class="text-right">
                <i class="ti-book f-left"></i>
                <span>{{$totalMajor}}</span>
            </h2>
        </div>
    </div>
</div>
<div class="col-md-6 col-xl-3">
    <div class="card bg-c-blue order-card">
        <div class="card-block">
            <h6 class="m-b-20">Total Transaksi</h6>
            <h2 class="text-right">
                <i class="ti-wallet f-left"></i>
                <span>{{ $totalTransaksi }}</span>
            </h2>
        </div>
    </div>
</div>
<div class="col-md-6 col-xl-3">
    <div class="card bg-c-pink order-card">
        <div class="card-block">
            <h6 class="m-b-20">Total Pembayaran</h6>
            <h2 class="text-right">
                <i class="ti-wallet f-left"></i>
                <span>Rp. {{ number_format($totalPayments, 0, ',', '.') }}</span>
            </h2>
        </div>
    </div>
</div>

</div>
<!-- order
@endsection
