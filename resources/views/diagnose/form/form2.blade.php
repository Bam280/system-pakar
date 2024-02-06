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
                    <label for="sistem_terhubung_lan" class="form-label">Sistem Terhubung LAN</label>
                    <select class="js-example-basic-multiple form-control" name="sistem_terhubung_lan[]" multiple="multiple">
                       @foreach ($all_iiv as $iiv)
                           <option>{{ $iiv->nama }}</option>
                       @endforeach
                      </select>
                </div>

                <div class="mb-3">
                    <label for="sistem_berbagi_database" class="form-label">Sistem Berbagi Database</label>
                    <select class="js-example-basic-multiple form-control" name="sistem_berbagi_database[]" multiple="multiple">
                        @foreach ($all_iiv as $iiv)
                            <option>{{ $iiv->nama }}</option>
                        @endforeach
                    </select>

                </div>

                <div class="mb-3">
                    <label for="sistem_memiliki_hardware_sama" class="form-label">Sistem Memiliki Hardware Sama</label>
                    <select class="js-example-basic-multiple form-control" name="sistem_memiliki_hardware_sama[]" multiple="multiple">
                        @foreach ($all_iiv as $iiv)
                            <option>{{ $iiv->nama }}</option>
                        @endforeach
                    </select>
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