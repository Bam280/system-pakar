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
                    <textarea class="form-control" name="deskripsi_risiko" id="deskripsi_risiko" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label for="deskripsi_kemungkinan" class="form-label">Deskripsi Kemungkinan</label>
                    <textarea class="form-control" name="deskripsi_kemungkinan" id="deskripsi_kemungkinan" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label for="nilai_kemungkinan" class="form-label">Nilai Kemungkinan</label>
                    <input type="range" class="form-range" id="nilai_kemungkinan" name="nilai_kemungkinan" min="0" max="5">
                </div>

                <div class="mb-3">
                    <label for="deskripsi_dampak_organisasi" class="form-label">Deskripsi Dampak Organisasi</label>
                    <textarea class="form-control" name="deskripsi_dampak_organisasi" id="deskripsi_dampak_organisasi" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label for="nilai_dampak_organisasi" class="form-label">Nilai Dampak Organisasi</label>
                    <input type="range" class="form-range" id="nilai_dampak_organisasi" name="nilai_dampak_organisasi" min="0" max="5">
                </div>

                <div class="mb-3">
                    <label for="deskripsi_dampak_nasional" class="form-label">Deskripsi Dampak Nasional</label>
                    <textarea class="form-control" name="deskripsi_dampak_nasional" id="deskripsi_dampak_nasional" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label for="nilai_dampak_nasional" class="form-label">Nilai Dampak Nasional</label>
                    <input type="range" class="form-range" id="nilai_dampak_nasional" name="nilai_dampak_nasional" min="0" max="5">
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