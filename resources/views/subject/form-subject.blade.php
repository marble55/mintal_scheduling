@extends('layouts.app')

@section('content')
    <!-- Main content area -->
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
            <!-- Form -->
            <form method="POST"
                action="{{ $action === 'update' ? route('subject.update', $subject->id) : route('subject.store') }}">
                @if ($action === 'update')
                    @method('PUT')
                @endif
                @csrf

                <!-- Subject Code input -->
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class='bx bx-user-pin'></i>
                    </span>
                    <input type="text"
                        class="form-control form-control-lg fs-6  @error('subject_code') is-invalid @enderror"
                        name="subject_code" value="{{ old('subject_code', $subject->subject_code ?? '') }}"
                        placeholder="Subject Code" required maxlength="25">
                    @error('subject_code')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description input -->
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class='bx bx-book'></i>
                    </span>
                    <input type="text"
                        class="form-control form-control-lg fs-6 @error('description') is-invalid @enderror"
                        name="description" value="{{ old('description', $subject->description ?? '') }}" maxlength="255"
                        placeholder="Description" required>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Units Lecture input -->
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class='bx bx-collection'></i>
                    </span>
                    <input type="number"
                        class="form-control form-control-lg fs-6 @error('units_lecture') is-invalid @enderror"
                        name="units_lecture" placeholder="Lecture"
                        value="{{ old('units_lecture', $subject->units_lecture ?? '') }}" required min="0"
                        max="99.99">
                    @error('units_lecture')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Units Lab input -->
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class='bx bx-label'></i>
                    </span>
                    <input type="decimal" class="form-control form-control-lg fs-6 @error('units_lab') is-invalid @enderror"
                        name="units_lab" placeholder="Lab" value="{{ old('units_lab', $subject->units_lab ?? '') }}" min="0"
                        max="99.99" required>
                    @error('units_lab')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Load input -->
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class='bx bx-time'></i>
                    </span>
                    <input type="decimal" class="form-control form-control-lg fs-6 @error('load') is-invalid @enderror"
                        name="load" placeholder="Load" value="{{ old('load', $subject->load ?? '') }}" required
                        min="0" max="99.99">

                    @error('load')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Program Type select -->
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class='bx bx-hard-hat'></i>
                        <label for="subject_type">&nbsp; Program Type</label>
                    </span>
                    <select id="subject_type" name="is_graduate_program"
                        class="form-select @error('is_graduate_program') is-invalid @enderror" required>
                        <!-- Check if $subject exists and its program type -->
                        @if (isset($subject) && $subject->is_graduate_program)
                            <option value="1">Graduate</option>
                            <option value="0">Undergraduate</option>
                        @else
                            <option value="0">Undergraduate</option>
                            <option value="1">Graduate</option>
                        @endif
                    </select>
                    @error('is_graduate_program')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit button -->
                <button class="btn btn-primary btn-lg w-100"
                    style="border: white; background-color: rgb(161, 49, 49);">Add</button>
            </form>
        </div>
    </div>
@endsection
