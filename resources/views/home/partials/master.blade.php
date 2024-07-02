<!DOCTYPE html>
<html lang="en-US">

@include('home.partials.head')

<body>


    <!-- Page Loader Start -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner"></div>
    </div>
    <!-- Page Loader End -->

    @include('home.partials.navbar')

    @yield('content')

    @include('home.partials.footer')
    @include('home.partials.script')
    @yield('scripts')

</body>

</html>
