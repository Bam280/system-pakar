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
                <div class="mb-3">
                    <label for="sistem_terhubung_lan" class="form-label">Sistem Terhubung LAN</label>
                    <select class="js-example-basic-multiple form-control" name="sistem_terhubung_lan[]" multiple="multiple"
                        aria-describedby="sisterLanHelp">
                        @foreach ($all_iiv as $iiv)
                            <option @selected(in_array($iiv->nama, old('sistem_terhubung_lan') ?? (@$data_form2['sistem_terhubung_lan'] ?? [])))>
                                {{ $iiv->nama }}
                            </option>
                        @endforeach
                    </select>
                    <div id="sisterLanHelp" class="form-text">Pilih Sistem Terhubung LAN dari basis data, atau
                        masukkan sistem baru</div>
                </div>

                <div class="mb-3">
                    <label for="sistem_berbagi_database" class="form-label">Sistem Berbagi Database</label>
                    <select class="js-example-basic-multiple form-control" name="sistem_berbagi_database[]"
                        multiple="multiple" aria-describedby="sisterDatabase">
                        @foreach ($all_iiv as $iiv)
                            <option @selected(in_array($iiv->nama, old('sistem_berbagi_database') ?? (@$data_form2['sistem_berbagi_database'] ?? [])))>
                                {{ $iiv->nama }}
                            </option>
                        @endforeach
                    </select>
                    <div id="sisterDatabase" class="form-text">Pilih Sistem Berbagi Database dari basis data, atau
                        masukkan sistem baru</div>
                </div>

                <div class="mb-3">
                    <label for="sistem_memiliki_hardware_sama" class="form-label">Sistem Memiliki Hardware Sama</label>
                    <select class="js-example-basic-multiple form-control" name="sistem_memiliki_hardware_sama[]"
                        multiple="multiple" aria-describedby="sisterHardware">
                        @foreach ($all_iiv as $iiv)
                            <option @selected(in_array($iiv->nama, old('sistem_memiliki_hardware_sama') ?? (@$data_form2['sistem_memiliki_hardware_sama'] ?? [])))>
                                {{ $iiv->nama }}
                            </option>
                        @endforeach
                    </select>
                    <div id="sisterHardware" class="form-text">Pilih Sistem Memiliki Hardware Sama dari basis data, atau
                        masukkan sistem baru</div>
                </div>

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
