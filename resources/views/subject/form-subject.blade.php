@extends('layouts.app')

@section('content')
    <div class="row align-items-center justify-content-center" style="margin-bottom:-20%;">
        <div class="col col-sm-6 col-lg-7 col-xl-6">
            <!-- Title -->
            <div class="text-center mb-5">
                <h3 class="fw-bold">{{ ucfirst($action) }} Subject</h3>
            </div>
            <!-- Divider -->
            <div class="position-relative">
                <hr class="text-secondary divider">
            </div>
            <!----- Form ------>
            <form method="POST"
                action="{{ $action === 'update' ? route('subject.update', $subject->id) : route('subject.store') }}">
                @if ($action === 'update')
                    @method('PUT')
                @endif
                @csrf

                <!-- Subject Code Input -->
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class='bx bx-user-pin'></i>
                    </span>
                    <input type="text" class="form-control form-control-lg fs-6" name="subject_code"
                        value="{{ $subject->subject_code ?? '' }}" placeholder="Subject Code" required maxlength=255>
                </div>
                <!-- Description Input -->
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class='bx bx-book'></i>
                    </span>
                    <input type="text" class="form-control form-control-lg fs-6" name="description"
                        value="{{ $subject->description ?? '' }}" placeholder="Description" required>
                </div>
                <!-- Lecture Input -->
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class='bx bx-collection'></i>
                    </span>
                    <input type="number" class="form-control form-control-lg fs-6" name="units_lecture"
                        value="{{ $subject->units_lecture ?? '' }}" placeholder="Lecture" required min="0"
                        max="99.99">
                </div>
                <!-- Lab Input -->
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class='bx bx-label'></i>
                    </span>
                    <input type="number" class="form-control form-control-lg fs-6" name="units_lab" placeholder="Lab"
                        value="{{ $subject->units_lab ?? '' }}" min="0" max="99.99" required>
                </div>
                <!-- Load Input -->
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class='bx bx-time'></i>
                    </span>
                    <input type="number" class="form-control form-control-lg fs-6" name="load" placeholder="Load"
                        value="{{ $subject->load ?? '' }}" required min="0" max="99.99">
                </div>
                <!-- Add Button -->
                <button class="btn btn-primary btn-lg w-100"
                    style="border: white; background-color: rgb(161, 49, 49);">{{ ucfirst($action) }}</button>
            </form>
        </div>
    </div>
@endsection
