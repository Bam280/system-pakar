<!DOCTYPE html>
<html lang="en">

<head>
    <title>AdminX - The last Admin template you'll ever need</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/adminx.css') }}" media="screen" />

    @stack('styles')

    <!--
      # Optional Resources
      Feel free to delete these if you don't need them in your project
    -->
</head>

<body>
    <div class="adminx-container">

        @include('layouts.dashboard.partials.navbar')

        <!-- expand-hover push -->
        <!-- Sidebar -->
        @include('layouts.dashboard.partials.sidebar')
        <!-- Sidebar End -->

        <!-- adminx-content-aside -->
        <div class="adminx-content">
            <!-- <div class="adminx-aside">

        </div> -->

            <div class="adminx-main-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- If you prefer jQuery these are the required scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('/dist/js/vendor.js') }}"></script>
    <script src="{{ asset('/dist/js/adminx.js') }}"></script>


    @stack('scripts')

    <!-- If you prefer vanilla JS these are the only required scripts -->
    <!-- script src="./dist/js/vendor.js"></script>
    <script src="./dist/js/adminx.vanilla.js"></script-->
</body>

</html>
