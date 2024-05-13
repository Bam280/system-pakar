@extends('layouts.dashboard.main')

@section('content')
    <div class="pb-3">
        <h1>Table Nilai Tujuan</h1>
    </div>

    <div class="row">
        <div class="col">
            {{-- <a href="{{ route('kendali.create') }}" class="btn btn-primary mb-3">Tambah</a> --}}
            <div class="card mb-grid">
                <div class="table-responsive-md">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

    {{ $dataTable->scripts() }}
@endpush
