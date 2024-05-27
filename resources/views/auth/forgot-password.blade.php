<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="app/assets/images/CDM_Logo.png">
    <title>Welcome | Reset Password</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('dist/assets/css/LR.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="row vh-100 g-0">
        <!-- Left Side -->
        <div class="col-lg-6 d-none d-lg-block">
            <div class="bg-holder" style="background-image: url('{{ asset('dist/assets/images/Mintal.png') }}"></div>
        </div>

        <!-- Right Side -->
        <div class="col-lg-6 col-12 d-flex align-items-center justify-content-center">
            <div class="col col-sm-8 col-md-6 col-lg-7 col-xl-6">
                <!-- Logo -->
                <a href="#" class="d-flex justify-content-center mb-4">
                    <img src="{{ asset('dist/assets/images/CDM_Logo.png') }}" alt="" class="img-fluid" style="max-width: 200px; width: 100%;">
                </a>
                <div class="text-center">
                    <h3 class="fw-bold">Reset Password</h3>
                    <p class="text-secondary fs-6">Welcome to USeP Mintal Scheduling System</p>
                </div>

                <!-- Divider -->
                <div class="position-relative">
                    <hr class="text-secondary divider">
                </div>

                <!-- Reset Password Form -->
                <div class="mb-4 text-sm text-gray-600">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class='bx bx-envelope'></i>
                        </span>
                        <input id="email" class="form-control form-control-lg fs-6" type="email" name="email" :value="old('email')" required autofocus placeholder="Email">
                    </div>

                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    <div class="d-flex justify-content-end mt-4">
                        <button class="btn btn-light-maroon btn-lg w-100">
                            {{ __('Email Password Reset Link') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
