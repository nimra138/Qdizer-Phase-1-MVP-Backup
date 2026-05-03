<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Dashboard')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <!-- CSS -->
    <link href="{{ asset('assets/css/argon-dashboard.css') }}" rel="stylesheet" />

    <!-- Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />

    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
</head>

<body class="g-sidenav-show bg-gray-100">

    {{-- Sidebar --}}
    @include('admin.layouts.sidebar')

    <main class="main-content position-relative border-radius-lg">

        {{-- Navbar --}}
        @include('admin.layouts.navbar')

        <div class="container-fluid py-4">
            {{-- Page Content --}}
            @yield('content')

            {{-- Footer --}}
            @include('admin.layouts.footer')
        </div>

    </main>

    <!-- JS -->
    <script src="{{ asset('assets/js/argon-dashboard.min.js') }}"></script>

    @stack('scripts')

</body>
</html>