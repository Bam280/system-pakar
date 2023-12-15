@extends('frontend.partials.master')
@section('content')
    <section class="section_100 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    {{-- <div class="card">
                        <div class="card-header">Form Diagnose</div>
                        <div class="card-body">
                            @php
                                $nilai = \App\Models\Nilai::all();
                            @endphp --}}

                    {{-- <form method="POST" action="{{ route('nilai.store') }}">
                                @csrf
                                <label for="exampleDataList" class="form-label">Datalist example</label>
                                <input class="form-control" list="datalistOptions" id="exampleDataList"
                                    placeholder="Type to search..." name="title">
                                <datalist id="datalistOptions">
                                    @foreach ($nilai as $item)
                                        <option value={{ $item->title }}>
                                    @endforeach
                                </datalist>

                                <label for="exampleDataList" class="form-label">Datalist example</label>
                                <input class="form-control" list="datalistOptions" id="exampleDataList"
                                    placeholder="Type to search..." name="title">
                                <datalist id="datalistOptions">
                                    @foreach ($nilai as $item)
                                        <option value={{ $item->title }}>
                                    @endforeach
                                </datalist>
                                <label for="exampleDataList" class="form-label">Datalist example</label>
                                <input class="form-control" list="datalistOptions" id="exampleDataList"
                                    placeholder="Type to search..." name="title">
                                <datalist id="datalistOptions">
                                    @foreach ($nilai as $item)
                                        <option value={{ $item->title }}>
                                    @endforeach
                                </datalist>
                                <label for="exampleDataList" class="form-label">Datalist example</label>
                                <input class="form-control" list="datalistOptions" id="exampleDataList"
                                    placeholder="Type to search..." name="title">
                                <datalist id="datalistOptions">
                                    @foreach ($nilai as $item)
                                        <option value={{ $item->title }}>
                                    @endforeach
                                </datalist>
                                <label for="exampleDataList" class="form-label">Datalist example</label>
                                <input class="form-control" list="datalistOptions" id="exampleDataList"
                                    placeholder="Type to search..." name="title">
                                <datalist id="datalistOptions">
                                    @foreach ($nilai as $item)
                                        <option value={{ $item->title }}>
                                    @endforeach
                                </datalist>
                                <div class="form-group row mb-0 justify-content-center">
                                    <div class="col-md-6 offset-md-4 mt-2">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Submit') }}
                                        </button>
                                    </div>
                                </div>
                            </form> --}}
                    {{-- 
                        </div>
                    </div> --}}
                    <!-- Langkah 1: 3 Pilihan dengan Checkbox -->
                    <div class="card" id="step1">
                        <div class="card-header">
                            Form Identifikasi
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Nama Sistem elektronik</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput"
                                        placeholder="Example input placeholder">
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Deskripsi
                                        SistemElektronik</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2"
                                        placeholder="Another input placeholder">
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Sistem yang terhubung</h5>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Sistem 1
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="2"
                                                id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Sistem 2
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="3"
                                                id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Sistem 3
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary mt-3" onclick="nextStep(2)">Lanjut</button>
                            </form>
                        </div>
                    </div>

                    <!-- Langkah 2: Form untuk Input Text Panjang -->
                    <div class="card mt-3" id="step2" style="display: none;">
                        <div class="card-header">
                            Langkah 2: Isi Text Panjang
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="longText">Masukkan Text Panjang:</label>
                                    <textarea class="form-control" id="longText" rows="5" placeholder="Ketikkan text panjang di sini..."></textarea>
                                </div>
                                <button type="button" class="btn btn-primary mt-3" onclick="nextStep(3)">Lanjut</button>
                            </form>
                        </div>
                    </div>

                    <!-- Langkah 3: Card Menampilkan Hasil dan Tombol Simpan ke Database -->
                    <div class="card mt-3" id="step3" style="display: none;">
                        <div class="card-header">
                            Langkah 3: Hasil
                        </div>
                        <div class="card-body pb-2">
                            <p id="result">Hasil akan ditampilkan di sini</p>
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-bordered border-dark">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">First</th>
                                                <th scope="col">Last</th>
                                                <th scope="col">Handle</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td colspan="2">Larry the Bird</td>
                                                <td>@twitter</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <button type="button" class="btn btn-success" id="saveToDbButton" style="display: none;"
                                onclick="saveToDatabase()">Simpan ke Database</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
