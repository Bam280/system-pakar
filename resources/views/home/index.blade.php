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
