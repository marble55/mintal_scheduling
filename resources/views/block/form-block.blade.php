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
                    <input type="text" class="form-control form-control-lg fs-6" name="course" placeholder="Course"
                        value="{{ $block->course ?? '' }}" required>
                </div>
                <!-- Section Input -->
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class='bx bx-book'></i>
                    </span>
                    <input type="text" class="form-control form-control-lg fs-6" name="section" placeholder="Section"
                        value="{{ $block->section ?? '' }}" required>
                </div>
                <!-- Year Level Input -->
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class='bx bx-hard-hat'></i>
                    </span>
                    <input type="number" class="form-control form-control-lg fs-6" name="year_level"
                        value="{{ $block->year_level ?? '' }}" placeholder="Year Level" required max="5" min="0">
                </div>
                <!-- Add Button -->
                <button class="btn btn-primary btn-lg w-100"
                    style="border: white; background-color: rgb(161, 49, 49);">{{ ucfirst($action) }}</button>
            </form>
        </div>
    </div>
@endsection
