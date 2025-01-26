@extends('layout.home')
@section('title', 'Data Kelas')
@section('content')

<!-- Button to open modal -->
<div class="px-3 mb-3">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
       Tambah Data Siswa
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" action="{{ route('classes.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Siswa</label>
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            name="name"
                            placeholder="Masukkan Nama Siswa"
                            required="required">
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input
                            type="text"
                            class="form-control"
                            id="kelas"
                            name="kelas"
                            placeholder="Masukkan Kelas"
                            required="required">
                    </div>
                    <div class="form-group">
                        <label for="major">Program Keahlian</label>
                        <input
                            type="text"
                            class="form-control"
                            id="major"
                            name="major"
                            placeholder="Masukkan Program Keahlian"
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

<!-- Card for displaying classes -->
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card my-4">
        <div class="card-header">

                <h6 class="text-black text-capitalize ps-3">
                    Data Kelas Siswa
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
        <div class="card-body px-0 pb-2">

            <div class="table-responsive p-3">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Siswa</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kelas</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Program Keahlian</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($classes as $class)
                            <tr>
                                <td class="align-middle text-center">
                                    <span class="text-xs font-weight-bold">{{ $loop->iteration }}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-xs font-weight-bold">{{ $class->name }}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-xs font-weight-bold">{{ $class->kelas }}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-xs font-weight-bold">{{ $class->major }}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <!-- Edit button -->
                                    <a href="{{ route('classes.edit', $class->id) }}" class="btn btn-warning btn-sm">
                                        <i class="ti-pencil"></i>
                                    </a>
                                    <!-- Delete button -->
                                    <form action="{{ route('classes.destroy', $class->id) }}" method="post" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data kelas ini?')" class="btn btn-danger btn-sm">
                                            <i class="ti-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-secondary">Tidak ada data kelas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
