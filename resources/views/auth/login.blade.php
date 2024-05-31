<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="app/assets/images/CDM_Logo.png">
    <title>Welcome | Log in </title>
    <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('dist/assets/css/LR.css') }}">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        .loader {
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            border: 8px solid #f3f3f3;
            border-radius: 50%;
            border-top: 8px solid #3498db;
            width: 60px;
            height: 60px;
            animation: spin 2s linear infinite;
            z-index: 9999;
            display: none;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .loading-overlay {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: rgba(255, 255, 255, 0.7);
            z-index: 9998;
            display: none;
        }
    </style>
</head>

<body>
    <div class="loading-overlay"></div>
    <div class="loader"></div>
    <div class="row vh-100 g-0">
        <!-- Left Side -->
        <div class="col-lg-6 d-none d-lg-block">
            <div class="bg-holder" style="background-image: url('{{ asset('dist/assets/images/MINTAL.jpg') }}"></div>
        </div>
        <!-- Right Side -->
        <div class="col-lg-6 col-12">
            <div class="bg-holder d-flex align-items-center justify-content-center g-0">
                <div class="col col-sm-6 col-lg-7 col-xl-6">
                    <!-- Logo -->
                    <a href="#" class="d-flex justify-content-center mb-4">
                        <img src="{{ asset('dist/assets/images/CDM_Logo.png') }}" alt="" class="img-fluid" style="max-width: 200px; width: 100%;">
                    </a>
                    <div class="text-center">
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
                    <form action="{{ route('login') }}" method="POST" id="loginForm">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class='bx bx-envelope'></i>
                            </span>
                            <input type="email" class="form-control form-control-lg fs-6" name="email" placeholder="Email" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class='bx bx-lock-alt'></i>
                            </span>
                            <input type="password" class="form-control form-control-lg fs-6" name="password" placeholder="Password" required>
                        </div>
                        <!-- Remember Me -->
                        <div class="input-group mb-3 d-flex justify-content-between">
                            <div class="form-check fs-md">
                                <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                                <label for="remember_me" class="form-check-label text-secondary"><small>Remember Me</small></label>
                            </div>
                            <div>
                                @if (Route::has('password.request'))
                                    <small><a href="{{ route('password.request') }}" class="text-light-maroon text-decoration-none fs-sm">Forgot Password?</a></small>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-light-maroon btn-lg w-100">Login</button>
                    </form>
                    {{-- <div class="text-center mt-2 fs-md">
                        <small>Don't have an account? <a href="{{ route('register') }}" class="fw-bold text-light-maroon text-decoration-none">Sign Up</a></small>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loader = document.querySelector('.loader');
            const overlay = document.querySelector('.loading-overlay');
            const loginForm = document.getElementById('loginForm');

            function showLoader() {
                loader.style.display = 'block';
                overlay.style.display = 'block';
            }

            function hideLoader() {
                loader.style.display = 'none';
                overlay.style.display = 'none';
            }

            loginForm.addEventListener('submit', function() {
                showLoader();
            });

            window.addEventListener('load', function() {
                hideLoader();
            });
        });
    </script>
</body>

</html>
