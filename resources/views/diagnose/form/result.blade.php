@extends('layouts.main')

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
        <h5 class="card-header">Result</h5>
        <div class="card-body">
            <div class="mb-3">
                <label for="nama_sistem" class="form-label">Nama Sistem</label>
                <input type="text" name="nama_sistem" class="form-control" id="nama_sistem"
                    value="{{ $diagnose_data['form1']['nama_sistem'] }}" readonly>
            </div>

            <div class="mb-3">
                <label for="deskripsi_sistem" class="form-label">Deskripsi Sistem</label>
                <textarea class="form-control" name="deskripsi_sistem" id="deskripsi_sistem" rows="3" readonly>{{ $diagnose_data['form1']['deskripsi_sistem'] }}</textarea>
            </div>

            <h4>Sistem</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Instansi</th>
                        <th scope="col">Nilai interdepenSistem</th>
                        <th scope="col">Berbanding</th>
                        @if ($diagnose_data['form2']['poin_order'] > 2)
                            <th scope="col">Berbanding</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($iiv as $k => $item)
                        <tr>
                            <th scope="row">{{ $k + 1 }}</th>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->refInstansi->nama_instansi }}</td>

                            @foreach ($diagnose_data['form2']['poin_order'] as $poin_order)
                                <td>{{ $poin_order['poin'] }}</td>
                            @endforeach

                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- <p>[nama_sistem] - [nama_instansi] - [nilai_risiko] - [? deskripsi_interdepen] </p>

            <ul>
                @foreach ($iiv as $item)
                    <li>
                        {{ $item->nama }} - {{ $item->refInstansi->nama_instansi }} -
                        {{ $item->refInstansi->nilai_risiko ?? 0 }}
                    </li>
                    @foreach ($item->interdepenSistemIIV as $item)
                        <li>
                            {{ $item->sistemElektronik->nama }} -
                            {{ $item->sistemElektronik->refInstansi->nama_instansi }} -
                            {{ $item->sistemElektronik->refInstansi->nilai_risiko ?? 0 }} -
                            {{ $item->deskripsi_interdepen }}
                        </li>
                    @endforeach
                @endforeach
            </ul> --}}

            <a href="{{ route('diagnose.form.result2') }}" class="btn btn-primary">Detail</a>

        </div>
    </div>
@endsection
