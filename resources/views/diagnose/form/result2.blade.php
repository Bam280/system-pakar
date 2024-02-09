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
    <h5 class="card-header">Result</h5>
    <div class="card-body">
        <div class="mb-3">
            <label for="nama_sistem" class="form-label">Nama Sistem</label>
            <input type="text" name="nama_sistem" class="form-control" id="nama_sistem"
                value="{{ $diagnose_data['form1']['nama_sistem'] }}" readonly>
        </div>

        <div class="mb-3">
            <label for="deskripsi_sistem" class="form-label">Deskripsi Sistem</label>
            <textarea class="form-control" name="deskripsi_sistem" id="deskripsi_sistem" rows="3" readonly>{{
                $diagnose_data['form1']['deskripsi_sistem'] }}</textarea>
        </div>

        <h4>Hasil</h4>

        <ul>
            @foreach ($sistem_terpilih as $iiv)
            <li>
                {{ $iiv->nama }} - {{ $iiv->refInstansi->nama_instansi }} - {{ $iiv->refInstansi->nilai_risiko ?? 0 }}
                <ul>
                    @foreach ($iiv->tujuan as $tujuan)
                    <li>
                        {{ $tujuan->refTujuan->tujuan_keamanan }} - {{ $tujuan->deskripsi_tujuan }}
                        <ul>
                            @foreach ($tujuan->risiko as $risiko)
                            <li>
                                {{ $risiko->deskripsi_risiko }} - {{ $risiko->deskripsi_dampak }} - {{ $risiko->deskripsi_kemungkinan }} - {{ $risiko->nilai_dampak_regional }} - {{ $risiko->nilai_dampak_nasional }} - {{ $risiko->nilai_kemungkinan }}
                                <ul>
                                    @foreach ($risiko->kendali as $kendali)
                                        <li>
                                            {{ $kendali->nama_kendali }} - {{ $kendali->deskripsi_kendali }} - {{ $kendali->refFungsi->indikator_fungsi }}
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul>

    </div>
</div>
@endsection