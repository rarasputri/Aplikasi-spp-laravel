
@extends('layout.home')
@section('title', 'Data Kelas')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card my-4">
            <div class="card-header bg-primary shadow-dark border-radius-lg pt-4 pb-3">
                <h6 class="text-black text-capitalize ps-3">Edit Data Siswaa</h6>
            </div>
            <div class="card-body px-4 pb-2">
            <form action="{{ route('classes.update', $class->id) }}" method="POST">
            {!! csrf_field() !!}
            @method("PATCH")
                <div class="form-group">
                    <label for="name">Nama Siswa</label>
                    <input
                        type="text"
                        class="form-control"
                        id="name"
                        name="name"
                        value="{{ $class->name }}">
                </div>
                <div class="form-group">
                    <label for="name">Kelas</label>
                    <input
                        type="text"
                        class="form-control"
                        id="kelas"
                        name="kelas"
                        value="{{ $class->kelas }}">
                </div>
                <div class="form-group">
                    <label for="name">Program Keahlian</label>
                    <input
                        type="text"
                        class="form-control"
                        id="name"
                        name="major"
                        value="{{ $class->major }}">
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
