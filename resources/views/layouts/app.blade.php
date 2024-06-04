<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ URL::asset('dist/assets/images/CDM_Logo.png') }}">
    <link rel="stylesheet" href="{{ URL::asset('dist/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('dist/assets/css/datatables.min.css') }}">
    <!-- Although mugana ang toastr if dili cdn, kaso matubanan siya sa baba :(  -->
    <!-- <link rel="stylesheet" href="{{ URL::asset('assets/css/toastr.min.css') }}"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    {{-- <link rel="stylesheet" href="{{ asset('dist/assets/css/style.css') }}"> --}}
    <link rel="stylesheet" href="{{ URL::asset('dist/assets/css/LR.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('dist/assets/css/Form.css') }}">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    {{-- ======JQUERY===== --}}
    @stack('styles')
    @stack('javascript-head')
    <title>USeP Mintal Scheduling System</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
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
    <footer class="footer bg-dark-maroon">
        <div class="footer-content">
            <p class="copyright"> © Zeller & Friends | All Rights Reserved 2024</p>
        </div>
    </footer>

    <script src="{{ URL::asset('dist/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('dist/assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ URL::asset('dist/assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ URL::asset('dist/assets/js/datatables.min.js') }}"></script>
    <script></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Although mugana ang toastr if dili cdn, kaso matubanan siya sa baba :(  -->
    <!-- <script src="{{ asset('dist/assets/js/toastr.min.js') }}"></script> -->
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
    <script src="{{ URL::asset('dist/assets/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('dist/assets/js/vfs_fonts.js') }}"></script>

    {{-- REMOVED FOR NOW FOR BUILDING PURPOSES --}}
    {{-- <script src="{{ URL::asset('dist/assets/js/custom.js') }}"></script> --}}
    <script src="{{ URL::asset('dist/assets/js/sidebar.js') }}"></script>
    <script src="{{ URL::asset('dist/assets/js/alerts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('dist/assets/js/alerts.js') }}"></script>
    @stack('scripts')

    <script>
        var table = $('#example').DataTable({
            order: [],
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            // responsive: {
            //     details: true
            // },
            search: {
                boundary: true
            }

        });

        table.buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');
    </script>
</body>

</html>
