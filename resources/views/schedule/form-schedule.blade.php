@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .select2-container {
            max-width: 100%;
        }
    </style>
@endpush

@section('content')
    <div class="row align-items-center justify-content-center">
        <div class="col col-sm-6 col-lg-7 col-xl-10">
            <!-- Title -->
            <div class="text-center mb-5">
                <h3 class="fw-bold">{{ $action == 'update' ? 'Update' : 'Create' }} sched</h3>
            </div>
            <!-- Divider -->
            <div class="position-relative">
                <hr class="text-secondary divider">
            </div>
            <div class="container pt-5">

                <div class="row">
                    <div class="col-md-6">
                        <!-- Left Column -->
                        <form method="POST" id="form"
                            action="{{ $action === 'update' ? route('schedule.update', $schedule->id) : route('schedule.store') }}">
                            @if ($action === 'update')
                                @method('PUT')
                            @endif
                            @csrf

                            <!-- Faculty ID Input -->
                            <label for="faculty_select">Faculty:</label>
                            <div class="form-group mb-3">
                                <span class="input-group-text col-1">
                                    <i class='bx bx-id-card'></i>
                                </span>
                                <select name="faculty_id" id="faculty_select"
                                    class="form-select @error('faculty_id') is-invalid @enderror">
                                    <option value="">No Assigned</option>
                                    @foreach ($faculties as $faculty)
                                        <option value="{{ $faculty->id }}">
                                            {{ $faculty->first_name . ' ' . $faculty->last_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('faculty_id')
                                    <div class="invalid-feedback fs-6">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Subject ID Input -->
                            <label for="subject_select">Subject:</label><br>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bx-id-card'></i>
                                </span>
                                <select name="subject_id" id="subject_select"
                                    class="form-select @error('subject_id') is-invalid @enderror" required>
                                    <option value="">No Assigned</option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}">
                                            <p class="h1">{{ $subject->subject_code . ': ' . $subject->description }}
                                            </p> <br>
                                            <p class="fw-bold">{{ $subject->subject_code . ': ' . $subject->description }}
                                            </p>
                                        </option>
                                    @endforeach
                                </select>
                                @error('subject_id')
                                    <div class="invalid-feedback fs-6">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Lab Input -->
                            <label for="is-lab_checkbox">Subject Unit:</label><br>
                            <div class="input-group mb-3">
                                <div class="form-check-text">
                                    <input type="checkbox"
                                        class="form-check-input m-0 fs-5 @error('subject_id') is-invalid @enderror"
                                        id="is-lab_checkbox" name="is_lab" value="1"
                                        style="margin-left:10px;"@checked($action === 'update' && $schedule->is_lab == 1)>
                                    <label class="form-check-label fs-6 " for="is-lab_checkbox">Lab</label>
                                    @error('block_id')
                                        <div class="invalid-feedback fs-6">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Block ID Input -->
                            <br>
                            <label for="block_select">Block:</label><br>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bx-id-card'></i>
                                </span>
                                <select name="block_id" id="block_select"
                                    class="form-select @error('block_id') is-invalid @enderror">
                                    <option value="">No Assigned</option>
                                    @foreach ($blocks as $block)
                                        <option value="{{ $block->id }}">
                                            {{ $block->course . ' ' . $block->section }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('block_id')
                                    <div class="invalid-feedback fs-6">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Classroom ID Input -->
                            <label for="classroom_select">Classroom:</label><br>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bx-id-card'></i>
                                </span>
                                <select name="classroom_id" id="classroom_select"
                                    class="form-select @error('classroom_id') is-invalid @enderror">
                                    <option value="">No Assigned</option>
                                    @foreach ($classrooms as $classroom)
                                        <option value="{{ $classroom->id }}">
                                            {{ $classroom->room . ' in ' . $classroom->building }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('classroom_id')
                                    <div class="invalid-feedback fs-6">{{ $message }}</div>
                                @enderror
                            </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-md-6">
                        <!-- Day Input -->
                        <label for="form-check_day">Days:</label><br>
                        {{-- @dd(old('day[]')) --}}
                        <div id="form-check_day" class="form-check form-check-inline mb-3 required">
                            <input type="checkbox" id="day-monday" name="day[]" class="form-check-input border-black"
                                value="M," @checked($action === 'update' && strpos($schedule->day, 'M,') !== false)>
                            <label for="day-monday" class="form-check-label me-2">Monday</label><br>

                            <input type="checkbox" id="day-tuesday" class="form-check-input border-black" name="day[]"
                                value="T," @checked($action === 'update' && strpos($schedule->day, 'T,') !== false)>
                            <label for="day-tuesday" class="form-check-label me-2">Tuesday</label><br>

                            <input type="checkbox" id="day-wednesday" class="form-check-input border-black" name="day[]"
                                value="W," @checked($action === 'update' && strpos($schedule->day, 'W,') !== false)>
                            <label for="day-wednesday" class="form-check-label me-2">Wednesday</label><br>

                            <input type="checkbox" id="day-thursday" class="form-check-input border-black" name="day[]"
                                value="TH," @checked($action === 'update' && strpos($schedule->day, 'TH,') !== false)>
                            <label for="day-thursday" class="form-check-label me-2">Thursday</label><br>

                            <input type="checkbox" id="day-friday" class="form-check-input border-black" name="day[]"
                                value="F," @checked($action === 'update' && strpos($schedule->day, 'F,') !== false)>
                            <label for="day-friday" class="form-check-label me-2">Friday</label><br>

                            <input type="checkbox" id="day-saturday" class="form-check-input border-black"
                                name="day[]" value="S," @checked($action === 'update' && strpos($schedule->day, 'S,') !== false)>
                            <label for="day-saturday" class="form-check-label me-2">Saturday</label><br>

                            <input type="checkbox" id="day-saturday" class="form-check-input border-black"
                                name="day[]" value="SU," @checked($action === 'update' && strpos($schedule->day, 'SUN,') !== false)>
                            <label for="day-saturday" class="form-check-label me-2">Sunday</label><br>

                            @error('day')
                                <div class="invalid-feedback fs-6">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <!-- Time Start Input -->
                            <label for="time-start_input">Time Start:</label><br>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bx-time'></i>
                                </span>
                                <input type="time" id="time-start_input"
                                    class="form-control form-control-lg fs-6 @error('time_start') is-invalid @enderror"
                                    name="time_start" placeholder="Time Start"
                                    value="{{ old('time_start', $timeSlot->time_start->format('H:i') ?? '') }}"required>
                                @error('time_start')
                                    <div class="invalid-feedback fs-6">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Time End Input -->
                            <label for="time-end_input">Time End:</label><br>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bx-time'></i>
                                </span>
                                <input type="time"
                                    class="form-control form-control-lg fs-6  @error('time_end') is-invalid @enderror"
                                    name="time_end" placeholder="Time End" id="time-end_input"
                                    value="{{ old('time_end', $timeSlot->time_end->format('H:i') ?? '') }}" required>
                                @error('time_end')
                                    <div class="invalid-feedback fs-6">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Add Button -->
                    <button class="btn btn-primary btn-lg w-80"
                        style="border: white; background-color: rgb(161, 49, 49);">{{ ucfirst($action) }}</button>
                    </form>
                </div>
            </div>

            {{-- -----sched Table----- --}}
            <hr>
            <div class="container pt-5">
                <p class="h3 fw-bold text-center">scheds Table</p>
                <table id="datatablesForm" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Faculty</th>
                            <th>Subject Code</th>
                            <th>Subject Descripiton</th>
                            <th>Subject Type</th>
                            <th>Unit Type</th>
                            <th>Block</th>
                            <th>Day</th>
                            <th>Time</th>
                            <th>Room</th>
                            <th>Load</th>
                            {{-- <th>Semester</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($schedules as $sched)
                            <tr>
                                <td>{{ $sched->faculty->first_name ?? '' }}</td>
                                <td>{{ $sched->subject->subject_code ?? '' }}</td>
                                <td>{{ $sched->subject->description ?? '' }}</td>
                                <td>{{ $sched->subject->is_graduate_program_text ?? '' }}</td>
                                <td>{{ $sched->is_lab_text ?? '' }}</td>
                                <td>{{ $sched->block->course ?? '' }} {{ $sched->block->section ?? '' }}</td>
                                <td>{{ $sched->day_stripped ?? '' }}</td>
                                <td>
                                    @foreach ($sched->time_slots as $time_slot)
                                        {{ $time_slot->time_start_12hour() . ' - ' . $time_slot->time_end_12hour() }}
                                    @endforeach
                                </td>
                                <td>{{ $sched->classroom->building ?? '' }} - {{ $sched->classroom->room ?? '' }}
                                </td>
                                <td class="text-light-maroon fw-semibold">{{ $sched->subject->load ?? '' }}</td>
                                {{-- <td>{{ $sched->semester->name }}</td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <a href="{{ route('schedule.index') }}" class="fs-5">Go to scheds Table To Edit</a>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#faculty_select').select2()
        $('#subject_select').select2()
        $('#classroom_select').select2()
        $('#block_select').select2()

        @error('day')
            $('div.form-check.required :checkbox').each(function() {
                $(this).removeClass('border-black').addClass('is-invalid');
            });
        @enderror
    </script>

    @if ($action === 'update')
        <script>
            $('#faculty_select').val('{{ old('faculty_id', $schedule->faculty_id ?? '') }}').trigger('change');
            $('#subject_select').val('{{ old('subject_id', $schedule->subject_id ?? '') }}').trigger('change');
            $('#classroom_select').val('{{ old('classroom_id', $schedule->classroom_id ?? '') }}').trigger('change');
            $('#block_select').val('{{ old('block_id', $schedule->block_id ?? '') }}').trigger('change');
        </script>
    @endif

    <script>
        $(document).ready(function() {
            // $('form').submit(function(event) {
            //     if ($('div.form-check.required :checkbox:checked').length === 0) {
            //         event.preventDefault();
            //         $('div.form-check.required :checkbox').each(function() {
            //             $(this).removeClass('border-black').addClass('border-danger is-invalid');
            //         });

            //     } else {
            //         $('div.form-check.required :checkbox').each(function() {
            //             $(this).removeClass('border-danger is-invalid').addClass('border-black');
            //         });
            //     }
            // });

            $('div.form-check.required :checkbox').change(function() {
                if ($(this).is(':checked')) {
                    $('div.form-check.required :checkbox').each(function() {
                        $(this).removeClass('border-danger is-invalid').addClass('border-black');
                    });
                }
            });
        });
    </script>
@endpush
