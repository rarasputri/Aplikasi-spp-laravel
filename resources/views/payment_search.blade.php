@extends('layout.home')
@section('title', 'Transaksi')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-10">
            <div class="card">
                <!-- Card Header -->
                <div class="card-header">
                    <h5>Masukan NISN</h5>
                <!-- Card Body -->
                <div class="card-body">
                    <!-- Form to search for NISN -->
                    <form action="{{ route('payment.create') }}" method="GET">
                        <div class="form-group">
                            <label for="nisn" class="form-label">
                                <i class="ti-id-badge text-primary"></i> NISN
                            </label>
                            <input
                                type="number"
                                class="form-control border border-dark p-2"
                                id="nisn"
                                name="nisn"
                                placeholder="Masukkan NISN"
                                required
                            >
                        </div>
                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-primary text-white">
                                <i class="ti-search"></i> Cari
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
