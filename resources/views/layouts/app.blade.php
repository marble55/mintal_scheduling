<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ URL::asset('dist/assets/images/CDM_Logo.png') }}">
    <link rel="stylesheet" href="{{ URL::asset('dist/assets/css/bootstrap.min.css') }}">
    
    <link href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.8/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/fh-4.0.1/r-3.0.2/rg-1.5.0/datatables.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="{{ URL::asset('dist/assets/css/LR.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('dist/assets/css/Form.css') }}">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    {{-- ======JQUERY===== --}}
    <title>USeP Mintal Scheduling System</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
    @stack('styles')
    @stack('javascript-head')
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <aside id="sidebar" class="bg-dark-maroon">
            <div class="sidebar-wrapper" style="position: fixed;">
                @include('layouts.sidebar')
            </div>
        </aside>
        <div class="topbar-wrapper">
            <div class="topbar-content">
                @include('layouts.topbar')
            </div>
        </div>
        <!-- Main -->
        <div class="main p-3">

            <!-- ========== Main Content Start ========== -->
            @yield('content')
            <!-- ========== Main Content End ========== -->
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer')

    <script src="{{ URL::asset('dist/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('dist/assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ URL::asset('dist/assets/js/jquery-3.7.1.min.js') }}"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.8/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/fh-4.0.1/r-3.0.2/rg-1.5.0/datatables.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Toastr -->
    @if (Session::has('message'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
                "positionClass": "toast-top-right"
            };
            toastr.success("{{ Session::get('message') }}", 'Success!', {
                timeOut: 12000
            });
        </script>
    @endif

    @if (Session::has('error'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
                "positionClass": "toast-top-right"
            };
            toastr.error("{{ Session::get('error') }}", 'Error!', {
                timeOut: 30000
            });
        </script>
    @endif
    <script src="{{ URL::asset('dist/assets/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('dist/assets/js/sidebar.js') }}"></script>
    <script src="{{ URL::asset('dist/assets/js/alerts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('dist/assets/js/alerts.js') }}"></script>
    @stack('scripts')
</body>

</html>
