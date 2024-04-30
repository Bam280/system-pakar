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
                            <label for="regulasi_tujuan" class="form-label">Regulasi Tujuan</label>
                            <select class="js-example-basic-multiple form-control" name="regulasi_tujuan[]"
                                multiple="multiple">
                                @foreach ($all_tatakelola as $tk)
                                    <option @selected(in_array($tk->deskripsi_jenis, old('regulasi_tujuan') ?? (@$data_form4['regulasi_tujuan'] ?? [])))>
                                        {{ $tk->deskripsi_jenis }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="regulasi_fungsi" class="form-label">Regulasi Fungsi</label>
                            <select class="js-example-basic-multiple form-control" name="regulasi_fungsi[]"
                                multiple="multiple">
                                @foreach ($all_tatakelola as $tk)
                                    <option @selected(in_array($tk->deskripsi_jenis, old('regulasi_fungsi') ?? (@$data_form4['regulasi_fungsi'] ?? [])))>
                                        {{ $tk->deskripsi_jenis }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="regulasi_risiko" class="form-label">Regulasi Risiko</label>
                            <select class="js-example-basic-multiple form-control" name="regulasi_risiko[]"
                                multiple="multiple">
                                @foreach ($all_tatakelola as $tk)
                                    <option @selected(in_array($tk->deskripsi_jenis, old('regulasi_risiko') ?? (@$data_form4['regulasi_risiko'] ?? [])))>
                                        {{ $tk->deskripsi_jenis }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="standart_fungsi" class="form-label">Standart Fungsi</label>
                            <select class="js-example-basic-multiple form-control" name="standart_fungsi[]"
                                multiple="multiple">
                                @foreach ($all_tatakelola as $tk)
                                    <option @selected(in_array($tk->deskripsi_jenis, old('standart_fungsi') ?? (@$data_form4['standart_fungsi'] ?? [])))>
                                        {{ $tk->deskripsi_jenis }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="standart_aplikasi" class="form-label">Standart Aplikasi</label>
                            <select class="js-example-basic-multiple form-control" name="standart_aplikasi[]"
                                multiple="multiple">
                                @foreach ($all_tatakelola as $tk)
                                    <option @selected(in_array($tk->deskripsi_jenis, old('standart_aplikasi') ?? (@$data_form4['standart_aplikasi'] ?? [])))>
                                        {{ $tk->deskripsi_jenis }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="alur_tujuan" class="form-label">Alur Tujuan</label>
                            <select class="js-example-basic-multiple form-control" name="alur_tujuan[]" multiple="multiple">
                                @foreach ($all_tatakelola as $tk)
                                    <option @selected(in_array($tk->deskripsi_jenis, old('alur_tujuan') ?? (@$data_form4['alur_tujuan'] ?? [])))>
                                        {{ $tk->deskripsi_jenis }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="alur_fungsi" class="form-label">Alur Fungsi</label>
                            <select class="js-example-basic-multiple form-control" name="alur_fungsi[]" multiple="multiple">
                                @foreach ($all_tatakelola as $tk)
                                    <option @selected(in_array($tk->deskripsi_jenis, old('alur_fungsi') ?? (@$data_form4['alur_fungsi'] ?? [])))>
                                        {{ $tk->deskripsi_jenis }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="alur_risiko" class="form-label">Alur Risiko</label>
                            <select class="js-example-basic-multiple form-control" name="alur_risiko[]" multiple="multiple">
                                @foreach ($all_tatakelola as $tk)
                                    <option @selected(in_array($tk->deskripsi_jenis, old('alur_risiko') ?? (@$data_form4['alur_risiko'] ?? [])))>
                                        {{ $tk->deskripsi_jenis }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="alur_aplikasi" class="form-label">Alur aplikasi</label>
                            <select class="js-example-basic-multiple form-control" name="alur_aplikasi[]"
                                multiple="multiple">
                                @foreach ($all_tatakelola as $tk)
                                    <option @selected(in_array($tk->deskripsi_jenis, old('alur_aplikasi') ?? (@$data_form4['alur_aplikasi'] ?? [])))>
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
                                    <label for="kriteria_pendanaan_pengamanan" class="form-label">Pendanaan untuk kendali
                                        pengamanan</label>
                                </div>
                                <div class="col-md-auto">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kriteria_pendanaan_pengamanan"
                                            id="inlineRadio1" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kriteria_pendanaan_pengamanan"
                                            id="inlineRadio2" value="0" checked>
                                        <label class="form-check-label" for="inlineRadio2">Tidak</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="kriteria_pendanaan_pendukung" class="form-label">Pendanaan untuk pendukung
                                        pengamana</label>
                                </div>
                                <div class="col-md-auto">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="kriteria_pendanaan_pendukung" id="inlineRadio1" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="kriteria_pendanaan_pendukung" id="inlineRadio2" value="0" checked>
                                        <label class="form-check-label" for="inlineRadio2">Tidak</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="kriteria_pendanaan_risiko" class="form-label">Pendanaan untuk kegiatan
                                        manajemen risiko</label>
                                </div>
                                <div class="col-md-auto">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kriteria_pendanaan_risiko"
                                            id="inlineRadio1" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kriteria_pendanaan_risiko"
                                            id="inlineRadio2" value="0" checked>
                                        <label class="form-check-label" for="inlineRadio2">Tidak</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="kriteria_keterampilan_pengamanan" class="form-label">Pembinaan
                                        keterampilan penggunaan kendali pengamanan</label>
                                </div>
                                <div class="col-md-auto">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="kriteria_keterampilan_pengamanan" id="inlineRadio1" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="kriteria_keterampilan_pengamanan" id="inlineRadio2" value="0"
                                            checked>
                                        <label class="form-check-label" for="inlineRadio2">Tidak</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="kriteria_keterampilan_identifikasi" class="form-label">Pembinaan
                                        keterampilan mengidentifikasi sistem elektronik</label>
                                </div>
                                <div class="col-md-auto">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="kriteria_keterampilan_identifikasi" id="inlineRadio1" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="kriteria_keterampilan_identifikasi" id="inlineRadio2" value="0"
                                            checked>
                                        <label class="form-check-label" for="inlineRadio2">Tidak</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="kesadaran_interdepen" class="form-label">Pembinaan kesadaran akan
                                        interdependensi
                                    </label>
                                </div>
                                <div class="col-md-auto">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kesadaran_interdepen"
                                            id="inlineRadio1" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kesadaran_interdepen"
                                            id="inlineRadio2" value="0" checked>
                                        <label class="form-check-label" for="inlineRadio2">Tidak</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="kriteria_kesadaran_risiko" class="form-label">Pembinaan kesadaran akan
                                        risiko keamanan siber
                                    </label>
                                </div>
                                <div class="col-md-auto">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kriteria_kesadaran_risiko"
                                            id="inlineRadio1" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kriteria_kesadaran_risiko"
                                            id="inlineRadio2" value="0" checked>
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
