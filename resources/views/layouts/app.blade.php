<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('dist/assets/images/CDM_Logo.png') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/css/LR.css') }}">

    
    <title>Mintal Scheduling System </title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet">  
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
    <script src="{{ asset('dist/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('dist/assets/js/datatables.min.js') }}"></script>
    <script src="{{ asset('dist/assets/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('dist/assets/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('dist/assets/js/custom.js') }}"></script>
</body>

</html>
