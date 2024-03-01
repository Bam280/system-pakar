@php
$title = $refTujuan->exists ? 'Edit' : 'Tambah';
$route = $refTujuan->exists ? 
route('ref-tujuan.update', $refTujuan->id) :
route('ref-tujuan.store');
$method = $refTujuan->exists ? 'PUT' : 'POST';
@endphp


@extends('layouts.dashboard.main')

@section('content')
<div class="pb-3">
    <h3>{{ $title }} Ref Tujuan</h3>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="row">
    <div class="col">
        <div class="card mb-grid">
            <div class="card-body">
                <form action="{{ $route }}" method="POST">
                    @csrf
                    @method($method)
                    <div class="form-group">
                        <label class="form-label" for="tujuan_keamanan">Tujuan Keamanan</label>
                        <input type="text" class="form-control" id="tujuan_keamanan" name="tujuan_keamanan" value="{{ old('tujuan_keamanan') ?? $refTujuan->tujuan_keamanan }}" placeholder="Nama Tujuan">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection