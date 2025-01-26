@extends('layout.home')
@section('title', 'Transaksi')
@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="ti-money text-success"></i> Transaksi Pembayaran
                    </h5>
                    <span class="text-muted">Isi form berikut untuk melakukan pembayaran</span>
                </div>
                <div class="card-body">
                    <form action="{{ route('payment.store') }}" method="POST">
                        @csrf

                        <!-- NISN -->
                        <div class="form-group">
                            <label for="nisn" class="form-label">
                                <i class="ti-id-badge text-success"></i> NISN Siswa
                            </label>
                            <input
                                type="text"
                                class="form-control"
                                id="nisn"
                                name="nisn"
                                value="{{ $student->nisn }}"
                                disabled>
                        </div>

                        <!-- Hidden Input for Student ID -->
                        <input type="hidden" name="student_id" value="{{ $student->id }}">

                        <!-- Petugas -->
                        <div class="form-group">
                            <label for="user_id" class="form-label">
                                <i class="ti-user text-success"></i> Petugas
                            </label>
                            <select name="user_id" id="user_id" class="form-control">
                                @foreach ($users as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- SPP -->
                        <div class="form-group">
                            <label for="spp_id" class="form-label">
                                <i class="ti-wallet text-success"></i> SPP
                            </label>
                            <select name="spp_id" id="spp_id" class="form-control">
                                @foreach ($spps as $id => $nominal)
                                    <option value="{{ $id }}">Rp {{ number_format($nominal, 0, ',', '.') }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Jumlah Bayar -->
                        <div class="form-group">
                            <label for="jumlah_bayar" class="form-label">
                                <i class="ti-money text-success"></i> Jumlah Bayar
                            </label>
                            <input
                                type="number"
                                class="form-control"
                                id="jumlah_bayar"
                                name="jumlah_bayar"
                                placeholder="Masukkan jumlah bayar"
                                required>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary text-white">
                                 Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
