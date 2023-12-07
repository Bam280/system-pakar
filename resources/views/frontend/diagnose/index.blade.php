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
                            Langkah 1: Pilih Metode
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="option1" name="options[]"
                                        value="Option 1">
                                    <label class="form-check-label" for="option1">Option 1</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="option2" name="options[]"
                                        value="Option 2">
                                    <label class="form-check-label" for="option2">Option 2</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="option3" name="options[]"
                                        value="Option 3">
                                    <label class="form-check-label" for="option3">Option 3</label>
                                </div>
                                <button type="button" class="btn btn-primary mt-3" onclick="saveAndNext(2)">Lanjut</button>
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
                                <button type="button" class="btn btn-primary mt-3" onclick="saveAndNext(3)">Lanjut</button>
                            </form>
                        </div>
                    </div>

                    <!-- Langkah 3: Card Menampilkan Hasil dan Tombol Simpan ke Database -->
                    <div class="card mt-3" id="step3" style="display: none;">
                        <div class="card-header">
                            Langkah 3: Hasil
                        </div>
                        <div class="card-body">
                            <p id="result">Hasil akan ditampilkan di sini</p>
                            <button type="button" class="btn btn-success" id="saveToDbButton" style="display: none;"
                                onclick="saveToDatabase()">Simpan ke Database</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
