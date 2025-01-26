@extends('layout.home') @section('title', 'Data SPP') @section('content')

<!-- Button to open modal -->
<div class="px-3 mb-3">
    <button
        type="button"
        class="btn btn-primary"
        data-toggle="modal"
        data-target="#exampleModal">
        <i class="ti-plus"></i>
        Tambah Data SPP
    </button>
</div>

<!-- Modal -->
<div
    class="modal fade"
    id="exampleModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data SPP</h5>
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" action="{{ route('spp.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nominal">Nominal</label>
                        <input
                            type="number"
                            class="form-control border-dark p-2"
                            id="nominal"
                            name="nominal"
                            placeholder="Masukkan Nominal"
                            required="required">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">

                        Tutup
                    </button>
                    <button type="submit" class="btn btn-primary">

                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Card for displaying SPP data -->
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card my-4">
        <div class="card-header">

            <h5>
                Data SPP Siswa
            </h5>
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
        <div class="card-body px-0 pb-2">

            <div class="table-responsive p-3">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th
                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                            <th
                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nominal</th>
                            <th
                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tahun Ajar</th>
                            <th
                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($spps as $spp)
                        <tr>
                            <td class="align-middle text-center">
                                <span class="text-xs font-weight-bold">{{ $loop->iteration }}</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-xs font-weight-bold">{{ "Rp. " . number_format($spp->nominal, 0, ',', '.') }}</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-xs font-weight-bold">{{ $spp->tahun }}</span>
                            </td>
                            <td class="align-middle text-center">
                                <!-- Edit button -->
                                <a href="{{ route('spp.edit', $spp->id) }}" class="btn btn-warning btn-sm">
                                    <i class="ti-pencil"></i>
                                </a>
                                <!-- Delete button -->
                                <form
                                    action="{{ route('spp.destroy', $spp->id) }}"
                                    method="post"
                                    style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button
                                        type="submit"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data SPP ini?')"
                                        class="btn btn-danger btn-sm">
                                        <i class="ti-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-secondary">Tidak ada data SPP.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
