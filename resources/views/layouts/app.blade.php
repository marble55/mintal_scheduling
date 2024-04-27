<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('dist/assets/images/CDM_Logo.png') }}">
    </link>
    <title>Mintal Scheduling System </title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet">
    </link>
    <link rel="stylesheet" href="{{ asset('dist/assets/css/Form.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <aside id="sidebar" class="bg-dark-maroon">
            @include('layouts.sidebar')
        </aside>

        <!-- Main -->
        <div class="main p-3">
            @include('layouts.topbar')

            <!-- ========== Main Content Start ========== -->
            @yield('content')
            <!-- ========== Main Content End ========== -->

            <!-- Footer -->
            <footer>
                <p class="copyright"> © Zeller & Friends | All Rights Reserved 2024</p>
            </footer>
        </div>

    </div>
    <script src="{{ asset('dist/assets/js/sidebar.js') }}"></script>
</body>

</html>
