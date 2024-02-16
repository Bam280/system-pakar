@php
$title = $refFungsi->exists ? 'Edit' : 'Tambah';
$route = $refFungsi->exists ? 
route('ref-fungsi.update', $refFungsi->id) :
route('ref-fungsi.store');
$method = $refFungsi->exists ? 'PUT' : 'POST';
@endphp


@extends('layouts.dashboard.main')

@section('content')
<div class="pb-3">
    <h3>{{ $title }} Ref Fungsi</h3>
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
                        <label class="form-label" for="indikator_fungsi">Indikator Fungsi</label>
                        <input type="text" class="form-control" id="indikator_fungsi" name="indikator_fungsi" value="{{ old('indikator_fungsi') ?? $refFungsi->indikator_fungsi }}" placeholder="Nama Fungsi">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection