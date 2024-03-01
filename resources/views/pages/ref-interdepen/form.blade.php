@php
$title = $refInterdepen->exists ? 'Edit' : 'Tambah';
$route = $refInterdepen->exists ? 
route('ref-interdepen.update', $refInterdepen->id) :
route('ref-interdepen.store');
$method = $refInterdepen->exists ? 'PUT' : 'POST';
@endphp


@extends('layouts.dashboard.main')

@section('content')
<div class="pb-3">
    <h3>{{ $title }} Ref Interdepen</h3>
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
                        <label class="form-label" for="indikator_interdepen">Indikator Interdepen</label>
                        <input type="text" class="form-control" id="indikator_interdepen" name="indikator_interdepen" value="{{ old('indikator_interdepen') ?? $refInterdepen->indikator_interdepen }}" placeholder="Nama Interdepen">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection