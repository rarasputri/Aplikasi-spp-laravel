@extends('laysis.home')
@section('title', 'History Pembayaran')

@section('content')
<div class="row">
    <div class="col-11">
        <a href="{{ route('report.generate') }}" class="btn btn-primary mb-3">Download Laporan</a>

        <div class="card">
            <div class="card-header">
                <h5>History Pembayaran</h5>
                <span>Data pembayaran siswa</span>
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

            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table id="paymentsTable" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NISN</th>
                                <th>Nominal</th>
                                <th>Tanggal</th>
                                <th>Bulan</th>
                                <th>Tahun</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($payments as $payment)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $payment->student->nisn }}</td>
                                    <td>{{ 'Rp. ' . number_format($payment->jumlah_bayar, 0, ',', '.') }}</td>
                                    <td>{{ $payment->tgl_bayar }}</td>
                                    <td>{{ $payment->bulan_bayar }}</td>
                                    <td>{{ $payment->tahun_bayar }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data transaksi.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- DataTables Initialization -->
<script>
    $(document).ready(function() {
        $('#paymentsTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json" // Use Indonesian translation
            }
        });
    });
</script>
@endsection
