@extends('layouts.dashboard.main')

@section('content')
    <div class="card">
        <h5 class="card-header">Perhitungan Kemiripan sistem</h5>
        <div class="card-body">
            <form action="{{ route('diagnose.form.form4.store') }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <strong>

                            Penilaian Tata Kelola
                        </strong>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="sistem_terhubung_lan" class="form-label">Kriteria Pendanaan pengamanan</label>
                            <select class="js-example-basic-multiple form-control" name="kriteria_pendanaan_pengamanan[]"
                                multiple="multiple">
                                @foreach ($allSumberdaya as $sd)
                                    <option @selected(in_array($sd->deskripsi_sumberdaya, old('sistem_terhubung_lan') ?? (@$data_form2['kriteria_pendanaan_pengamanan'] ?? [])))>
                                        {{ $sd->deskripsi_sumberdaya }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sistem_terhubung_lan" class="form-label">Kriteria Pendanaan Pemulihan</label>
                            <select class="js-example-basic-multiple form-control" name="kriteria_pendanaan_pemulihan[]"
                                multiple="multiple">
                                @foreach ($allSumberdaya as $sd)
                                    <option @selected(in_array($sd->deskripsi_sumberdaya, old('sistem_terhubung_lan') ?? (@$data_form2['kriteria_pendanaan_pemulihan'] ?? [])))>
                                        {{ $sd->deskripsi_sumberdaya }}
                                    </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sistem_terhubung_lan" class="form-label">Kriteria Pendanaan Pendukung</label>
                            <select class="js-example-basic-multiple form-control" name="kriteria_pendanaan_pendukung[]"
                                multiple="multiple">
                                @foreach ($allSumberdaya as $sd)
                                    <option @selected(in_array($sd->deskripsi_sumberdaya, old('sistem_terhubung_lan') ?? (@$data_form2['kriteria_pendanaan_pendukung'] ?? [])))>
                                        {{ $sd->deskripsi_sumberdaya }}
                                    </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sistem_terhubung_lan" class="form-label">Kriteria keterampilan pengamanan</label>
                            <select class="js-example-basic-multiple form-control" name="kriteria_keterampilan_pengamanan[]"
                                multiple="multiple">
                                @foreach ($allSumberdaya as $sd)
                                    <option @selected(in_array($sd->deskripsi_sumberdaya, old('sistem_terhubung_lan') ?? (@$data_form2['kriteria_keterampilan_pengamanan'] ?? [])))>
                                        {{ $sd->deskripsi_sumberdaya }}
                                    </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sistem_terhubung_lan" class="form-label">kriteria keterampilan identifikasi</label>
                            <select class="js-example-basic-multiple form-control"
                                name="kriteria_keterampilan_identifikasi[]" multiple="multiple">
                                @foreach ($allSumberdaya as $sd)
                                    <option @selected(in_array($sd->deskripsi_sumberdaya, old('sistem_terhubung_lan') ?? (@$data_form2['kriteria_keterampilan_identifikasi'] ?? [])))>
                                        {{ $sd->deskripsi_sumberdaya }}
                                    </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sistem_terhubung_lan" class="form-label">Kesadaran Interdependensi</label>
                            <select class="js-example-basic-multiple form-control" name="kesadaran_interdepen[]"
                                multiple="multiple">
                                @foreach ($allSumberdaya as $sd)
                                    <option @selected(in_array($sd->deskripsi_sumberdaya, old('sistem_terhubung_lan') ?? (@$data_form2['kesadaran_interdepen'] ?? [])))>
                                        {{ $sd->deskripsi_sumberdaya }}
                                    </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sistem_terhubung_lan" class="form-label">Kriteria Kesadaran Risiko</label>
                            <select class="js-example-basic-multiple form-control" name="kriteria_kesadaran_risiko[]"
                                multiple="multiple">
                                @foreach ($allSumberdaya as $sd)
                                    <option @selected(in_array($sd->deskripsi_sumberdaya, old('sistem_terhubung_lan') ?? (@$data_form2['kriteria_kesadaran_risiko'] ?? [])))>
                                        {{ $sd->deskripsi_sumberdaya }}
                                    </option>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">
                        <strong>

                            Penilaian Sumberdaya
                        </strong>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="sistem_terhubung_lan" class="form-label">Regulasi Tujuan</label>
                            <select class="js-example-basic-multiple form-control" name="regulasi_tujuan[]"
                                multiple="multiple">
                                @foreach ($allTatakelola as $tk)
                                    <option @selected(in_array($tk->deskripsi_tatakelola, old('sistem_terhubung_lan') ?? (@$data_form2['regulasi_tujuan'] ?? [])))>
                                        {{ $tk->deskripsi_tatakelola }}
                                    </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sistem_terhubung_lan" class="form-label">Regulasi Fungsi</label>
                            <select class="js-example-basic-multiple form-control" name="regulasi_fungsi[]"
                                multiple="multiple">
                                @foreach ($allTatakelola as $tk)
                                    <option @selected(in_array($tk->deskripsi_tatakelola, old('sistem_terhubung_lan') ?? (@$data_form2['regulasi_fungsi'] ?? [])))>
                                        {{ $tk->deskripsi_tatakelola }}
                                    </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sistem_terhubung_lan" class="form-label">Regulasi Risiko</label>
                            <select class="js-example-basic-multiple form-control" name="regulasi_risiko[]"
                                multiple="multiple">
                                @foreach ($allTatakelola as $tk)
                                    <option @selected(in_array($tk->deskripsi_tatakelola, old('sistem_terhubung_lan') ?? (@$data_form2['regulasi_risiko'] ?? [])))>
                                        {{ $tk->deskripsi_tatakelola }}
                                    </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sistem_terhubung_lan" class="form-label">Standart Fungsi</label>
                            <select class="js-example-basic-multiple form-control" name="standar_fungsi[]"
                                multiple="multiple">
                                @foreach ($allTatakelola as $tk)
                                    <option @selected(in_array($tk->deskripsi_tatakelola, old('sistem_terhubung_lan') ?? (@$data_form2['standar_fungsi'] ?? [])))>
                                        {{ $tk->deskripsi_tatakelola }}
                                    </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sistem_terhubung_lan" class="form-label">Standart Aplikasi</label>
                            <select class="js-example-basic-multiple form-control" name="standar_aplikasi[]"
                                multiple="multiple">
                                @foreach ($allTatakelola as $tk)
                                    <option @selected(in_array($tk->deskripsi_tatakelola, old('sistem_terhubung_lan') ?? (@$data_form2['standar_aplikasi'] ?? [])))>
                                        {{ $tk->deskripsi_tatakelola }}
                                    </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sistem_terhubung_lan" class="form-label">Alur Tujuan</label>
                            <select class="js-example-basic-multiple form-control" name="alur_tujuan[]" multiple="multiple">
                                <@foreach ($allTatakelola as $tk)
                                    <option @selected(in_array($tk->deskripsi_tatakelola, old('sistem_terhubung_lan') ?? (@$data_form2['alur_tujuan'] ?? [])))>
                                        {{ $tk->deskripsi_tatakelola }}
                                    </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sistem_terhubung_lan" class="form-label">Alur Fungsi</label>
                            <select class="js-example-basic-multiple form-control" name="alur_fungsi[]" multiple="multiple">
                                @foreach ($allTatakelola as $tk)
                                    <option @selected(in_array($tk->deskripsi_tatakelola, old('sistem_terhubung_lan') ?? (@$data_form2['alur_fungsi'] ?? [])))>
                                        {{ $tk->deskripsi_tatakelola }}
                                    </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sistem_terhubung_lan" class="form-label">Alur Risiko</label>
                            <select class="js-example-basic-multiple form-control" name="alur_risiko[]"
                                multiple="multiple">
                                @foreach ($allTatakelola as $tk)
                                    <option @selected(in_array($tk->deskripsi_tatakelola, old('sistem_terhubung_lan') ?? (@$data_form2['alur_risiko'] ?? [])))>
                                        {{ $tk->deskripsi_tatakelola }}
                                    </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sistem_terhubung_lan" class="form-label">Alur aplikasi</label>
                            <select class="js-example-basic-multiple form-control" name="alur_aplikasi[]"
                                multiple="multiple">
                                @foreach ($allTatakelola as $tk)
                                    <option @selected(in_array($tk->deskripsi_tatakelola, old('sistem_terhubung_lan') ?? (@$data_form2['alur_aplikasi'] ?? [])))>
                                        {{ $tk->deskripsi_tatakelola }}
                                    </option>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Berikutnya</button>
            </form>
        </div>
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
