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
                        <div class="card">
                            <div class="card-header">
                                Quote
                            </div>
                            <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <p>Untuk setiap variabel tatakelola di bawah, silakan pilih jenis ada peraturan,
                                        standar, ataupun
                                        alur kerja yang mendasari.
                                        Pilihan jenis adalah lokal instansi, nasional, dan internasional. Untuk setiap
                                        variabel bisa
                                        dipilih salah satu, dua atau bahkan ketiganya</p>
                                </blockquote>
                            </div>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="sistem_terhubung_lan" class="form-label">Kriteria Pendanaan pengamanan</label>
                            <select class="js-example-basic-multiple form-control" name="kriteria_pendanaan_pengamanan[]"
                                multiple="multiple">
                                @foreach ($allTatakelola as $tk)
                                    <option @selected(in_array($tk->deskripsi_jenis, old('kriteria_pendanaan_pengamanan') ?? (@$data_form4['kriteria_pendanaan_pengamanan'] ?? [])))>
                                        {{ $tk->deskripsi_jenis }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sistem_terhubung_lan" class="form-label">Kriteria Pendanaan Pemulihan</label>
                            <select class="js-example-basic-multiple form-control" name="kriteria_pendanaan_pemulihan[]"
                                multiple="multiple">
                                @foreach ($allTatakelola as $tk)
                                    <option @selected(in_array($tk->deskripsi_jenis, old('kriteria_pendanaan_pemulihan') ?? (@$data_form4['kriteria_pendanaan_pemulihan'] ?? [])))>
                                        {{ $tk->deskripsi_jenis }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sistem_terhubung_lan" class="form-label">Kriteria Pendanaan Pendukung</label>
                            <select class="js-example-basic-multiple form-control" name="kriteria_pendanaan_pendukung[]"
                                multiple="multiple">
                                @foreach ($allTatakelola as $tk)
                                    <option @selected(in_array($tk->deskripsi_jenis, old('kriteria_pendanaan_pendukung') ?? (@$data_form4['kriteria_pendanaan_pendukung'] ?? [])))>
                                        {{ $tk->deskripsi_jenis }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sistem_terhubung_lan" class="form-label">Kriteria keterampilan pengamanan</label>
                            <select class="js-example-basic-multiple form-control" name="kriteria_keterampilan_pengamanan[]"
                                multiple="multiple">
                                @foreach ($allTatakelola as $tk)
                                    <option @selected(in_array($tk->deskripsi_jenis, old('kriteria_keterampilan_pengamanan') ?? (@$data_form4['kriteria_keterampilan_pengamanan'] ?? [])))>
                                        {{ $tk->deskripsi_jenis }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sistem_terhubung_lan" class="form-label">kriteria keterampilan identifikasi</label>
                            <select class="js-example-basic-multiple form-control"
                                name="kriteria_keterampilan_identifikasi[]" multiple="multiple">
                                @foreach ($allTatakelola as $tk)
                                    <option @selected(in_array($tk->deskripsi_jenis, old('kriteria_keterampilan_identifikasi') ?? (@$data_form4['kriteria_keterampilan_identifikasi'] ?? [])))>
                                        {{ $tk->deskripsi_jenis }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sistem_terhubung_lan" class="form-label">Kesadaran Interdependensi</label>
                            <select class="js-example-basic-multiple form-control" name="kesadaran_interdepen[]"
                                multiple="multiple">
                                @foreach ($allTatakelola as $tk)
                                    <option @selected(in_array($tk->deskripsi_jenis, old('kesadaran_interdepen') ?? (@$data_form4['kesadaran_interdepen'] ?? [])))>
                                        {{ $tk->deskripsi_jenis }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sistem_terhubung_lan" class="form-label">Kriteria Kesadaran Risiko</label>
                            <select class="js-example-basic-multiple form-control" name="kriteria_kesadaran_risiko[]"
                                multiple="multiple">
                                @foreach ($allTatakelola as $tk)
                                    <option @selected(in_array($tk->deskripsi_jenis, old('kriteria_kesadaran_risiko') ?? (@$data_form4['kriteria_kesadaran_risiko'] ?? [])))>
                                        {{ $tk->deskripsi_jenis }}
                                    </option>
                                @endforeach
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
                        <div class="card">
                            <div class="card-header">
                                Quote
                            </div>
                            <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <p>Untuk setiap variabel sumber daya di bawah, silakan pilih apakah tersedia atau tidak
                                        dengan memilih ya atau tidak.
                                        Nilai awal untuk setiap variabel adalah tidak</p>
                                </blockquote>
                            </div>
                        </div>
                        <br>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="sistem_terhubung_lan" class="form-label">Regulasi Tujuan</label>
                                </div>
                                <div class="col-md-auto">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="regulasi_tujuan"
                                            id="inlineRadio1" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="regulasi_tujuan"
                                            id="inlineRadio2" value="0">
                                        <label class="form-check-label" for="inlineRadio2">Tidak</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="sistem_terhubung_lan" class="form-label">Regulasi Fungsi</label>
                                </div>
                                <div class="col-md-auto">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="regulasi_fungsi"
                                            id="inlineRadio1" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="regulasi_fungsi"
                                            id="inlineRadio2" value="0">
                                        <label class="form-check-label" for="inlineRadio2">Tidak</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="sistem_terhubung_lan" class="form-label">Regulasi Risiko</label>
                                </div>
                                <div class="col-md-auto">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="regulasi_risiko"
                                            id="inlineRadio1" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="regulasi_risiko"
                                            id="inlineRadio2" value="0">
                                        <label class="form-check-label" for="inlineRadio2">Tidak</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="sistem_terhubung_lan" class="form-label">Standart Fungsi</label>
                                </div>
                                <div class="col-md-auto">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="standart_fungsi"
                                            id="inlineRadio1" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="standart_fungsi"
                                            id="inlineRadio2" value="0">
                                        <label class="form-check-label" for="inlineRadio2">Tidak</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="sistem_terhubung_lan" class="form-label">Standart Aplikasi</label>
                                </div>
                                <div class="col-md-auto">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="standart_aplikasi"
                                            id="inlineRadio1" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="standart_aplikasi"
                                            id="inlineRadio2" value="0">
                                        <label class="form-check-label" for="inlineRadio2">Tidak</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="sistem_terhubung_lan" class="form-label">Alur Tujuan</label>
                                </div>
                                <div class="col-md-auto">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="alur_tujuan"
                                            id="inlineRadio1" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="alur_tujuan"
                                            id="inlineRadio2" value="0">
                                        <label class="form-check-label" for="inlineRadio2">Tidak</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="sistem_terhubung_lan" class="form-label">Alur Fungsi</label>
                                </div>
                                <div class="col-md-auto">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="alur_fungsi"
                                            id="inlineRadio1" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="alur_fungsi"
                                            id="inlineRadio2" value="0">
                                        <label class="form-check-label" for="inlineRadio2">Tidak</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="sistem_terhubung_lan" class="form-label">Alur Risiko</label>
                                </div>
                                <div class="col-md-auto">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="alur_risiko"
                                            id="inlineRadio1" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="alur_risiko"
                                            id="inlineRadio2" value="0">
                                        <label class="form-check-label" for="inlineRadio2">Tidak</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="sistem_terhubung_lan" class="form-label">Alur aplikasi</label>
                                </div>
                                <div class="col-md-auto">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="alur_aplikasi"
                                            id="inlineRadio1" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="alur_aplikasi"
                                            id="inlineRadio2" value="0">
                                        <label class="form-check-label" for="inlineRadio2">Tidak</label>
                                    </div>
                                </div>
                            </div>
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
