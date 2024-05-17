@php
    $title = $interdepen->exists ? 'Edit' : 'Tambah';
    $route = $interdepen->exists ? route('interdepen.update', $interdepen->id) : route('interdepen.store');
    $method = $interdepen->exists ? 'PUT' : 'POST';
@endphp


@extends('layouts.dashboard.main')

@section('content')
    <div class="pb-3">
        <h3>{{ $title }} Interdepen </h3>
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
                            <label class="form-label" for="ref_interdepen_id">Ref Interdepen</label>
                            <input type="text" class="form-control" id="ref_interdepen_id" name="ref_interdepen_id"
                                value="{{ old('ref_interdepen_id') ?? $interdepen->ref_interdepen_id }}"
                                placeholder="Nama IIV">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="sistem_elektronik_id">Deskripsi</label>
                            <input type="longtext" class="form-control" id="sistem_elektronik_id"
                                name="sistem_elektronik_id"
                                value="{{ old('sistem_elektronik_id') ?? $interdepen->sistem_elektronik_id }}"
                                placeholder="Deskripsi Sistem">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="ref_instansi_id">Instansi</label>
                            <select class="form-control js-example-basic-single" name="ref_instansi_id">
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
