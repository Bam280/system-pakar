@extends('frontend.partials.master')
@section('content')
    <section class="section_100 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">

                    <form action="" id="formDiagnosenilai">
                        @csrf
                        <div class="card" id="step1">
                            <div class="card-header">
                                Form Identifikasi
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="nama_sistem" class="form-label">Nama Sistem elektronik</label>
                                    <input type="text" class="form-control" id="nama_sistem" name="nama_sistem"
                                        placeholder="Example input placeholder">
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi_sistem" class="form-label">Deskripsi
                                        SistemElektronik</label>
                                    <input type="text" class="form-control" id="deskripsi_sistem" name="deskripsi_sistem"
                                        placeholder="Another input placeholder">
                                </div>
                                <button type="button" class="btn btn-primary mt-3" onclick="nextStep(2)">Lanjut</button>
                            </div>
                        </div>

                        <!-- Langkah 2: Form untuk Input Text Panjang -->
                        <div class="card mt-3" id="step2" style="display: none;">
                            <div class="card-header">
                                Identitas Sistem Elektronik lain yang terhubung
                            </div>
                            <div class="card-body">
                                <label for="myInput1" class="form-label">Sistem Elektronik lain yang terhubung
                                    langsung
                                    dalam satu jaringan elektronik (LAN)</label>
                                <button type="button" class="btn btn-outline-success add-input" data-input-id="myInput1"
                                    data-results-id="myUL1" data-group-id="1"
                                    style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem; border-radius: 100px;">Add+</button>
                                <div class="form-group" id="inputGroupContainer1">
                                    <div class="input-group" id="inputGroup1">
                                        <input type="text" class="form-control myInput" id="myInput1" name="sistem1[]"
                                            placeholder="Type something">
                                        <div class="myUL" id="myUL1"></div>
                                    </div>
                                    <br>
                                </div>
                                <label for="myInput2" class="form-label">Sistem Elektronik lain yang berbagi data
                                    dalam
                                    database</label>
                                <button type="button" class="btn btn-outline-success add-input" data-input-id="myInput2"
                                    data-results-id="myUL2" data-group-id="2"
                                    style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem; border-radius: 100px;">Add+</button>
                                <div class="form-group" id="inputGroupContainer2">
                                    <div class="input-group" id="inputGroup2">
                                        <input type="text" class="form-control myInput" id="myInput2" name="sistem2[]"
                                            placeholder="Type something ">
                                        <div id="myUL2"></div>
                                    </div>
                                    <br>
                                </div>
                                <label for="myInput3" class="form-label">Sistem Elektronik lain yang memiliki
                                    hardware
                                    yang sama</label>
                                <button type="button" class="btn btn-outline-success add-input" data-input-id="myInput3"
                                    data-results-id="myUL3" data-group-id="3"
                                    style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem; border-radius: 100px;">Add+</button>
                                <div class="form-group" id="inputGroupContainer3">
                                    <div class="input-group" id="inputGroup3">
                                        <input type="text" class="form-control myInput" id="myInput3" name="sistem3[]"
                                            placeholder="Type something">
                                        <div id="myUL3"></div>
                                    </div>
                                    <br>
                                </div>
                                <button type="button" class="btn btn-primary mt-3" onclick="nextStep(3)">Lanjut</button>
                            </div>
                        </div>

                        <div class="card mt-3" id="step3" style="display: none;">
                            <div class="card-header">
                                Langkah 3: Hasil
                            </div>
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label for="deskripsiRisiko" class="form-label">1. Deskripsi Risiko:</label>
                                    <textarea type="text" class="form-control" id="deskripsiRisiko" name="deskripsiRisiko" required></textarea>

                                    <label for="deskripsiKemungkinan" class="form-label">2. Deskripsi Kemungkinan:</label>
                                    <textarea type="text" class="form-control" id="deskripsiKemungkinan" name="deskripsiKemungkinan" required></textarea>

                                    <label for="nilaiKemungkinan" class="form-label">3. Nilai Kemungkinan (1-5):</label>
                                    <input type="range" class="form-range" min="1" max="5"
                                        name="nilaiKemungkinan" id="nilaiKemungkinan">

                                    <label for="deskripsiDampakOrg" class="form-label">4. Deskripsi Dampak
                                        Organisasi:</label>
                                    <input type="text" class="form-control" id="deskripsiDampakOrg"
                                        name="deskripsiDampakOrg" name="deskripsiDampakOrg" required>

                                    <label for="nilaiDampakOrg" class="form-label">5. Nilai Dampak Organisasi
                                        (1-5):</label>
                                    <input type="range" class="form-range" min="1" max="5"
                                        name="nilaiDampakOrg" id="nilaiDampakOrg">

                                    <label for="deskripsiDampakNasional" class="form-label">6. Deskripsi Dampak
                                        Nasional:</label>
                                    <input type="text" class="form-control" id="deskripsiDampakNasional"
                                        name="deskripsiDampakNasional" required>

                                    <label for="nilaiDampakNasional" class="form-label">7. Nilai Dampak Nasional
                                        (1-5):</label>
                                    <input type="range" class="form-range" min="1" max="5"
                                        name="nilaiDampakNasional" id="nilaiDampakNasional">

                                    {{-- Dilakukan pada backend untuk nilai kalkulasi dari semua masukan nilai yang ada --}}
                                    {{-- <label for="nilaiRisiko" class="form-label">8. Nilai Risiko (Auto-calculated):</label>
                                    <input type="range" class="form-range" min="1" max="5"
                                        id="nilaiRisiko"> --}}

                                    <button type="submit" id="formDiagnosenilai"
                                        class="btn btn-primary mt-3">Lanjut</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Langkah 4: Card Menampilkan Hasil dan Tombol Simpan ke Database -->
                    <div class="card mt-3" id="step4" style="display: none;">
                        <div class="card-header">
                            Langkah 4: Hasil
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
                            {{-- <button type="button" class="btn btn-success" id="saveToDbButton" style="display: none;"
                                onclick="saveToDatabase()">Simpan ke Database</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

                    $(document).on('click', function(e) {
                        // Cek apakah yang diklik bukan bagian dari dropdown atau input
                        if (!$(e.target).closest('#' + resultsId).length && !$(e.target).is('#' + inputId)) {
                            $('#' + resultsId).fadeOut();
                        }
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
                // Add input dynamically on button click
                // Add input dynamically on button click for myInput1
                $('.add-input[data-input-id="myInput1"]').on('click', function() {
                    addDynamicInput('myInput1', 'myUL1', 'inputGroupContainer1', 1);
                });

                // Add input dynamically on button click for myInput2
                $('.add-input[data-input-id="myInput2"]').on('click', function() {
                    addDynamicInput('myInput2', 'myUL2', 'inputGroupContainer2', 2);
                });

                // Add input dynamically on button click for myInput3
                $('.add-input[data-input-id="myInput3"]').on('click', function() {
                    addDynamicInput('myInput3', 'myUL3', 'inputGroupContainer3', 3);
                });

                var inputCount = 0;
                var maxInputCount = 3;

                function addDynamicInput(inputId, resultsId, containerId, groupId) {
                    var inputCount = $('#' + containerId + ' .input-group').length;
                    if (inputCount != maxInputCount) {
                        inputCount++;
                        var newInputId = inputId + '_' + inputCount;
                        var newResultsId = resultsId + '_' + inputCount;

                        var newInputGroup = $('<div class="input-group" id="inputGroup' + groupId + '">' +
                            '<input type="text" class="form-control myInput" id="' + newInputId + '" name="sistem' +
                            groupId + '[]" placeholder="Type something">' +
                            '<div class="myUL" id="' + newResultsId + '"></div>' +
                            '</div>' + '<br>');
                    } else {
                        alert('Maximum input reached!');
                    }

                    $('#' + containerId).append(newInputGroup);
                    setupAutocomplete(newInputId, newResultsId);
                }
            });
        </script>
    </section>
@endsection
