@extends('layouts.app')

@section('content')
<div class="row align-items-center justify-content-center" style="margin-bottom:-20%;">
    <div class="col col-sm-6 col-lg-7 col-xl-6">
        <!-- Title -->
        <div class="text-center mb-5">
            <h3 class="fw-bold">Add Schedule</h3>
        </div>
        <!-- Divider -->
        <div class="position-relative">
            <hr class="text-secondary divider">
        </div>
        <!-- Form -->
        <form action="?page=AssignFaculty" method="POST">
            <!-- Schedule ID Input -->
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <i class='bx bx-id-card'></i>
                </span>
                <input type="number" class="form-control form-control-lg fs-6" name="sched_id" placeholder="Schedule ID" required>
            </div>
            <!-- Day Input -->
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <i class='bx bx-user-pin'></i>
                </span>
                <input type="text" class="form-control form-control-lg fs-6" name="day" placeholder="Day" required>
            </div>
            <!-- Time Start Input -->
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <i class='bx bx-time'></i>
                </span>
                <input type="time" class="form-control form-control-lg fs-6" name="time_start" placeholder="Time Start" required>
            </div>
            <!-- Time End Input -->
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <i class='bx bx-time'></i>
                </span>
                <input type="time" class="form-control form-control-lg fs-6" name="time_end" placeholder="Time End" required>
            </div>
            <!-- Class ID Input -->
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <i class='bx bx-id-card'></i>
                </span>
                <input type="number" class="form-control form-control-lg fs-6" name="class_id" placeholder="Class ID" required>
            </div>
            <!-- Subject ID Input -->
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <i class='bx bx-id-card'></i>
                </span>
                <input type="number" class="form-control form-control-lg fs-6" name="sub_id" placeholder="Subject ID" required>
            </div>
            <!-- Block ID Input -->
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <i class='bx bx-id-card'></i>
                </span>
                <input type="number" class="form-control form-control-lg fs-6" name="block_id" placeholder="Block ID" required>
            </div>
            <!-- Faculty ID Input -->
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <i class='bx bx-id-card'></i>
                </span>
                <input type="number" class="form-control form-control-lg fs-6" name="faculty_id" placeholder="Faculty ID" required>
            </div>
            <!-- School Year Input -->
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <i class='bx bx-calendar'></i>
                </span>
                <input type="number" class="form-control form-control-lg fs-6" name="school_year" placeholder="School Year" required>
            </div>
            <!-- Semester Input -->
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <i class='bx bx-calendar'></i>
                </span>
                <input type="text" class="form-control form-control-lg fs-6" name="sem" placeholder="Semester" required>
            </div>
            <!-- Lab Input -->
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <i class='bx bxs-school'></i>
                </span>
                <input type="number" class="form-control form-control-lg fs-6" name="lab" placeholder="Lab" required>
            </div>
            <!-- Add Button -->
            <button class="btn btn-primary btn-lg w-100" style="border: white; background-color: rgb(161, 49, 49);">Add</button>
        </form>
    </div>
</div>

@endsection