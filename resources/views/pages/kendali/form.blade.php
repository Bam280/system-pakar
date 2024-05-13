@php
    $title = $kendali->exists ? 'Edit' : 'Tambah';
    $route = $kendali->exists ? route('kendali.update', $kendali->id) : route('kendali.store');
    $method = $kendali->exists ? 'PUT' : 'POST';
@endphp


@extends('layouts.dashboard.main')

@section('content')
    <div class="pb-3">
        <h3>{{ $title }} Ref Instansi</h3>
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
                            <label class="form-label" for="nama_instansi">Nama Instansi</label>
                            <input type="text" class="form-control" id="nama_instansi" name="nama_instansi"
                                value="{{ old('nama_instansi') ?? $kendali->nama_instansi }}" placeholder="Nama Instansi">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
