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
        <h5 class="card-header">Result sistem</h5>
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

            <h3>Dengan rincian sebagai berikut :</h3>
            <br>
            <h5>Untuk mencegah keamanan data dan informasi</h5>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Instansi</th>
                        <th scope="col">Nilai resiko</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sistem_terpilih as $iiv)
                        <tr>
                            <th scope="row">{{ $k = +1 }}</th>
                            <td>{{ $iiv->nama }}</td>
                            <td>{{ $iiv->refInstansi->nama_instansi }}</td>
                            <td>{{ $iiv->nilai_risiko ?? 0 }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h5>Untuk mengurangi keinginan pelaku kejahatan :</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Tujuan</th>
                        <th scope="col">Deskripsi Tujuan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sistem_terpilih as $iiv)
                        @foreach ($iiv->tujuan as $tujuan)
                            <tr>
                                <td>{{ $tujuan->refTujuan->tujuan_keamanan }}</td>
                                <td>{{ $tujuan->deskripsi_tujuan }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>

            <h5>Untuk mendeteksi masalah keamanan</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Deskripsi resiko</th>
                        <th scope="col">Deskripsi dampak</th>
                        <th scope="col">Deskripsi kemungkinan</th>
                        <th scope="col">Nilai kemungkinan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sistem_terpilih as $iiv)
                        @foreach ($iiv->tujuan as $tujuan)
                            @foreach ($tujuan->risiko as $risiko)
                                <tr>
                                    <td>{{ $risiko->deskripsi_risiko }}</td>
                                    <td>{{ $risiko->deskripsi_dampak }}</td>
                                    <td>{{ $risiko->deskripsi_kemungkinan }}</td>
                                    <td>{{ $risiko->deskripsi_kemungkinan }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    @endforeach
                </tbody>
            </table>

            <h5>Untuk menindaklanjuti permasalahan keamanan</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Nama Kendali</th>
                        <th scope="col">Deskripsi kendali</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sistem_terpilih as $iiv)
                        @foreach ($iiv->tujuan as $tujuan)
                            @foreach ($tujuan->risiko as $risiko)
                                @foreach ($risiko->kendali as $kendali)
                                    <tr>
                                        <td>{{ $kendali->nama_kendali }}</td>
                                        <td>{{ $kendali->deskripsi_kendali }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @endforeach
                    @endforeach
                </tbody>
            </table>

            {{-- <ul>
                @foreach ($sistem_terpilih as $iiv)
                    <li>
                        {{ $iiv->nama }} - {{ $iiv->refInstansi->nama_instansi }} - {{ $iiv->nilai_risiko ?? 0 }}
                        <ul>
                            @foreach ($iiv->tujuan as $tujuan)
                                <li>
                                    {{ $tujuan->refTujuan->tujuan_keamanan }} - {{ $tujuan->deskripsi_tujuan }}
                                    <ul>
                                        @foreach ($tujuan->risiko as $risiko)
                                            <li>
                                                {{ $risiko->deskripsi_risiko }} - {{ $risiko->deskripsi_dampak }} -
                                                {{ $risiko->deskripsi_kemungkinan }} -
                                                {{ $risiko->nilai_dampak_regional }} -
                                                {{ $risiko->nilai_dampak_nasional }} - {{ $risiko->nilai_kemungkinan }}
                                                <ul>
                                                    @foreach ($risiko->kendali as $kendali)
                                                        <li>
                                                            {{ $kendali->nama_kendali }} -
                                                            {{ $kendali->deskripsi_kendali }} -
                                                            {{ $kendali->refFungsi->indikator_fungsi }}
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
            </ul> --}}

        </div>
    </div>
@endsection
