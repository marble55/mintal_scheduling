<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="app/assets/images/CDM_Logo.png"></link>
    <title>Welcome | Verify </title>
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
            <div class="bg-holder" style="background-image: url('{{ asset('dist/assets/images/Mintal.png') }}"></div>
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
                        <h3 class="fw-bold">Verify as Faculty</h3>
                        <p class="text-secondary">Welcome to USeP Mintal Scheduling
                            System
                        </p>
                    </div>
                    <!-- Divider -->
                    <div class="position-relative">
                        <hr class="text-secondary divider">
                    </div>
                
                    <!-- Form -->
                    <form method="POST" action="{{ route('register.faculty.update', ['user' => $user]) }}">
                        @csrf
                
                        <div class="row">
                            <div class="col-md-6">
                                <!-- First Column -->

                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                    <i class='bx bxs-id-card'></i>
                                    </span>
                                    <input type="text" id="id_usep" class="form-control form-control-lg fs-6" name="id_usep" placeholder="USeP ID" required maxlength=10>
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class='bx bx-user'></i>
                                    </span>
                                    <input type="text" id="first_name" class="form-control form-control-lg fs-6" name="first_name" placeholder="First Name" required>
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class='bx bx-user-pin'></i>
                                    </span>
                                    <label class="form-check-label" for="is_part_timer">Part Timer: </label>
                                    <input type="checkbox" id="is_part_timer" class="form-check-input-lg" style="margin-left:10px; transform: scale(2);" name="is_part_timer">
                                </div>

                            </div>

                            <div class="col-md-6">
                                <!-- Second Column -->
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class='bx bx-user'></i>
                                    </span>
                                    <input type="text" id="remarks" class="form-control form-control-lg fs-6" name="remarks" placeholder="Remarks" required>
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class='bx bx-user'></i>
                                    </span>
                                    <input type="text" id="last_name" class="form-control form-control-lg fs-6" name="last_name" placeholder="Last Name" required>
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class='bx bxs-user-pin'></i>
                                    </span>
                                    <label class="form-check-label" for="is_graduate">Graduate: </label>
                                    <input type="checkbox" id="is_graduate" class="form-check-input-lg" style="margin-left:10px; transform: scale(2);" name="is_graduate">
                                </div>

                            </div>
                        </div>
                        <button class="btn btn-light-maroon btn-lg w-100">Verify</button>
                
                </div>
            </div>
        </div>
    </div>
</body>
</html>