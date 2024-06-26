@extends('layouts.dashboard.main')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger mt-5">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="card mt-5">
        <h5 class="card-header">Analisis lanjutan berdasarkan nilai risiko</h5>
        <div class="card-body">
            <h5>Melalui input yang dimasukkan oleh user pada form sebelumnya berikut adalah prolehan nilai yang didapat</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Nama sistem terinput</th>
                        <th scope="col">Nilai interdepenSistem</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($diagnose_data['form2']['poin_order'] as $poin_order)
                        @foreach ($poin_order['sistem'] as $nilai_sistem)
                            <tr>
                                <td>{{ $nilai_sistem }}</td>
                                <td>{{ $poin_order['poin'] }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>

            <h5>Dari hasil diatas ditemukan bahwa ada dua sistem yang memiliki nilai interdependasi yang sama, diperlukan
                data tambahan untuk dilakukan penilaian lebih lanjut </h5>
            <br>
            <h4><strong>Penilaian Resiko</strong></h4>
            <br>
            <form action="" method="post">
                @csrf
                <div class="mb-3">
                    <label for="deskripsi_risiko" class="form-label">Deskripsi Risiko</label>
                    <textarea class="form-control" name="deskripsi_risiko" id="deskripsi_risiko" rows="3">{{ old('deskripsi_risiko') ?? @$data_form3['deskripsi_risiko'] }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="deskripsi_kemungkinan" class="form-label">Deskripsi Kemungkinan</label>
                    <textarea class="form-control" name="deskripsi_kemungkinan" id="deskripsi_kemungkinan" rows="3">{{ old('deskripsi_kemungkinan') ?? @$data_form3['deskripsi_kemungkinan'] }}</textarea>
                </div>

                <div class="mb-3 range-wrap">
                    <label for="nilai_kemungkinan" class="form-label">Nilai Kemungkinan (0-5)</label>
                    <input type="range" class="form-range" id="nilai_kemungkinan" name="nilai_kemungkinan" min="0"
                        max="5" value="{{ old('nilai_kemungkinan') ?? @$data_form3['nilai_kemungkinan'] }}">
                    <output class="bubble"></output>
                </div>

                <div class="mb-3">
                    <label for="deskripsi_dampak_organisasi" class="form-label">Deskripsi Dampak Organisasi</label>
                    <textarea class="form-control" name="deskripsi_dampak_organisasi" id="deskripsi_dampak_organisasi" rows="3">{{ old('deskripsi_dampak_organisasi') ?? @$data_form3['deskripsi_dampak_organisasi'] }}</textarea>
                </div>

                <div class="mb-3 range-wrap">
                    <label for="nilai_dampak_organisasi" class="form-label">Nilai Dampak Organisasi (0-5)</label>
                    <input type="range" class="form-range" id="nilai_dampak_organisasi" name="nilai_dampak_organisasi"
                        min="0" max="5"
                        value="{{ old('nilai_dampak_organisasi') ?? @$data_form3['nilai_dampak_organisasi'] }}">
                    <output class="bubble"></output>
                </div>

                <div class="mb-3">
                    <label for="deskripsi_dampak_nasional" class="form-label">Deskripsi Dampak Nasional</label>
                    <textarea class="form-control" name="deskripsi_dampak_nasional" id="deskripsi_dampak_nasional" rows="3">{{ old('deskripsi_dampak_nasional') ?? @$data_form3['deskripsi_dampak_nasional'] }}</textarea>
                </div>

                <div class="mb-3 range-wrap">
                    <label for="nilai_dampak_nasional" class="form-label">Nilai Dampak Nasional (0-5)</label>
                    <input type="range" class="form-range" id="nilai_dampak_nasional" name="nilai_dampak_nasional"
                        min="0" max="5"
                        value="{{ old('nilai_dampak_nasional') ?? @$data_form3['nilai_dampak_nasional'] }}">
                    <output class="bubble"></output>
                </div>

                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" class="btn btn-primary">Berikutnya</button>
            </form>
            <form action="{{ route('diagnose.form.reset') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Reset</button>
            </form>
        </div>
    </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endpush
