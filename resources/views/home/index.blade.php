@extends('home.partial.master')
@section('content')
    <!-- Welcome Area Start -->
    <section class="aubna-welcome-area">
        <!--Content before waves-->
        {{-- <div class="container text-center">
            <div class="align-items-center justify-content-between ">
                <div class="inner-header">
                    <div class="row">
                        <div class="col">
                            <div class="welcome-left">
                                <h1>Veteran Kos</h1>
                                <p>Kosan siap huni di sekitar kampus UPNVJ</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
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
                        SPK ini merupakan bagian dari penelitian Mahasiswa S3 Fakultas Ilmu Komputer
                        Universitas Indonesia
                    </p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button class="btn btn-success" data-bs-target="#exampleModalToggle2" data-bs-dismiss="modal">I
                        Understood</button>
                </div>
            </div>
        </div>
    </div>




    <!-- Blog Area Start -->
    <section class="aubna-blog-area section_100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="align-items-center text-center pb-3">
                        <img src="{{ asset('dist/media/img/pakar-background.svg') }}" alt="">
                    </div>
                    <div class="site-heading">
                        <div class="card text-center">
                            <div class="card-body align-items-center">
                                <a href="{{ route('diagnose.form.form1') }}" class="btn btn-secondary btn-lg">Mulai
                                    Diagnose</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- Blog Area End -->

    {{-- Modal user --}}
    <!-- Button trigger modal -->
    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Launch static backdrop modal
    </button> --}}
@endsection
