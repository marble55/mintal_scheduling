<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="app/assets/images/CDM_Logo.png">
    </link>
    <title>Welcome | Log in </title>
    <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
    </link>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('dist/assets/css/LR.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="row vh-100 g-0">
        <!-- Left Side -->
        <div class="col-lg-6">
            <div class="bg-holder" style="background-image: url('{{ asset('dist/assets/images/MINTAL.jpg') }}"></div>
        </div>

        <!-- Right Side -->
        <div class="col-lg-6">
            <div class="bg-holder d-flex align-items-center justify-content-center g-0">
                <div class="col col-sm-6 col-lg-7 col-xl-6">
                    <!-- Logo -->
                    <a href="#" class="d-flex justify-content-center mb-4">
                        <img src="{{ asset('dist/assets/images/CDM_Logo.png') }}" alt="" width="200">
                    </a>
                    <div class="text-center">
                        <h3 class="fw-bold">Review | Program Head</h3>
                        <p class="text-secondary fs-6">Welcome to USeP Mintal Scheduling
                            System
                        </p>
                    </div>

                    <!-- Divider -->
                    <div class="position-relative">
                        <hr class="text-secondary divider">
                    </div>
                    <div class="text-center">
                        <h3 class="fw-bold">Your account is still being reviewed</h3>
                        <p class="text-secondary fs-6">We'll send you an email once Your
                            Account has been reviewed.
                        </p>
                        <p class="text-secondary fs-5">For more information please contact
                            your school supervisor.
                        </p>
                    </div>

                    <!-- Form -->
                    <form>
                        <button class="btn btn-light-maroon btn-lg w-100"><a href="{{ route('login') }}">Back to Login</a></button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
