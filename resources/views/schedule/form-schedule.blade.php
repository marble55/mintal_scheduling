@extends('layouts.app')

@section('content')
    <div class="row align-items-center justify-content-center">
        <div class="col col-sm-6 col-lg-7 col-xl-6">
            <!-- Title -->
            <div class="text-center mb-5">
                <h3 class="fw-bold">{{ ucfirst($action) }} Schedule</h3>
            </div>
            <!-- Divider -->
            <div class="position-relative">
                <hr class="text-secondary divider">
            </div>
            <div class="container pt-5">

                <div class="row">
                    <div class="col-md-6">
                        <!-- Left Column -->
                        <form method="POST" action="{{ $action === 'update' ? route('schedule.update', $schedule->id) : route('schedule.store') }}">
                            @if ($action === 'update')
                                @method('PUT')
                            @endif
                            @csrf

                            <!-- Faculty ID Input -->
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bx-id-card'></i>
                                </span>
                                <select name="faculty_id" id="faculty_id" class="form-control form-control-lg fs-6"
                                    required>
                                    @if ($action === 'update')
                                        <option value="{{ $schedule->faculty_id }}">
                                            {{ $schedule->faculty->first_name . ' ' . $schedule->faculty->last_name }}
                                        </option>

                                        @foreach ($faculties as $faculty)
                                            @if ($faculty->id == $schedule->faculty_id)
                                                @continue
                                            @endif
                                            <option value="{{ $faculty->id }}">
                                                {{ $faculty->first_name . ' ' . $faculty->last_name }}</option>
                                        @endforeach
                                    @else
                                        @foreach ($faculties as $faculty)
                                            <option value="{{ $faculty->id }}">
                                                {{ $faculty->first_name . ' ' . $faculty->last_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <!-- Subject ID Input -->
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bx-id-card'></i>
                                </span>
                                <select name="subject_id" id="subject_id" class="form-control form-control-lg fs-6"
                                    required>
                                    @if ($action === 'update')
                                        <option value="{{ $schedule->subject_id }}">
                                            {{ $schedule->subject->subject_code . ': ' . $schedule->subject->description }}
                                        </option>

                                        @foreach ($subjects as $subject)
                                            @if ($subject->id == $schedule->subject_id)
                                                @continue
                                            @endif
                                            <option value="{{ $subject->id }}">
                                                {{ $subject->subject_code . ': ' . $subject->description }}
                                            </option>
                                        @endforeach
                                    @else
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}">
                                                {{ $subject->subject_code . ': ' . $subject->description }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <!-- Lab Input -->
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bxs-school'></i>
                                </span>
                                <input type="checkbox" class="text-input" id="is_lab" name="is_lab" value="0"
                                    style="margin-left:10px;" {{ old('is_lab') ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_lab">&nbsp;Lab </label>
                            </div>

                            <!-- Block ID Input -->
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bx-id-card'></i>
                                </span>
                                <select name="block_id" id="block_id" class="form-control form-control-lg fs-6" required>

                                    @if ($action === 'update')
                                        <option value="{{ $schedule->block_id }}">
                                            {{ $schedule->block->course . ' ' . $schedule->block->section }}
                                        </option>

                                        @foreach ($blocks as $block)
                                            @if ($block->id == $schedule->block_id)
                                                @continue
                                            @endif
                                            <option value="{{ $block->id }}">
                                                {{ $block->course . ' ' . $block->section }}
                                            </option>
                                        @endforeach
                                    @else
                                        @foreach ($blocks as $block)
                                            <option value="{{ $block->id }}">
                                                {{ $block->course . ' ' . $block->section }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <!-- Classroom ID Input -->
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bx-id-card'></i>
                                </span>
                                <select name="classroom_id" id="classroom_id" class="form-control form-control-lg fs-6"
                                    required>
                                    @if ($action === 'update')
                                        <option value="{{ $schedule->classroom_id }}">
                                            {{ $schedule->classroom->room . ' in ' . $schedule->classroom->building}}
                                        </option>

                                        @foreach ($classrooms as $classroom)
                                            @if ($classroom->id == $schedule->classroom_id)
                                                @continue
                                            @endif
                                            <option value="{{ $classroom->id }}">{{ $classroom->room . ' in ' . $classroom->building }}</option>
                                        @endforeach
                                    @else
                                        @foreach ($classrooms as $classroom)
                                            <option value="{{ $classroom->id }}">{{ $classroom->room . ' in ' . $classroom->building }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                    </div>

                    <div class="col-md-6">
                        <!-- Right Column -->
                        <!-- Add the rest of your input fields here -->
                        <!-- Day Input -->
                        <div class="input-group mb-3">
                            <span class="input-group-checkbox">
                                <i class='bx bx-user-pin'></i>
                            </span>
                            
                            <input type="checkbox" id="day-monday" name="day[]" value="M">
                            <label for="day-monday">Monday</label><br>
                            
                            <input type="checkbox" id="day-tuesday" name="day[]" value="T">
                            <label for="day-tuesday">Tuesday</label><br>

                            <input type="checkbox" id="day-wednesday" name="day[]" value="W">
                            <label for="day-wednesday">Wednesday</label><br>

                            <input type="checkbox" id="day-thursday" name="day[]" value="TH">
                            <label for="day-thursday">Thursday</label><br>

                            <input type="checkbox" id="day-friday" name="day[]" value="F">
                            <label for="day-friday">Friday</label><br>

                            <input type="checkbox" id="day-saturday" name="day[]" value="S">
                            <label for="day-saturday">Saturday</label><br>
                        </div>

                        <!-- Time Start Input -->
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class='bx bx-time'></i>
                            </span>
                            <input type="time" class="form-control form-control-lg fs-6" name="time_start"
                                placeholder="Time Start" required>
                        </div>

                        <!-- Time End Input -->
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class='bx bx-time'></i>
                            </span>
                            <input type="time" class="form-control form-control-lg fs-6" name="time_end"
                                placeholder="Time End" required>
                        </div>

                    </div>
                    <!-- Add Button -->
                    <button class="btn btn-primary btn-lg w-100"
                        style="border: white; background-color: rgb(161, 49, 49);">Add</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
