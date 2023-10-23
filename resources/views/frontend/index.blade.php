@extends('frontend.partials.master')
@section('content')
    {{--  --}}
    <div class="div">
        <section class="section_100 pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="site-heading">
                            <img src="{{ asset('img') }}/Pakar.png" class="rounded mx-auto d-block" alt="logo-pakar">
                            <div class="d-grid col-6 mx-auto pt-5">
                                <button type="button" class="btn btn-outline-secondary btn-lg">Mulai Diagnosis</button>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection
