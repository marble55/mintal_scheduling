@extends('layouts.app')

@section('content')
    <div class="row align-items-center justify-content-center">
        <div class="col col-sm-6 col-lg-7 col-xl-6">
            <div class="text-center mb-5">
                <h3 class="fw-bold">Edit Faculty</h3>
            </div>
            <!-- Divider -->
            <div class="position-relative">
                <hr class="text-secondary divider">
            </div>
            
            <!-- Form -->
            <form action="{{route('faculty.update', $faculty)}}" method="POST">
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class='bx bx-id-card'></i>
                    </span>
                    <input type="number" class="form-control form-control-lg
                fs-6"
                        value="" name="faculty_id" placeholder="Faculty ID" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class='bx bx-user-pin'></i>
                    </span>
                    <input type="text" class="form-control form-control-lg
                fs-6"
                        value="" name="fname" placeholder="Firstname" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class='bx bx-user-pin'></i>
                    </span>
                    <input type="text" class="form-control form-control-lg
                fs-6"
                        value="" name="lname" placeholder="Lastname" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class='bx bx-bookmark'></i>
                    </span>
                    <input type="text" class="form-control form-control-lg
                fs-6"
                        value="" name="remarks" placeholder="Remarks" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class='bx bx-hard-hat'></i>
                    </span>
                    <select name="degree" class="text-input" value="" required>
                        <option value="Graduate">Graduate</option>
                        <option value="PartTimer">PartTimer</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class='bx bx-id-card'></i>
                    </span>
                    <input type="number" class="form-control form-control-lg
                fs-6"
                        value="" name="PH_id" placeholder="PH_ID" required>
                </div>
                <button class="btn btn-primary btn-lg w-100"
                    style="border: white; background-color: rgb(161, 49, 49);">Add</button>
            </form>

        </div>
    </div>
@endsection
