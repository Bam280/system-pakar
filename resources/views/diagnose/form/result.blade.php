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

            <h5>Melalui input yang dimasukkan oleh user pada form sebelumnya berikut adalah prolehan nilai yang didapat</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Namas sistem terinput</th>
                        <th scope="col">Nilai interdepenSistem</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($diagnose_data['form2']['poin_order'] as $poin_order)
                        <tr>
                            <td>{{ $poin_order['sistem'][0] }}</td>
                            <td>{{ $poin_order['poin'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h4>Sistem yang terpilih dari hasil diatas adalah</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        @if (count($iiv) > 0)
                            <th scope="col">Instansi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @if (count($iiv) > 0)
                        @foreach ($iiv as $k => $item)
                            <tr>
                                <td>
                                    {{ $item->nama }}
                                </td>
                                <td>{{ $item->refInstansi->nama_instansi }}</td>
                            </tr>
                        @endforeach
                    @else
                        @foreach ($diagnose_data['form2']['poin_order'] as $poin_order)
                            <tr>
                                <td>{{ $poin_order['sistem'][0] }}</td>
                            </tr>
                        @break
                    @endforeach
                @endif
            </tbody>
        </table>

        {{-- <h4>Sistem</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Instansi</th>
                        <th scope="col">Nilai interdepenSistem</th>
                        @if (count($diagnose_data['form2']['poin_sistem']) > 1)
                            <th scope="col">Berbanding</th>
                        @elseif (count($diagnose_data['form2']['poin_sistem']) > 2)
                            <th scope="col">Berbanding</th>
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
            </table> --}}

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

        @if (count($iiv) > 0)
            <a href="{{ route('diagnose.form.result2') }}" class="btn btn-primary">Detail</a>
        @endif
    </div>
</div>
@endsection
