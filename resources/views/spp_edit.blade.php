
@extends('layout.home')
@section('title', 'Data SPP')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card my-4">
            <div class="card-header bg-primary shadow-dark border-radius-lg pt-4 pb-3">
                <h6 class="text-black text-capitalize ps-3">Edit Spp</h6>
            </div>
            <div class="card-body px-4 pb-2">
            <form action="{{ route('spp.update', $spp->id) }}" method="POST">
            {!! csrf_field() !!}
            @method("PATCH")
                <div class="form-group">
                    <label for="nominal">Nominal</label>
                    <input
                        type="text"
                        class="form-control"
                        id="nominal"
                        name="nominal"
                        value="{{ $spp->nominal }}">
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
