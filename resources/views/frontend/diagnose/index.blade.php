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
                    {{-- @php
                        $nilai = App\Models\Nilai::all();
                    @endphp
                    <script>
                        $(document).ready(function() {
                            const data = [
                                @foreach ($nilai as $n)
                                    "{{ $n->value }}",
                                @endforeach
                            ];

                            $('#myInput').autocomplete({
                                source: data,
                                select: function(event, ui) {
                                    $('#myUL').text(ui.item.value);
                                },
                            });
                        });
                    </script> --}}

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
                            Identitas Sistem Elektronik lain yang terhubung
                        </div>
                        <div class="card-body">
                            <form>
                                @csrf
                                <div class="form-group">
                                    <label for="myInput1" class="form-label">Sistem Elektronik lain yang terhubung langsung
                                        dalam satu jaringan elektronik (LAN)</label>
                                    <input type="text" class="form-control" id="myInput1" placeholder="Type something">
                                    <button type="button" class="btn btn-success">Add+</button>
                                    <div id="myUL1"></div>
                                    <label for="myInput2" class="form-label">Sistem Elektronik lain yang berbagi data dalam
                                        database</label>
                                    <input type="text" class="form-control" id="myInput2" placeholder="Type something">
                                    <button type="button" class="btn btn-success">Add+</button>
                                    <div id="myUL2"></div>
                                    <label for="myInput3" class="form-label">Sistem Elektronik lain yang memiliki hardware
                                        yang sama</label>
                                    <input type="text" class="form-control" id="myInput3" placeholder="Type something">
                                    <button type="button" class="btn btn-success">Add+</button>
                                    <div id="myUL3"></div>
                                </div>
                                <button type="button" class="btn btn-primary mt-3" onclick="nextStep(3)">Lanjut</button>
                            </form>
                            {{-- <form>
                                <div class="form-group">
                                    <label>Pilih Jenis Input untuk Isian 1:</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="inputType1" id="text1"
                                            value="text" checked>
                                        <label class="form-check-label" for="text1">Input Teks</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="inputType1" id="select1"
                                            value="select">
                                        <label class="form-check-label" for="select1">Input Pilihan</label>
                                    </div>
                                </div>

                                <div id="textInput1" class="form-group">
                                    <label for="textValue1">Nilai Input Teks:</label>
                                    <input type="text" class="form-control" id="textValue1" name="textValue1">
                                </div>

                                <div id="selectInput1" class="form-group" style="display:none;">
                                    <label for="selectValue1">Pilih Nilai:</label>
                                    <select class="form-control" id="selectValue1" name="selectValue1">
                                        @foreach ($nilai as $n)
                                            <option value="option1">{{ $n->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mt-3">
                                    <label>Pilih Jenis Input untuk Isian 2:</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="inputType2" id="text2"
                                            value="text" checked>
                                        <label class="form-check-label" for="text2">Input Teks</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="inputType2" id="select2"
                                            value="select">
                                        <label class="form-check-label" for="select2">Input Pilihan</label>
                                    </div>
                                </div>

                                <div id="textInput2" class="form-group">
                                    <label for="textValue2">Nilai Input Teks:</label>
                                    <input type="text" class="form-control" id="textValue2" name="textValue2">
                                </div>

                                <div id="selectInput2" class="form-group" style="display:none;">
                                    <label for="selectValue2">Pilih Nilai:</label>
                                    <select class="form-control" id="selectValue2" name="selectValue2">
                                        @foreach ($nilai as $n)
                                            <option value="option1">{{ $n->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mt-3">
                                    <label>Pilih Jenis Input untuk Isian 3:</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="inputType3" id="text3"
                                            value="text" checked>
                                        <label class="form-check-label" for="text3">Input Teks</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="inputType3" id="select3"
                                            value="select">
                                        <label class="form-check-label" for="select3">Input Pilihan</label>
                                    </div>
                                </div>

                                <div id="textInput3" class="form-group">
                                    <label for="textValue3">Nilai Input Teks:</label>
                                    <input type="text" class="form-control" id="textValue3" name="textValue3">
                                </div>

                                <div id="selectInput3" class="form-group" style="display:none;">
                                    <label for="selectValue3">Pilih Nilai:</label>
                                    <select class="form-control" id="selectValue3" name="selectValue3">
                                        @foreach ($nilai as $n)
                                            <option value="option1">{{ $n->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="button" class="btn btn-primary" onclick="nextStep(3)">Lanjut</button>
                            </form> --}}
                        </div>
                    </div>

                    <div class="card mt-3" id="step3" style="display: none;">
                        <div class="card-header">
                            Langkah 3: Hasil
                        </div>
                        <div class="card-body pb-2">
                            <form>
                                <div class="form-group">
                                    <label for="deskripsiRisiko" class="form-label">1. Deskripsi Risiko:</label>
                                    <textarea type="text" class="form-control" id="deskripsiRisiko" name="deskripsiRisiko" required></textarea>

                                    <label for="deskripsiKemungkinan" class="form-label">2. Deskripsi Kemungkinan:</label>
                                    <textarea type="text" class="form-control" id="deskripsiKemungkinan" name="deskripsiKemungkinan" required></textarea>

                                    <label for="nilaiKemungkinan" class="form-label">3. Nilai Kemungkinan (1-5):</label>
                                    <input type="range" class="form-range" min="1" max="5"
                                        id="nilaiKemungkinan">

                                    <label for="deskripsiDampakOrg" class="form-label">4. Deskripsi Dampak
                                        Organisasi:</label>
                                    <input type="text" class="form-control" id="deskripsiDampakOrg"
                                        name="deskripsiDampakOrg" required>

                                    <label for="nilaiDampakOrg" class="form-label">5. Nilai Dampak Organisasi
                                        (1-5):</label>
                                    <input type="range" class="form-range" min="1" max="5"
                                        id="nilaiDampakOrg">

                                    <label for="deskripsiDampakNasional" class="form-label">6. Deskripsi Dampak
                                        Nasional:</label>
                                    <input type="text" class="form-control" id="deskripsiDampakNasional"
                                        name="deskripsiDampakNasional" required>

                                    <label for="nilaiDampakNasional" class="form-label">7. Nilai Dampak Nasional
                                        (1-5):</label>
                                    <input type="range" class="form-range" min="1" max="5"
                                        id="nilaiDampakNasional">

                                    <label for="nilaiRisiko" class="form-label">8. Nilai Risiko (Auto-calculated):</label>
                                    <input type="range" class="form-range" min="1" max="5"
                                        id="nilaiRisiko">

                                    <button type="button" class="btn btn-primary mt-3"
                                        onclick="nextStep(4)">Lanjut</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Langkah 4: Card Menampilkan Hasil dan Tombol Simpan ke Database -->
                    <div class="card mt-3" id="step4" style="display: none;">
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
                                                <th scope="col">Sistem yang diajukan</th>
                                                <th scope="col">Keterhubungan Asset</th>
                                                <th scope="col">Regulasi Nasional</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row"></th>
                                                <td>isian Form 1</td>
                                                <td>isian Form 2</td>
                                                <td>berisi daftar semua peraturan nasional yang mendasari proses dalam
                                                    sistem elektronik</td>
                                            </tr>
                                            {{-- <tr>
                                                <th scope="row">2</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td colspan="2">Larry the Bird</td>
                                                <td>@twitter</td>
                                            </tr> --}}
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
        {{-- <script>
            $(document).ready(function() {

                $('#myInput').keyup(function() {
                    var query = $(this).val();
                    if (query != '') {
                        var _token = $('input[name="_token"]').val();
                        $.ajax({
                            url: "{{ route('nilai.fetch') }}",
                            method: "POST",
                            data: {
                                query: query,
                                _token: _token
                            },
                            success: function(data) {
                                $('#myUL').fadeIn();
                                $('#myUL').html(data);
                            }
                        });
                    }
                });

                $(document).on('click', 'li', function() {
                    $('#myInput').val($(this).text());
                    $('#myUL').fadeOut();
                });

            });
        </script> --}}
        <script>
            $(document).ready(function() {
                // Function to handle autocomplete for each input field
                function setupAutocomplete(inputId, resultsId) {
                    $('#' + inputId).keyup(function() {
                        var query = $(this).val();
                        if (query !== '') {
                            var _token = $('input[name="_token"]').val();
                            $.ajax({
                                url: "{{ route('nilai.fetch') }}",
                                method: "POST",
                                data: {
                                    query: query,
                                    _token: _token
                                },
                                success: function(data) {
                                    $('#' + resultsId).fadeIn();
                                    $('#' + resultsId).html(data);
                                }
                            });
                        }
                    });

                    $(document).on('click', '#' + resultsId + ' li', function() {
                        $('#' + inputId).val($(this).text());
                        $('#' + resultsId).fadeOut();
                    });

                    // Add hover effect to dropdown items
                    $(document).on('mouseenter', '#' + resultsId + ' li', function() {
                        $(this).addClass('hovered-item');
                    });

                    $(document).on('mouseleave', '#' + resultsId + ' li', function() {
                        $(this).removeClass('hovered-item');
                    });
                }

                // Setup autocomplete for each input field
                setupAutocomplete('myInput1', 'myUL1');
                setupAutocomplete('myInput2', 'myUL2');
                setupAutocomplete('myInput3', 'myUL3');
                // Setup autocomplete for myInput2, myInput3, and myInput4 similarly
                // for (var i = 1; i <= 4; i++) {
                //     var inputId = 'myInput' + i;
                //     var resultsId = 'myUL' + i;
                //     setupAutocomplete(inputId, resultsId);
                // }
            });
        </script>
    </section>
@endsection
