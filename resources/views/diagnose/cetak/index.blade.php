<!DOCTYPE html>
<html>

<head>
    <title>My Page</title>
    <style>
        h4 {
            margin: 0;
        }

        .w-full {
            width: 100%;
        }

        .w-half {
            width: 50%;
        }

        .margin-top {
            margin-top: 1.25rem;
        }

        table {
            width: 100%;
            border-spacing: 0;
            border-style: solid;
        }

        table.products {
            font-size: 0.875rem;
        }

        table.products tr {
            background-color: rgb(96 165 250);
        }

        table.products th {
            color: #ffffff;
            padding: 0.5rem;
        }

        table tr.items {
            background-color: rgb(241 245 249);
        }

        table tr.items td {
            border-style: inset;
            padding: 0.5rem;
        }
    </style>
</head>

<body>

    <div class="margin-top">
        <h1 style="text-align: center;">Hasil Diagnose</h1>
        <table class="w-full">
            <tr>
                <td class="w-half">
                    <div>
                        <h4>Nama sistem :</h4>
                    </div>
                    <div>{{ $diagnose_data['form1']['nama_sistem'] }}</div>
                </td>
                <td class="w-half">
                    <div>
                        <h4>Deskripsi sistem :</h4>
                    </div>
                    <div>{{ $diagnose_data['form1']['deskripsi_sistem'] }}</div>
                </td>
            </tr>
        </table>
    </div>

    <br>
    @if (isset($diagnose_data['form2']))
        <h5>Melalui input yang dimasukkan oleh user pada form sebelumnya berikut adalah prolehan nilai yang didapat
        </h5>
        <table class="products">
            <tr>
                <th>Nama sistem terinput</th>
                <th>Nilai interdepenSistem</th>
            </tr>
            <tr class="items">
                @foreach ($diagnose_data['form2']['poin_order'] as $poin_order)
                    @foreach ($poin_order['sistem'] as $nilai_sistem)
                        <td>{{ $nilai_sistem }}</td>
                        <td>{{ $poin_order['poin'] }}</td>
                    @endforeach
                @endforeach
            </tr>
        </table>
        <br>
    @endif


    <h5>Dengan rincian sebagai berikut :</h5>

    <h5>1. Untuk mencegah keamanan data dan informasi</h5>
    <table class="products">
        <tr>
            <th scope="col">Kendali</th>
            <th scope="col">Deskripsi Kendali</th>
        </tr>
        @foreach ($sistem_terpilih as $iiv)
            @foreach ($iiv->tujuan as $tujuan)
                @foreach ($tujuan->risiko as $risiko)
                    @foreach ($risiko->kendali as $kendali)
                        @if ($kendali->ref_fungsi_id == 1 || $kendali->ref_fungsi_id == 2)
                            <tr class="items">
                                <td>{{ $kendali->nama_kendali }}</td>
                                <td>{{ $kendali->deskripsi_kendali }}</td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach
            @endforeach
        @endforeach
    </table>

    <br>
    <h5>2. Untuk mengurangi keinginan pelaku kejahatan</h5>

    <table class="products">
        <tr>
            <th scope="col">Kendali</th>
            <th scope="col">Deskripsi Kendali</th>
        </tr>
        @foreach ($sistem_terpilih as $iiv)
            @foreach ($iiv->tujuan as $tujuan)
                @foreach ($tujuan->risiko as $risiko)
                    @foreach ($risiko->kendali as $kendali)
                        @if ($kendali->ref_fungsi_id == 2)
                            <tr class="items">
                                <td>{{ $kendali->nama_kendali }}</td>
                                <td>{{ $kendali->deskripsi_kendali }}</td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach
            @endforeach
        @endforeach
    </table>

    <br>
    <h5>3. Untuk mendeteksi masalah keamanan</h5>

    <table class="products">
        <tr>
            <th scope="col">Kendali</th>
            <th scope="col">Deskripsi Kendali</th>
        </tr>
        @foreach ($sistem_terpilih as $iiv)
            @foreach ($iiv->tujuan as $tujuan)
                @foreach ($tujuan->risiko as $risiko)
                    @foreach ($risiko->kendali as $kendali)
                        @if ($kendali->ref_fungsi_id == 3 || $kendali->ref_fungsi_id == 4 || $kendali->ref_fungsi_id == 5)
                            <tr class="items">
                                <td>{{ $kendali->nama_kendali }}</td>
                                <td>{{ $kendali->deskripsi_kendali }}</td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach
            @endforeach
        @endforeach
    </table>
    <br>
    <h5>4. Untuk menindaklanjuti permasalahan keamanan</h5>

    <table class="products">
        <tr>
            <th scope="col">Kendali</th>
            <th scope="col">Deskripsi Kendali</th>
        </tr>
        @foreach ($sistem_terpilih as $iiv)
            @foreach ($iiv->tujuan as $tujuan)
                @foreach ($tujuan->risiko as $risiko)
                    @foreach ($risiko->kendali as $kendali)
                        @if ($kendali->ref_fungsi_id == 6)
                            <tr class="items">
                                <td>{{ $kendali->nama_kendali }}</td>
                                <td>{{ $kendali->deskripsi_kendali }}</td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach
            @endforeach
        @endforeach
    </table>
    <br>
    <h5>5. Untuk memulihkan pelayanan</h5>

    <table class="products">
        <tr>
            <th scope="col">Kendali</th>
            <th scope="col">Deskripsi Kendali</th>
        </tr>
        @foreach ($sistem_terpilih as $iiv)
            @foreach ($iiv->tujuan as $tujuan)
                @foreach ($tujuan->risiko as $risiko)
                    @foreach ($risiko->kendali as $kendali)
                        @if ($kendali->ref_fungsi_id == 7)
                            <tr class="items">
                                <td>{{ $kendali->nama_kendali }}</td>
                                <td>{{ $kendali->deskripsi_kendali }}</td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach
            @endforeach
        @endforeach
    </table>
    <br>
    <h5>Rekomendasi Sumber Daya</h5>

    <table class="products">
        <tr>
            <th scope="col">Rekomendasi</th>
        </tr>
        @foreach ($sistem_terpilih as $iiv)
            @foreach ($iiv->sumberdaya as $sumberdaya)
                <tr class="items">
                    <td>{{ $sumberdaya->deskripsi_sumberdaya }}</td>
                </tr>
            @endforeach
        @endforeach
    </table>
    <br>


</body>

</html>
