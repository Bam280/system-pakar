@php
    $title = $tujuan->exists ? 'Edit' : 'Tambah';
    $route = $tujuan->exists ? route('tujuan.update', $tujuan->id) : route('tujuan.store');
    $method = $tujuan->exists ? 'PUT' : 'POST';
@endphp


@extends('layouts.dashboard.main')

@section('content')
    <div class="pb-3">
        <h3>{{ $title }} Nilai Tujuan</h3>
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
                            <label class="form-label" for="deskripsi_tujuan">Deskripsi Tujauan</label>
                            <input type="longtext" class="form-control" id="deskripsi_tujuan" name="deskripsi_tujuan"
                                value="{{ old('deskripsi_tujuan') ?? $tujuan->deskripsi_tujuan }}"
                                placeholder="Desc Tujuan">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="ref_tujuan_id">Referensi Tujuan</label>
                            <select class="form-select" aria-label="Default select example">
                                @foreach (App\Models\RefTujuan::all() as $reftujuan)
                                    <option selected>{{ old('tujuan_keamanan') ?? $reftujuan->tujuan_keamanan }}</option>
                                    <option value="{{ $reftujuan->id }}">{{ $reftujuan->tujuan_keamanan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="iiv_id">Sistem Terkait</label>
                            <select class="form-select" aria-label="Default select example">
                                @foreach (App\Models\IIV::all() as $sistem)
                                    <option selected>{{ old('nama') ?? $sistem->nama }}</option>
                                    <option value="{{ $sistem->id }}">{{ $sistem->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
