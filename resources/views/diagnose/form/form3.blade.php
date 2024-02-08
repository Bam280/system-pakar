@extends('layouts.main')

@section('content')
    @if($errors->any())
    <div class="alert alert-danger mt-5">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <div class="card mt-5">
        <h5 class="card-header">Featured</h5>
        <div class="card-body">
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

                <div class="mb-3">
                    <label for="nilai_kemungkinan" class="form-label">Nilai Kemungkinan (0-5)</label>
                    <input type="range" class="form-range" id="nilai_kemungkinan" name="nilai_kemungkinan" min="0" max="5" value="{{ old('nilai_kemungkinan') ?? @$data_form3['nilai_kemungkinan'] }}">
                </div>

                <div class="mb-3">
                    <label for="deskripsi_dampak_organisasi" class="form-label">Deskripsi Dampak Organisasi</label>
                    <textarea class="form-control" name="deskripsi_dampak_organisasi" id="deskripsi_dampak_organisasi" rows="3">{{ old('deskripsi_dampak_organisasi') ?? @$data_form3['deskripsi_dampak_organisasi'] }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="nilai_dampak_organisasi" class="form-label">Nilai Dampak Organisasi (0-5)</label>
                    <input type="range" class="form-range" id="nilai_dampak_organisasi" name="nilai_dampak_organisasi" min="0" max="5" value="{{ old('nilai_dampak_organisasi') ?? @$data_form3['nilai_dampak_organisasi'] }}">
                </div>

                <div class="mb-3">
                    <label for="deskripsi_dampak_nasional" class="form-label">Deskripsi Dampak Nasional</label>
                    <textarea class="form-control" name="deskripsi_dampak_nasional" id="deskripsi_dampak_nasional" rows="3">{{ old('deskripsi_dampak_nasional') ?? @$data_form3['deskripsi_dampak_nasional'] }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="nilai_dampak_nasional" class="form-label">Nilai Dampak Nasional (0-5)</label>
                    <input type="range" class="form-range" id="nilai_dampak_nasional" name="nilai_dampak_nasional" min="0" max="5" value="{{ old('nilai_dampak_nasional') ?? @$data_form3['nilai_dampak_nasional'] }}">
                </div>
    
                <button type="submit" class="btn btn-primary">Berikutnya</button>
            </form>
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