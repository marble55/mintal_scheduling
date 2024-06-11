@extends('layouts.app')

@section('content')
    <div class="row align-items-center justify-content-center">
        <div class="col col-sm-6 col-lg-7 col-xl-6">
            <!-- Title -->
            <div class="text-center mb-5">
                <h3 class="fw-bold">{{ ucfirst($action) }} Block</h3>
            </div>
            <!-- Divider -->
            <div class="position-relative">
                <hr class="text-secondary divider">
            </div>
            <!-- Form -->
            <form method="POST"
                action="{{ $action === 'update' ? route('block.update', $block->id) : route('block.store') }}">
                @if ($action === 'update')
                    @method('PUT')
                @endif
                @csrf
                <!-- Course Input -->
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class='bx bx-book'></i>
                    </span>
                    <input type="text" class="form-control form-control-lg fs-6 @error('course') is-invalid @enderror" name="course" placeholder="Course" value="{{ old('course', $block->course ?? '') }}" maxlength="25" required>
                    @error('course')
                    <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
                <!-- Section Input -->
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class='bx bx-book'></i>
                    </span>
                    <input type="text" class="form-control form-control-lg fs-6 @error('section') is-invalid @enderror" name="section" placeholder="Section" value="{{ old('section', $block->section ?? '') }}" maxlength="15" required> 
                    @error('section')
                    <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
                <!-- Year Level Input -->
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class='bx bx-hard-hat'></i>
                    </span>
                    <input type="number" class="form-control form-control-lg fs-6 @error('year_level') is-invalid @enderror" name="year_level" value="{{ old('year_level', $block->year_level ?? '') }}" placeholder="Year Level" required max="5" min="0">
                    @error('year_level')
                    <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
                <!-- Add Button -->
                <button class="btn btn-primary btn-lg w-100"
                    style="border: white; background-color: rgb(161, 49, 49);">{{ ucfirst($action) }}</button>
            </form>
        </div>
    </div>
@endsection
