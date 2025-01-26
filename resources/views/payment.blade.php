@extends('layout.home')
@section('title', 'History Pembayaran')
@section('content')
<div class="row">
    <div class="col-11">
        @if (session('success'))
            <div class="alert alert-primary alert-dismissible fade show text-white mb-4" id="success">
                <span class="alert-text">
                    <strong>SUKSES!!</strong> {{ session('success') }}
                </span>
            </div>
            <script>
                setTimeout(function() {
                    var alert = document.getElementById('success');
                    alert.classList.add('fade');
                    alert.style.display = 'none';
                }, 3000);
            </script>
        @endif

        <div class="card my-4">
            <!-- Card Header -->
            <div class="card-header">

                    <h6 class="text-blacktext-capitalize ps-4">
                        <i class="ti-receipt"></i> History Pembayaran
                    </h6>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="fa fa-chevron-left"></i></li>
                            <li><i class="fa fa-window-maximize full-card"></i></li>
                            <li><i class="fa fa-minus minimize-card"></i></li>
                            <li><i class="fa fa-refresh reload-card"></i></li>
                            <li><i class="fa fa-times close-card"></i></li>
                        </ul>
                    </div>
            </div>

            <!-- Card Body -->
            <div class="card-body p-4">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NISN</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nominal</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bulan</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tahun</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($payments as $payment)
                                <tr>
                                    <td><span class="text-xs font-weight-bold">{{ $loop->iteration }}</span></td>
                                    <td><span class="text-xs font-weight-bold">{{ $payment->student->nisn }}</span></td>
                                    <td class="align-middle text-center">
                                        <span class="text-xs font-weight-bold">
                                            {{ 'Rp. ' . number_format($payment->jumlah_bayar, 0, ',', '.') }}
                                        </span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-xs font-weight-bold">{{ $payment->tgl_bayar }}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-xs font-weight-bold">{{ $payment->bulan_bayar }}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-xs font-weight-bold">{{ $payment->tahun_bayar }}</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-secondary">Tidak ada data transaksi.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
