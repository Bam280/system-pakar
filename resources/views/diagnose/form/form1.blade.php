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
        <h5 class="card-header">Identitas Sistem Elektronik yang akan dianalisis</h5>
        <div class="card-body">
            <form action="" method="post">
                @csrf
                <div class="mb-3">
                    <label for="nama_sistem" class="form-label">Nama Sistem</label>
                    <input type="text" name="nama_sistem" class="form-control" id="nama_sistem"
                        value="{{ old('nama_sistem') ?? @$data_form1['nama_sistem'] }}">
                </div>

                <div class="mb-3">
                    <label for="deskripsi_sistem" class="form-label">Deskripsi Sistem</label>
                    <textarea class="form-control" name="deskripsi_sistem" id="deskripsi_sistem" rows="3">{{ old('deskripsi_sistem') ?? @$data_form1['deskripsi_sistem'] }}</textarea>
                </div>

                <div class="mb-3 form-check">
                    <label class="form-check-label" for="kesamaan_sistem">Apakah Sistem yang di input memiliki
                        keterhubungan dengan sistem lain ?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kesamaan_sistem" id="kesamaan_sistem"
                            value="1" checked>
                        <label class="form-check-label" for="kesamaan_sistem">
                            Ya
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kesamaan_sistem" id="kesamaan_sistem"
                            value="0">
                        <label class="form-check-label" for="kesamaan_sistem">
                            Tidak
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Berikutnya</button>
            </form>
        </div>
    </div>
@endsection
