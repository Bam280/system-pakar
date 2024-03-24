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

            <div class="d-grid gap-2">
                <a href="{{ route('diagnose.form.print') }}" target="_blank" class="btn btn-outline-success">Cetak
                    Hasil</a>
                <a href="{{ route('diagnose.form.form1') }}" class="btn btn-outline-danger">Buat Baru</a>
            </div>

            <h3>Dengan rincian sebagai berikut :</h3>
            <br>

            <h5>Sistem Terpilih</h5>

            {{-- <table class="table table-bordered">
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
            </table> --}}
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Instansi</th>
                        <th scope="col">Nilai resiko</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sistem_terpilih as $iiv)
                        <tr>
                            <td>{{ $iiv->nama }}</td>
                            <td>{{ $iiv->refInstansi?->nama_instansi }}</td>
                            <td>{{ $iiv->nilai_risiko ?? 0 }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


            {{-- <h5>Deskripsi interdependasi Sistem</h5> --}}



            <h5>1. Untuk mencegah keamanan data dan informasi :</h5>
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
                            @foreach ($tujuan->risiko as $risiko)
                                @foreach ($risiko->kendali as $kendali)
                                    @if ($kendali->ref_fungsi_id == 1 || $kendali->ref_fungsi_id == 2)
                                        <tr>
                                            <td>{{ $kendali->nama_kendali }}</td>
                                            <td>{{ $kendali->deskripsi_kendali }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        @endforeach
                    @endforeach
                </tbody>
            </table>


            <h5>2. Untuk mengurangi keinginan pelaku kejahatan :</h5>
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
                            @foreach ($tujuan->risiko as $risiko)
                                @foreach ($risiko->kendali as $kendali)
                                    @if ($kendali->ref_fungsi_id == 2)
                                        <tr>
                                            <td>{{ $kendali->nama_kendali }}</td>
                                            <td>{{ $kendali->deskripsi_kendali }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        @endforeach
                    @endforeach
                </tbody>
            </table>

            <h5>3. Untuk mendeteksi masalah keamanan.</h5>
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
                            @foreach ($tujuan->risiko as $risiko)
                                @foreach ($risiko->kendali as $kendali)
                                    @if ($kendali->ref_fungsi_id == 3 || $kendali->ref_fungsi_id == 4 || $kendali->ref_fungsi_id == 5)
                                        <tr>
                                            <td>{{ $kendali->nama_kendali }}</td>
                                            <td>{{ $kendali->deskripsi_kendali }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        @endforeach
                    @endforeach
                </tbody>
            </table>

            <h5>4. Untuk menindaklanjuti permasalahan keamanan.</h5>
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
                            @foreach ($tujuan->risiko as $risiko)
                                @foreach ($risiko->kendali as $kendali)
                                    @if ($kendali->ref_fungsi_id == 6)
                                        <tr>
                                            <td>{{ $kendali->nama_kendali }}</td>
                                            <td>{{ $kendali->deskripsi_kendali }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        @endforeach
                    @endforeach
                </tbody>
            </table>

            <h5>5. Untuk memulihkan pelayanan</h5>
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
                            @foreach ($tujuan->risiko as $risiko)
                                @foreach ($risiko->kendali as $kendali)
                                    @if ($kendali->ref_fungsi_id == 7)
                                        <tr>
                                            <td>{{ $kendali->nama_kendali }}</td>
                                            <td>{{ $kendali->deskripsi_kendali }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        @endforeach
                    @endforeach
                </tbody>
            </table>

            <h5>Rekomendasi Sumber Daya</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sistem_terpilih as $iiv)
                        @foreach ($iiv->tujuan as $tujuan)
                            @foreach ($tujuan->risiko as $risiko)
                                @foreach ($risiko->kendali as $kendali)
                                    @if ($kendali->ref_fungsi_id == 8)
                                        <tr>
                                            <td>{{ $kendali->nama_kendali }}</td>
                                            <td>{{ $kendali->deskripsi_kendali }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        @endforeach
                    @endforeach
                </tbody>

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
