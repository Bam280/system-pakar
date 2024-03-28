@extends('layouts.dashboard.main')

@section('content')
    <div class="card">
        <h5 class="card-header">Perhitungan Kemiripan sistem</h5>
        <div class="card-body">
            <form action="{{ route('diagnose.form.form4.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="sistem_terhubung_lan" class="form-label">Kriteria Pendanaan pengamanan</label>
                    <select class="js-example-basic-multiple form-control" name="sistem_terhubung_lan[]" multiple="multiple">
                        <option>
                            ...
                        </option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="sistem_terhubung_lan" class="form-label">Kriteria Pendanaan Pemulihan</label>
                    <select class="js-example-basic-multiple form-control" name="sistem_terhubung_lan[]"
                        multiple="multiple">
                        <option>
                            ...
                        </option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="sistem_terhubung_lan" class="form-label">Kriteria Pendanaan Pendukung</label>
                    <select class="js-example-basic-multiple form-control" name="sistem_terhubung_lan[]"
                        multiple="multiple">
                        <option>
                            ...
                        </option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="sistem_terhubung_lan" class="form-label">Kriteria keterampilan pengamanan</label>
                    <select class="js-example-basic-multiple form-control" name="sistem_terhubung_lan[]"
                        multiple="multiple">
                        <option>
                            ...
                        </option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="sistem_terhubung_lan" class="form-label">kriteria keterampilan identifikasi</label>
                    <select class="js-example-basic-multiple form-control" name="sistem_terhubung_lan[]"
                        multiple="multiple">
                        <option>
                            ...
                        </option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="sistem_terhubung_lan" class="form-label">Kesadaran Interdependensi</label>
                    <select class="js-example-basic-multiple form-control" name="sistem_terhubung_lan[]"
                        multiple="multiple">
                        <option>
                            ...
                        </option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="sistem_terhubung_lan" class="form-label">Kriteria Kesadaran Risiko</label>
                    <select class="js-example-basic-multiple form-control" name="sistem_terhubung_lan[]"
                        multiple="multiple">
                        <option>
                            ...
                        </option>
                    </select>
                </div>
                <a href="" class="btn btn-success">Berikutnya</a>
            </form>
        </div>
    @endsection
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2({
                    tags: true
                });
            });
        </script>
    @endpush
