@extends('admin.partials.master')
@section('content')
    <div class="container-fluid">
        <!-- BreadCrumb -->

        <div class="adminx-main-content">
            <div class="container-fluid">


                <div class="pb-3">
                    <h1>Dashboard</h1>
                </div>

                <div class="row">
                    <div class="col-md-6 col-lg-3 d-flex">
                        <div class="card mb-grid w-100">
                            <div class="card-body d-flex flex-column">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="card-title mb-0">
                                        Outstanding Invoices
                                    </h5>

                                    <div class="card-title-sub">
                                        $753.82
                                    </div>
                                </div>

                                <div class="progress mt-auto">
                                    <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75"
                                        aria-valuemin="0" aria-valuemax="100">3/4</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex">
                        <div class="card mb-grid w-100">
                            <div class="card-body d-flex flex-column">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="card-title mb-0">
                                        Open Tasks
                                    </h5>

                                    <div class="card-title-sub">
                                        18/30
                                    </div>
                                </div>

                                <div class="progress mt-auto">
                                    <div class="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="75"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex">
                        <div class="card border-0 bg-primary text-white text-center mb-grid w-100">
                            <div class="d-flex flex-row align-items-center h-100">
                                <div class="card-icon d-flex align-items-center h-100 justify-content-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-shopping-cart">
                                        <circle cx="8" cy="21" r="2"></circle>
                                        <circle cx="20" cy="21" r="2"></circle>
                                        <path
                                            d="M5.67 6H23l-1.68 8.39a2 2 0 0 1-2 1.61H8.75a2 2 0 0 1-2-1.74L5.23 2.74A2 2 0 0 0 3.25 1H1">
                                        </path>
                                    </svg>
                                </div>
                                <div class="card-body">
                                    <div class="card-info-title">Sales</div>
                                    <h3 class="card-title mb-0">
                                        768
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex">
                        <div class="card border-0 bg-success text-white text-center mb-grid w-100">
                            <div class="d-flex flex-row align-items-center h-100">
                                <div class="card-icon d-flex align-items-center h-100 justify-content-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg>
                                </div>
                                <div class="card-body">
                                    <div class="card-info-title">Sign Ups (this week)</div>
                                    <h3 class="card-title mb-0">
                                        1,258
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div class="card-header-title">Featured</div>

                                <nav class="card-header-actions">
                                    <a class="card-header-action" data-toggle="collapse" href="#card1"
                                        aria-expanded="false" aria-controls="card1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-minus-circle">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="8" y1="12" x2="16" y2="12"></line>
                                        </svg>
                                    </a>

                                    <div class="dropdown">
                                        <a class="card-header-action" href="#" role="button" id="card1Settings"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-settings">
                                                <circle cx="12" cy="12" r="3"></circle>
                                                <path
                                                    d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                                </path>
                                            </svg>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="card1Settings">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>

                                    <a href="#" class="card-header-action">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-x-circle">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="15" y1="9" x2="9" y2="15"></line>
                                            <line x1="9" y1="9" x2="15" y2="15"></line>
                                        </svg>
                                    </a>
                                </nav>
                            </div>
                            <div class="card-body collapse show" id="card1">
                                <h4 class="card-title">Special title treatment</h4>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.
                                </p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                Featured
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Special title treatment</h4>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.
                                </p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">

        </div>
    </div>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
@endsection
