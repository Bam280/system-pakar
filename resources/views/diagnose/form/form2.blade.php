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
        <h5 class="card-header">Detail Keterhubungan</h5>
        <div class="card-body">
            <form action="{{ route('diagnose.form.form2.store') }}" method="post">
                @csrf

                @foreach ($allRefInterdepen as $refInterdepen)
                @php
                $slug = Str::slug($refInterdepen->label, '_');
                @endphp
                <div class="mb-3">
                    <label for="{{ $slug }}" class="form-label">{{ $refInterdepen->label }}</label>
                    <select class="js-example-basic-multiple form-control" name="{{ $slug }}[]" multiple="multiple" aria-describedby="{{ $slug }}">
                        @foreach ($all_iiv as $iiv)
                            <option @selected(in_array($iiv->nama, old($slug) ?? (@$data_form2[$slug] ?? [])))>
                                {{ $iiv->nama }}
                            </option>
                        @endforeach
                    </select>
                    <div id="{{ $slug }}" class="form-text">{{ $refInterdepen->label }} atau masukkan sistem baru</div>
                </div>
                @endforeach

                <div class="mt-3 d-grid gap-2 mx-auto">
                    <button type="submit" class="btn btn-primary">Berikutnya</button>

            </form>

            <a href="{{ route('diagnose.form.form1') }}" class="btn btn-warning">Sebelumnya</a>
            <form action="{{ route('diagnose.form.reset') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Reset</button>
            </form>
        </div>
    </div>
    </div>
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
