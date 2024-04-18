@php
    $title = $iiv->exists ? 'Edit' : 'Tambah';
    $route = $iiv->exists ? route('iiv.update', $iiv->id) : route('iiv.store');
    $method = $iiv->exists ? 'PUT' : 'POST';
@endphp


@extends('layouts.dashboard.main')

@section('content')
    <div class="pb-3">
        <h3>{{ $title }} IIV </h3>
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
                            <label class="form-label" for="nama">Nama IIV</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ old('nama') ?? $iiv->nama }}" placeholder="Nama IIV" disabled>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="nama">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi_sistem" name="deskripsi_sistem"
                                value="{{ old('deskripsi_sistem') ?? $iiv->deskripsi_sistem }}"
                                placeholder="Deskripsi Sistem">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="ref_instansi_id">Instansi</label>
                            @can('admin-access')
                                <select class="form-control js-example-basic-single" name="ref_instansi_id">
                                @else
                                    <select class="form-control js-example-basic-single" name="ref_instansi_id" disabled>
                                    @endcan
                                    <option value="">Instansi</option>
                                    @foreach (App\Models\RefInstansi::all() as $instansi)
                                        <option value="{{ $instansi->id }}" @selected($instansi->id === (old('ref_instansi_id') ?? $iiv->ref_instansi_id))>
                                            {{ $instansi->nama_instansi }}
                                        </option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="nilai_risiko">Nilai Risiko</label>
                            <input type="text" class="form-control" id="nilai_risiko" name="nilai_risiko"
                                value="{{ old('nilai_risiko') ?? $iiv->nilai_risiko }}" placeholder="Nilai Risiko">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endpush
