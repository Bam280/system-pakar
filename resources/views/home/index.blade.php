@extends('home.partials.master')
@section('content')
    <!-- Welcome Area Start -->
    <section class="aubna-welcome-area">
        <!--Content before waves-->
        <div class="container">
            <div class="align-items-center justify-content-between ">
                <div class="inner-header">
                    <div class="inner-content">
                        <div class="row align-items-center">
                            <div class="col-lg-4">

                            </div>
                            <div class="col-lg-4">
                                <img src="{{ asset('dist/media/img/pakar-background.svg') }}" alt="symptoms of coronavirus" />
                            </div>
                            <div class="col-lg-4">

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="site-heading">
                                    <a href="{{ route('diagnose.form.form1') }}"
                                        class="btn btn-pill btn-lg btn-success">Mulai
                                        Diagnosa</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Waves Container-->
        <div>
            <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                    <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="parallax">
                    <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                    <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                    <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                    <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
                </g>
            </svg>
        </div>
        <!--Waves end-->
    </section>
    <!-- Welcome Area End -->
    <div class="modal fade" id="myModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false"
        aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <p>Sistem Pendukung Keputusan (SPK) ini dibangun untuk mendukung identifikasi kebutuhan
                        pengamanan pada Infrastruktur Informasi Vital (IIV) sektor administrasi pemerintahan.
                        Pada SPK ini setiap sistem elektronik sektor administrasi pemerintahan dianggap sebagai
                        IIV dengan tingkatan yang berbeda sesuai dengan nilai keterhubungan
                        SPK akan menghasilkan tingkat keterhubungan sistem elektronik dan merekomendasikan
                        kendali pengamanan yang diperlukan berdasarkan sistem elektronik terhubung.
                        Jika sistem elektronik tidak memiliki keterhubungan dengan sistem elektronik lain,
                        sistem akan memberikan rekomendasi berdasarkan kemiripan sumber daya dan tata kelola
                    </p>
                    <br>
                    <p>
                        Untuk dapat menggunakan SPK ini, pengguna harus mengetahui Arsitektur Aplikasi. Ini
                        meliputi basis data, sumber data, perangakt keras, dan jaringan tempat sistem elektronik
                        terpasang.
                    </p>
                    <br>
                    <p>
                        SPK ini merupakan bagian dari penelitian Mahasiswa S3 Fakultas Ilmu Komputer Universitas Indonesia
                    </p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button class="btn btn-success" data-bs-target="#exampleModalToggle2"
                        data-bs-dismiss="modal">Mengerti</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Blog Area End -->
@endsection
