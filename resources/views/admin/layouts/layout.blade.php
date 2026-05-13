<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            background: #f6f7fb;
        }

        /* SIDEBAR */
        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1;
            background: #ffffff;
            border-right: 1px solid #eee;
        }

        .sidebar .nav-link {
            border-radius: 10px;
            color: #333;
            padding: 10px 12px;
        }

        .sidebar .nav-link:hover {
            background: #f1f5f9;
        }

        .sidebar .nav-link.active {
            background: #4f46e5;
            color: #fff;
        }

        /* MAIN */
        .main {
            margin-left: 260px;
        }

        /* NAVBAR */
        .topbar {
            background: #fff;
            border-bottom: 1px solid #eee;
        }

        /* CARDS */
        .card {
            border: none;
            border-radius: 16px;
        }

        @media(max-width: 991px) {
            .sidebar {
                left: -260px;
                transition: 0.3s;
            }

            .sidebar.show {
                left: 0;
            }

            .main {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    @include('admin.layouts.sidebar')

    <!-- MAIN -->
    <div class="main">

        <!-- TOP NAVBAR -->
        @include('admin.layouts.navbar')

        <!-- CONTENT -->
        <div class="container-fluid p-4">
            @yield('content')
        </div>

    </div>

    <script>
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('show');
        }
    </script>

</body>

</html>