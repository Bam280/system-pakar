@extends('frontend.partials.master')
@section('content')
    <section class="section_100 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">{{ __('Form Title') }}</div>
                        <div class="card-body">
                            @php
                                $nilai = \App\Models\Nilai::all();
                            @endphp

                            <form method="POST" action="{{ route('nilai.store') }}">
                                @csrf
                                <label for="exampleDataList" class="form-label">Datalist example</label>
                                <input class="form-control" list="datalistOptions" id="exampleDataList"
                                    placeholder="Type to search..." name="title">
                                <datalist id="datalistOptions">
                                    @foreach ($nilai as $item)
                                        <option value={{ $item->title }}>
                                    @endforeach
                                </datalist>
                                <!-- Add your form fields here -->
                                <div class="form-group row mb-0 justify-content-center">
                                    <div class="col-md-6 offset-md-4 mt-2">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Submit') }}
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
