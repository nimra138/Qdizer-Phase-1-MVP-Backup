<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Sora:wght@600;700&display=swap" rel="stylesheet">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('user/style-dash.css') }}">
</head>
<body>

    <!-- Mobile Topbar -->
    @include('user.partials.topbar')

    <!-- Sidebar -->
    @include('user.partials.sidebar')

    <!-- Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Main Content -->
    <main class="main-content">

        @yield('content')

        <!-- Footer -->
        @include('user.partials.footer')

    </main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>

function toggleSidebar() {

    document
        .getElementById('sidebar')
        .classList.toggle('active');

    document
        .getElementById('sidebarOverlay')
        .classList.toggle('active');
}

document
    .getElementById('sidebarOverlay')
    .addEventListener('click', function () {

        document
            .getElementById('sidebar')
            .classList.remove('active');

        this.classList.remove('active');
    });

</script>

</body>
</html>