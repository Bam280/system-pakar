<!DOCTYPE html>
<html lang="en-US">

@include('home.partial.head')

<body>


    @include('home.partial.navbar')

    @yield('content')
    @include('home.partial.script')
    @yield('scripts')

</body>

</html>
