@extends('layout.home')
@section('title', 'Data Siswa')
@section('content')

<!-- Button to open modal for adding student -->
<div class="px-3 mb-3">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Tambah Data Siswa
    </button>
</div>

<!-- Modal for adding student -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">Tambah Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" action="{{ route('student.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="spp_id">Nominal Spp</label>
                        <select name="spp_id" id="spp_id" class="form-control" required>
                            @foreach($spps as $id => $nominal)
                                <option value="{{ $id }}">{{ $nominal }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="classes_id">Kelas</label>
                        <select name="classes_id" id="classes_id" class="form-control" required>
                            @foreach($classes as $id => $kelas)
                                <option value="{{ $id }}">{{ $kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Siswa</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Siswa" required>
                    </div>
                    <div class="form-group">
                        <label for="nisn">NISN</label>
                        <input type="number" class="form-control" id="nisn" name="nisn" required>
                    </div>
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="number" class="form-control" id="nis" name="nis" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No Telp</label>
                        <input type="number" class="form-control" id="no_telp" name="no_telp" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" id="password" name="password" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Card for displaying students data -->
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card my-4">
        <div class="card-header">
            <h6 class="text-black text-capitalize ps-3">Data Diri Siswa</h6>
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
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NISN | NIS</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kelas</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nominal</th>

                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($students as $study)
                        <tr>
                            <td class="align-middle text-center">
                                <span class="text-xs font-weight-bold">{{ $loop->iteration }}</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-xs font-weight-bold">{{ $study->name }}</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-xs font-weight-bold">{{ $study->nisn }} | {{ $study->nis }}</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-xs font-weight-bold">{{ $study->classes->kelas }} -  {{ $study->classes->major }}</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-xs font-weight-bold">{{ "Rp. " . number_format($study->spp->nominal, 0, ',', '.') }}</span>
                            </td>

                            <td class="align-middle text-center">
                                <!-- View button for modal -->
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#viewModal{{ $study->id }}">
                                    <i class="ti-search"></i>
                                </button>

                                <!-- Edit button -->
                                <a href="{{ route('student.edit', $study->id) }}" class="btn btn-warning btn-sm">
                                    <i class="ti-pencil"></i>
                                </a>

                                <!-- Delete button -->
                                <form action="{{ route('student.destroy', $study->id) }}" method="post" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data siswa ini?')" class="btn btn-danger btn-sm">
                                        <i class="ti-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- View Modal for student details -->
                        <div class="modal fade" id="viewModal{{ $study->id }}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel{{ $study->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-gradient-info">
                                        <h5 class="modal-title text-black" id="viewModalLabel{{ $study->id }}">Detail Data Siswa</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Nama Siswa:</strong> {{ $study->name }}</p>
                                        <p><strong>NISN:</strong> {{ $study->nisn }}</p>
                                        <p><strong>NIS:</strong> {{ $study->nis }}</p>
                                        <p><strong>Kelas:</strong> {{ $study->classes->kelas }} - {{ $study->classes->major }}</p>
                                        <p><strong>Nominal SPP:</strong> Rp. {{ number_format($study->spp->nominal, 0, ',', '.') }}</p>
                                        <p><strong>Alamat:</strong> {{ $study->alamat }}</p>
                                        <p><strong>No Telp:</strong> {{ $study->no_telp }}</p>
                                        <p><strong>Email:</strong> {{ $study->email }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @empty
                        <tr>
                            <td colspan="8" class="text-center text-secondary">Tidak ada data siswa.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
