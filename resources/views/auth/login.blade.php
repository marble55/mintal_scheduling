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
                    <div class="text-center mb-5">
                        <h3 class="fw-bold">Log In | Program Head</h3>
                        <p class="text-secondary fs-6">Welcome to USeP Mintal Scheduling
                            System
                        </p>
                    </div>

                    <!-- Divider -->
                    <div class="position-relative">
                        <hr class="text-secondary divider">
                    </div>

                    <!-- Form -->
                    <form action="login.php" method="POST">
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class='bx bx-user'></i>
                            </span>
                            <input type="text" class="form-control form-control-lg
                            fs-6"
                                name="username" placeholder="Username" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class='bx bx-lock-alt'></i>
                            </span>
                            <input type="password" class="form-control form-control-lg
                            fs-6"
                                name="password" placeholder="Password" required>
                        </div>

                        <!-- Remember Me -->
                        <div class="input-group mb-3 d-flex justify-content-between">
                            <div class="form-check fs-md">
                                <input type="checkbox" class="form-check-input " id="formCheck">
                                <label for="formCheck"
                                    class="form-check-label
                                text-secondary"><small>Remember
                                        Me</small></label>
                            </div>
                            <div>
                                <small><a href="#" class="text-light-maroon text-decoration-none fs-sm">Forgot
                                        Password?</a></small>
                            </div>
                        </div>
                        <button class="btn btn-light-maroon btn-lg w-100">Login</button>
                    </form>

                    <div class="text-center mt-2 fs-md">
                        <small>Don't have an account? <a href="register.php"
                                class="fw-bold text-light-maroon text-decoration-none">Sign
                                Up</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
