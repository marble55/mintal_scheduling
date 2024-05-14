<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="app/assets/images/CDM_Logo.png"></link>
    <title>Welcome | Register </title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css"></link>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('dist/assets/css/LR.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])


</head>
<body>
    <div class="row vh-120 g-0">
        <!-- Left Side -->
        <div class="col-lg-6 position-relative d-none d-lg-block">
            <div class="bg-holder" style="background-image: url('{{ asset('dist/assets/images/MINTAL2.jpg') }}"></div>
        </div>
        <!-- Right Side -->
        <div class="col-lg-6">
            <div class="row align-items-center justify-content-center h-100 g-0
            px-4 px-sm-0">
                <div class="col col-sm-6 col-lg-9">
                    <!-- Logo -->
                    <a href="#" class="d-flex justify-content-center mb-4">
                        <img src="{{ asset('dist/assets/images/CDM_Logo.png') }}" alt="" width="200">
                    </a>
                    <div class="text-center mb-5">
                        <h3 class="fw-bold">Register | Program Head</h3>
                        <p class="text-secondary">Welcome to USeP Mintal Scheduling
                            System
                        </p>
                    </div>
                    <!-- Divider -->
                    <div class="position-relative">
                        <hr class="text-secondary divider">
                    </div>
                
                    <!-- Form -->
                    <form action="{{route('register')}}" method="POST">
                        @csrf
                
                        <div class="row">
                            <div class="col-md-6">
                                <!-- First Column -->

                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class='bx bx-user'></i>
                                    </span>
                                    <input type="text" class="form-control form-control-lg fs-6" name="name" placeholder="Username" required>
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class='bx bx-envelope'></i>
                                    </span>
                                    <input type="text" class="form-control form-control-lg fs-6" name="email" placeholder="Email" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- Second Column -->
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class='bx bx-lock-alt'></i>
                                    </span>
                                    <input type="password" class="form-control form-control-lg fs-6" name="password" placeholder="Password" required autocomplete="new-password">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class='bx bx-lock-alt'></i>
                                    </span>
                                    <input type="password" class="form-control form-control-lg fs-6" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                                    
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-light-maroon btn-lg w-100">Register</button>

                        <div class="text-center mt-3">
                            <small>Already have an account? <a href="{{route('login')}}" class="fw-fw-bold text-light-maroon text-decoration-none">Log In</a></small>
                        </div>
                
                </div>
            </div>
        </div>
    </div>
</body>
</html>