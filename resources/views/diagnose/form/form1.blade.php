@extends('layouts.app')

@section('content')

@if($errors->any())
<div class="alert alert-danger mt-5">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card mt-5">
    <h5 class="card-header">Featured</h5>
    <div class="card-body">
        <form action="" method="post">
            @csrf
            <div class="mb-3">
                <label for="nama_sistem" class="form-label">Nama Sistem</label>
                <input type="text" name="nama_sistem" class="form-control" id="nama_sistem">
            </div>

            <div class="mb-3">
                <label for="deskripsi_sistem" class="form-label">Deskripsi Sistem</label>
                <textarea class="form-control" name="deskripsi_sistem" id="deskripsi_sistem" rows="3"></textarea>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="kesamaan_sistem" name="kesamaan_sistem">
                <label class="form-check-label" for="kesamaan_sistem">Kesamaan Sistem</label>
            </div>

            <button type="submit" class="btn btn-primary">Berikutnya</button>
        </form>
    </div>
</div>
@endsection