<!DOCTYPE html>
<html lang="en-US">

@include('home.partial.head')

<body>


    <!-- Page Loader Start -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner"></div>
    </div>
    <!-- Page Loader End -->

    @include('home.partial.navbar')

    @yield('content')
    @include('home.partial.script')
    @yield('scripts')

</body>

</html>
