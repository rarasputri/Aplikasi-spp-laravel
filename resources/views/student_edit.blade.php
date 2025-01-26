@extends('layout.home')
@section('title', 'Data Siswa')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card my-4">
            <div class="card-header bg-primary shadow-success border-radius-lg pt-4 pb-3">
                <h6 class="text-black text-capitalize ps-3">Edit Data Siswa</h6>
            </div>
            <div class="card-body px-4 pb-2">
            <form action="{{ route('student.update', $student->id) }}" method="POST">
            {!! csrf_field() !!}
            @method("PATCH")
                <div class="form-group">
                    <label for="name">Nama Siswa</label>
                    <input
                        type="text"
                        class="form-control"
                        id="name"
                        name="name"
                        value="{{ $student->name }}">
                </div>
                <div class="form-group">
                    <label for="name">Email</label>
                    <input
                        type="email"
                        class="form-control"
                        id="email"
                        name="email"
                        value="{{ $student->email }}">
                </div>
                <div class="form-group">
                    <label for="name">NISN</label>
                    <input
                        type="number"
                        class="form-control"
                        id=""
                        name="nisn"
                        value="{{ $student->nisn }}">
                </div>
                <div class="form-group">
                    <label for="name">NIS</label>
                    <input
                        type="number"
                        class="form-control"
                        id=""
                        name="nis"
                        value="{{ $student->nis }}">
                </div>
                <div class="form-group">
                    <label for="name">Alamat</label>
                    <input
                        type="text"
                        class="form-control"
                        id=""
                        name="alamat"
                        value="{{ $student->alamat }}">
                </div>
                <div class="form-group">
                    <label for="name">No Telp</label>
                    <input
                        type="number"
                        class="form-control"
                        id=""
                        name="no_telp"
                        value="{{ $student->no_telp }}">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
            </div>
            </div>
        </div>

</div>
@endsection
