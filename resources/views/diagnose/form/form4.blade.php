@extends('layouts.dashboard.main')

@section('content')
    {{-- <div class="card mt-5">
        <h5 class="card-header">Featured</h5>

        <div class="card-body">
            <form action="">
                @csrf
                <div class="mb-3">
                    <label for="kriteria_pendanaan_pengamanan" class="form-label">Kriteria Pendanaan Pengamanan</label>
                    <textarea class="form-control" name="kriteria_pendanaan_pengamanan" id="kriteria_pendanaan_pengamanan" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label for="kriteria_pendanaan_pengamanan" class="form-label">Kriteria Pendanaan Pengamanan</label>
                    <select class="js-example-basic-multiple form-control" name="sistem_terhubung_lan[]"
                        multiple="multiple">
                        @foreach ($all_iiv as $iiv)
                            <option @selected(in_array($iiv->kriteria_pendanaan_pengamanan, old('kriteria_pendanaan_pengamanan') ?? (@$data_form2['kriteria_pendanaan_pengamanan'] ?? [])))>
                                {{ $iiv->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="kriteria_pendanaan_pemulihan" class="form-label">Kriteria Pendanaan pemulihan</label>
                    <select class="js-example-basic-multiple form-control" name="kriteria_pendanaan_pemulihan[]"
                        multiple="multiple">
                        @foreach ($all_iiv as $iiv)
                            <option @selected(in_array($iiv->nama, old('kriteria_pendanaan_pemulihan') ?? (@$data_form2['kriteria_pendanaan_pemulihan'] ?? [])))>
                                {{ $iiv->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="kriteria_pendanaan_pendukung" class="form-label">Kriteria Pendanaan Pendukung</label>
                    <select class="js-example-basic-multiple form-control" name="kriteria_pendanaan_pendukung[]"
                        multiple="multiple">
                        @foreach ($all_iiv as $iiv)
                            <option @selected(in_array($iiv->nama, old('kriteria_pendanaan_pendukung') ?? (@$data_form2['kriteria_pendanaan_pendukung'] ?? [])))>
                                {{ $iiv->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="kriteria_keterampilan_pengamanan" class="form-label">Kriteria Keterampilan
                        pengamanan</label>
                    <select class="js-example-basic-multiple form-control" name="kriteria_keterampilan_pengamanan[]"
                        multiple="multiple">
                        @foreach ($all_iiv as $iiv)
                            <option @selected(in_array($iiv->nama, old('kriteria_keterampilan_pengamanan') ?? (@$data_form2['kriteria_keterampilan_pengamanan'] ?? [])))>
                                {{ $iiv->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="kriteria_keterampilan_identifikasi" class="form-label">Kriteria Keterampilan
                        Identifikasi</label>
                    <select class="js-example-basic-multiple form-control" name="kriteria_keterampilan_identifikasi[]"
                        multiple="multiple">
                        @foreach ($all_iiv as $iiv)
                            <option @selected(in_array($iiv->nama, old('kriteria_keterampilan_identifikasi') ?? (@$data_form2['kriteria_keterampilan_identifikasi'] ?? [])))>
                                {{ $iiv->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="kriteria_kesadaran_interdepen" class="form-label">Kriteria Kesadaran interdependensi</label>
                    <select class="js-example-basic-multiple form-control" name="kriteria_kesadaran_interdepen[]"
                        multiple="multiple">
                        @foreach ($all_iiv as $iiv)
                            <option @selected(in_array($iiv->nama, old('kriteria_kesadaran_interdepen') ?? (@$data_form2['kriteria_kesadaran_interdepen'] ?? [])))>
                                {{ $iiv->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="kriteria_kesadaran_resiko" class="form-label">Kriteria Kesadaran resiko</label>
                    <select class="js-example-basic-multiple form-control" name="kriteria_kesadaran_resiko[]"
                        multiple="multiple">
                        @foreach ($all_iiv as $iiv)
                            <option @selected(in_array($iiv->nama, old('kriteria_kesadaran_resiko') ?? (@$data_form2['kriteria_kesadaran_resiko'] ?? [])))>
                                {{ $iiv->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Berikutnya</button>
            </form>
        </div>

    </div> --}}
@endsection
