@extends('layouts.app')

@section('content')
    <div class="row align-items-center justify-content-center">
        <div class="col col-sm-6 col-lg-7 col-xl-6">
            <!-- Title -->
            <div class="text-center mb-5">
                <h3 class="fw-bold">Add Schedule</h3>
            </div>
            <!-- Divider -->
            <div class="position-relative">
                <hr class="text-secondary divider">
            </div>
            <div class="container pt-5">

    <div class="row">
        <div class="col-md-6">
            <!-- Left Column -->
            <form action="{{ route('schedule.store') }}" method="POST">
                @csrf
                <!-- Faculty ID Input -->
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class='bx bx-id-card'></i>
                    </span>
                    <select name="faculty_id" id="faculty_id" class="form-control form-control-lg fs-6" required>
                        @foreach ($faculties as $faculty)
                            <option value="{{ $faculty->id }}">{{ $faculty->first_name . ' ' . $faculty->last_name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Subject ID Input -->
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class='bx bx-id-card'></i>
                    </span>
                    <select name="subject_id" id="subject_id" class="form-control form-control-lg fs-6" required>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->subject_code . ': ' . $subject->description }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Lab Input -->
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class='bx bxs-school'></i>
                    </span>
                    <input type="checkbox" class="text-input" id="is_lab" name="is_lab" value="0" style="margin-left:10px;" {{ old('is_lab') ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_lab">&nbsp;Lab </label>
                </div>

                <!-- Block ID Input -->
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class='bx bx-id-card'></i>
                    </span>
                    <select name="block_id" id="block_id" class="form-control form-control-lg fs-6" required>
                        @foreach ($blocks as $block)
                            <option value="{{ $block->id }}">{{ $block->course . ' ' . $block->section }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Classroom ID Input -->
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class='bx bx-id-card'></i>
                    </span>
                    <select name="classroom_id" id="classroom_id" class="form-control form-control-lg fs-6" required>
                        @foreach ($classrooms as $classroom)
                            <option value="{{ $classroom->id }}">{{ $classroom->room . ' in ' . $classroom->building }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="col-md-6">
                <!-- Right Column -->
                <!-- Add the rest of your input fields here -->
                <!-- Day Input -->
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class='bx bx-user-pin'></i>
                    </span>
                    <select name="day" id="day" class="form-control form-control-lg fs-6" required>
                        <option value="MONDAY">Monday</option>
                        <option value="TUESDAY">Tuesday</option>
                        <option value="WEDNESDAY">Wednesday</option>
                        <option value="THURSDAY">Thursday</option>
                        <option value="FRIDAY">Friday</option>
                        <option value="SATURDAY">Saturday</option>
                        <option value="SUNDAY">Sunday</option>
                    </select>
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

                <!-- School Year Input -->
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class='bx bx-calendar'></i>
                    </span>
                    <select name="semesters_id" id="semesters_id" class="form-control form-control-lg fs-6" required>
                        @foreach ($semesters as $semester)
                            <option value="{{ $semester->id }}">{{ $semester->semester }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Semester Input -->
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class='bx bx-calendar'></i>
                    </span>
                    <select name="sy_id" id="sy_id" class="form-control form-control-lg fs-6" required>
                        @foreach ($sy as $schoolyear)
                            <option value="{{ $schoolyear->id }}">{{ $schoolyear->year }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
                <!-- Add Button -->
                <button class="btn btn-primary btn-lg w-100" style="border: white; background-color: rgb(161, 49, 49);">Add</button>
            </form>
        </div>
    </div>

        </div>
    </div>
@endsection
