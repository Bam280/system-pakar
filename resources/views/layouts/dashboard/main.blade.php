<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard Diagnosa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('dist/media/img/pakar-background.svg') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/adminx.css') }}" media="screen" />

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    @stack('styles')

    <style>
        .range-wrap {
            position: relative;
            margin: 0 auto 3rem;
        }

        .range {
            width: 100%;
        }

        .bubble {
            background: red;
            color: white;
            padding: 4px 12px;
            position: absolute;
            border-radius: 4px;
            left: 50%;
            transform: translate(-50%, -100%);
        }

        #sidebar {
            background: #ffb606;
        }

        #navbar {
            background: #ffb606;
        }

        .bubble::after {
            content: "";
            position: absolute;
        }

        body {
            margin: 2rem;
        }
    </style>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        const allRanges = document.querySelectorAll(".range-wrap");
        allRanges.forEach(wrap => {
            const range = wrap.querySelector(".form-range");
            const bubble = wrap.querySelector(".bubble");

            range.addEventListener("input", () => {
                setBubble(range, bubble);
            });
            setBubble(range, bubble);
        });

        function setBubble(range, bubble) {
            const val = range.value;
            const min = range.min ? range.min : 0;
            const max = range.max ? range.max : 100;
            const newVal = Number(((val - min) * 100) / (max - min));
            bubble.innerHTML = val;

            // Sorta magic numbers based on size of the native UI thumb
            bubble.style.left = `calc(${newVal}% + (${8 - newVal * 0.15}px))`;
        }
    </script>

    @stack('scripts')

    <!-- If you prefer vanilla JS these are the only required scripts -->
    <!-- script src="./dist/js/vendor.js"></script>
    <script src="./dist/js/adminx.vanilla.js"></script-->
</body>

</html>
