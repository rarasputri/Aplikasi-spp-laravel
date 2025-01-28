@extends('layout.home')
@section('title', 'History Pembayaran')
@section('content')
<div class="row">
    <div class="col-11">
        @if (session('success'))
            <div class="alert alert-primary alert-dismissible fade show text-white mb-4" id="success">
                <span class="alert-text">
                    SUKSES!!</strong> {{ session('success') }}
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
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">NISN</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">Petugas</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nominal</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tagihan</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($payments as $payment)
                                <tr>
                                    <td class="align-middle text-center"><span class="text-xs">{{ $loop->iteration }}</span></td>
                                    <td class="align-middle text-center"><span class="text-xs">{{ $payment->student->nisn }}</span></td>
                                    <td class="align-middle text-center"><span class="text-xs">{{ $payment->user->name }}</span></td>
                                    <td class="align-middle text-center">
                                        <span class="text-xs">
                                            {{ 'Rp. ' . number_format($payment->spp->nominal, 0, ',', '.') }}
                                        </span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-xs">{{ $payment->tgl_bayar }}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-xs">
                                        @php
                                            $hutang = $payment->spp->nominal - $payment->jumlah_bayar;
                                        @endphp
                                        @if ($hutang == 0)
                                            <div class="btn btn-success btn-sm">LUNAS</div>
                                        @elseif ($hutang < 0)
                                            <div class="btn btn-primary btn-sm"><strong>KEMBALI</strong></div>
                                        @else
                                            Kurang Rp.{{ number_format($hutang, 0, ',', '.') }}
                                        @endif
                                        </span>
                                    </td>
                                    <td class="align-middle text-center">
                                      <!-- Button Trigger Modal -->
                                        <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editPaymentModal-{{ $payment->id }}">
                                            <i class="ti-pencil"></i>
                                        </a>


                                        <form action="{{ route('payment.destroy', $payment->id) }}" method="post" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data siswa ini?')" class="btn btn-danger btn-sm">
                                                <i class="ti-trash"></i>
                                            </button>
                                        </form>
                                           <!-- Modal -->
                                           <div class="modal fade" id="editPaymentModal-{{ $payment->id }}" tabindex="-1" role="dialog" aria-labelledby="editPaymentModalLabel-{{ $payment->id }}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form action="{{ route('payment.update', $payment->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editPaymentModalLabel-{{ $payment->id }}">Bayar Cicilan</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h6 style="text-align: left;">{{$payment->student->name }} = Hutang RP. {{ number_format($hutang, 0, '', ',')}}</h6>
                                                            <br>
                                                            <div class="form-group">

                                                                <input type="number" name="jumlah_bayar" id="jumlah_bayar" class="form-control" required>
                                                            </div>
                                                        </div>

                                                        <input type="hidden" name="user_id" value="{{ $payment->user_id }}">
                                                        <input type="hidden" name="spp_id" value="{{ $payment->spp_id }}">
                                                        <input type="hidden" name="student_id" value="{{ $payment->student_id }}">
                                                        <input type="hidden" name="tgl_bayar" value="{{ $payment->tgl_bayar }}">
                                                        <div class="modal-footer">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

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
