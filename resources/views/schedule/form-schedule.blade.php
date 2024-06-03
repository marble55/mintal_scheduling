@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
    <div class="row align-items-center justify-content-center">
        <div class="col col-sm-6 col-lg-7 col-xl-10">
            <!-- Title -->
            <div class="text-center mb-5">
                <h3 class="fw-bold">{{ $action == 'update' ? 'Update' : 'Create' }} Schedule</h3>
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

                            <label for="faculty_id">Faculty:</label><br>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bx-id-card'></i>
                                </span>
                                <select name="faculty_id" id="faculty_select" autofocus>
                                    <option value="">No Assigned</option>
                                    @foreach ($faculties as $faculty)
                                        <option value="{{ $faculty->id }}">
                                            {{ $faculty->first_name . ' ' . $faculty->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Subject ID Input -->
                            <label for="subject_id">Subject:</label><br>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bx-id-card'></i>
                                </span>
                                <select name="subject_id" id="subject_select" required>
                                    <option value="">No Assigned</option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}">
                                            {{ $subject->subject_code . ': ' . $subject->description }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Lab Input -->
                            <label for="is_lab">Subject Unit:</label><br>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bxs-school'></i>
                                </span>
                                <input type="checkbox" class="text-input" id="is-lab_checkbox" name="is_lab" value="0" style="margin-left:10px;" @checked($action === 'update' && $schedule->is_lab === 'LAB')>
                                <label class="form-check-label" for="is_lab">&nbsp;Lab </label>
                            </div>

                            <!-- Block ID Input -->
                            <label for="is_lab">Block:</label><br>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bx-id-card'></i>
                                </span>
                                <select name="block_id" id="block_select">
                                    <option value="">No Assigned</option>
                                    @foreach ($blocks as $block)
                                        <option value="{{ $block->id }}">
                                            {{ $block->course . ' ' . $block->section }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Classroom ID Input -->
                            <label for="is_lab">Classroom:</label><br>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bx-id-card'></i>
                                </span>
                                <select name="classroom_id" id="classroom_select">
                                    <option value="">No Assigned</option>
                                    @foreach ($classrooms as $classroom)
                                        <option value="{{ $classroom->id }}">
                                            {{ $classroom->room . ' in ' . $classroom->building }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                    </div>


                    <div class="col-md-6">
                        <!-- Right Column -->
                        <!-- Add the rest of your input fields here -->
                        <!-- Day Input -->
                        <label for="form-check_day">Days:</label><br>
                        <div id="form-check_day" class="form-check form-check-inline mb-3 required">
                            <input type="checkbox" id="day-monday" name="day[]" class="form-check-input border-black" value="M," @checked($action === 'update' && strpos($schedule->day, 'M,') !== false)>
                            <label for="day-monday" class="form-check-label me-2">Monday</label><br>

                            <input type="checkbox" id="day-tuesday" class="form-check-input border-black" name="day[]" value="T," @checked($action === 'update' && strpos($schedule->day, 'T,') !== false && strpos($schedule->day, 'TTH') === false)>
                            <label for="day-tuesday" class="form-check-label me-2">Tuesday</label><br>

                            <input type="checkbox" id="day-wednesday" class="form-check-input border-black" name="day[]" value="W," @checked($action === 'update' && strpos($schedule->day, 'W,') !== false)>
                            <label for="day-wednesday" class="form-check-label me-2">Wednesday</label><br>

                            <input type="checkbox" id="day-thursday" class="form-check-input border-black" name="day[]" value="TH," @checked($action === 'update' && strpos($schedule->day, 'TH,') !== false)>
                            <label for="day-thursday" class="form-check-label me-2">Thursday</label><br>

                            <input type="checkbox" id="day-friday" class="form-check-input border-black" name="day[]" value="F," @checked($action === 'update' && strpos($schedule->day, 'F,') !== false)>
                            <label for="day-friday" class="form-check-label me-2">Friday</label><br>

                            <input type="checkbox" id="day-saturday" class="form-check-input border-black" name="day[]" value="S," @checked($action === 'update' && strpos($schedule->day, 'S,') !== false)>
                            <label for="day-saturday" class="form-check-label me-2">Saturday</label><br>

                            <input type="checkbox" id="day-saturday" class="form-check-input border-black" name="day[]" value="SU," @checked($action === 'update' && strpos($schedule->day, 'SUN,') !== false)>
                            <label for="day-saturday" class="form-check-label me-2">Sunday</label><br>
                        
                        
                            <div class="invalid-feedback">Please check at least one</div>
                        </div>

                        <div>
                            <!-- Time Start Input -->
                            <label for="time-start_input">Time Start:</label><br>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bx-time'></i>
                                </span>
                                <input type="time" id="time-start_input" class="form-control form-control-lg fs-6" name="time_start" placeholder="Time Start" value="{{ $timeSlot->time_start ?? '' }}"required>
                            </div>

                            <!-- Time End Input -->
                            <label for="time-end_input">Time End:</label><br>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bx-time'></i>
                                </span>
                                <input type="time" class="form-control form-control-lg fs-6" name="time_end"
                                    placeholder="Time End" id="time-end_input" value="{{ $timeSlot->time_end ?? '' }}"
                                    required>
                            </div>

                        </div>
                    </div>
                    <!-- Add Button -->
                    <button class="btn btn-primary btn-lg w-80"
                        style="border: white; background-color: rgb(161, 49, 49);">{{ ucfirst($action) }}</button>
                    </form>
                </div>
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
    </script>
@endpush

@if ($action === 'update')
    @push('scripts')
        <script>
            $('#faculty_select').val('{{ $schedule->faculty_id }}').trigger('change');
            $('#subject_select').val('{{ $schedule->subject_id }}').trigger('change');
            $('#classroom_select').val('{{ $schedule->classroom_id }}').trigger('change');
            $('#block_select').val('{{ $schedule->block_id }}').trigger('change');
        </script>

        <script>
             $(document).ready(function(){
                $('form').submit(function(event){

                    if($('div.form-check.required :checkbox:checked').length===0){
                        event.preventDefault();
                        $('div.form-check.required :checkbox').each(function(){
                            $(this).removeClass('border-black').addClass('border-danger is-invalid');
                        });

                    }else{
                        $('div.form-check.required :checkbox').each(function(){
                            $(this).removeClass('border-danger is-invalid').addClass('border-black');
                        });
                    }
                });

                $('div.form-check.required :checkbox').change(function(){
                    if($(this).is(':checked')){
                        $('div.form-check.required :checkbox').each(function(){
                            $(this).removeClass('border-danger is-invalid').addClass('border-black');
                        });
                    }
                });
            });
        </script>
    @endpush
@endif
