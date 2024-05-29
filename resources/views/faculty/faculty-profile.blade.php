@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>
            Faculty Details
        </h1>
        <br>
    </div>
    <div class="container">
        @if ($faculty->is_part_timer)
            <a href="{{ route('faculty.index', ['category' => 'part-timer']) }}">Back</a>
        @else
            <a href="{{ route('faculty.index', ['category' => 'faculty']) }}">Back</a>
        @endif
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar">
                                    @if ($faculty->profile_image)
                                        <img src="{{ Storage::url($faculty->profile_image) }}"
                                            alt="{{ $faculty->first_name }}'s profile image">
                                    @else
                                        <img src="{{ asset('dist/assets/images/DEFAULT-PROFILE.jpg') }}"></img>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class=" col-12">
                            <p class="h6 fw-bold">Name:</p>
                            <p class="h5">{{ $faculty->first_name.' '.$faculty->last_name }}</p>
                        </div>
                        <hr class="hr">
                        <div class=" row">
                            <div class=" col-6">    
                                <p class="h6 fw-bold">USeP ID:</>
                                <p class="h5">{{ $faculty->id_usep }}</p>
                            </div>
                            <div class=" col-6">    
                                <p class="h6 fw-bold">Role:</p>
                                <p class="h5">{{ $faculty->is_part_timer ? 'Part-Timer' : 'Faculty'}}</p>
                            </div>
                        </div>
                        <hr class="hr">
                        <div class=" col-12">
                            <p class="h6 fw-bold">Remarks:</p>
                            <form action="{{ route('faculty.update', $faculty) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-9">
                                        <input class="form-control" type="text" placeholder="None" value="{{ $faculty->remarks }}" name="remarks" id="input_remarks">
                                    </div>
                                    <div class="col-3">
                                        <input class="w-50 form-control bg-maroon text-light" type="submit" value="Save">
                                    </div>
                                </div>
                            </form>
                        </div>
                        {{-- <!-- Form -->
                        <form action="{{ route('faculty.store') }}" method="POST">
                            @csrf
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="details" style="color: rgb(161, 49, 49);">Personal Details</h6>
                                </div>

                                <!-- id_usep-->
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="id_usep">
                                            <h6 style="font-weight:600;">Usep ID</h6>
                                        </label>
                                        <br>
                                        <label for="id_usep">{{ $faculty->id_usep }}</label>
                                    </div>
                                </div>
                                <!-- first name -->
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="first_name">
                                            <h6 style="font-weight:600;">Full Name</h6>
                                        </label>
                                        <br>
                                        <label for="id_usep">{{ $faculty->first_name . ' ' . $faculty->last_name }}</label>
                                    </div>
                                </div>

                                <!-- remarks -->
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12" style="margin-top:20px;">
                                    <div class="form-group">
                                        <label for="remarks">
                                            <h6 style="font-weight:600;">Remarks</h6>
                                        </label>
                                        <br>
                                        <label for="id_usep">{{ $faculty->remarks }}</label>
                                    </div>
                                </div>
                                
                                <!-- Part Timer? -->
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12" style="margin-top:20px;">
                                    <div class="form-group">
                                        <label for="remarks">
                                            <h6 style="font-weight:600;">Part-timer?</h6>
                                        </label>
                                        <br>
                                        <label for="id_usep">
                                            {{ $faculty->is_part_timer ? 'Yes' : 'No' }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container pt-5">
        <h4>Schedules</h4>
        <table class="table table-bordered table-striped border-dark" style="width:100%">
            <thead class="table-dark">
                <tr>
                    <th rowspan="2" class="align-middle">Subject Code</th>
                    <th rowspan="2" class="align-middle">Description</th>
                    <th rowspan="2" class="align-middle">YR/Block</th>
                    <th colspan="2" class="text-center">Unit</th>
                    <th colspan="3" class="text-center">Schedule</th>
                    <th rowspan="2" class="align-middle">Faculty Load</th>
                    <th rowspan="2" class="align-middle">Action</th>
                </tr>
                <tr>
                    <th class="text-center">Lec</th>
                    <th class="text-center">Lab</th>
                    <th class="text-center">DAY</th>
                    <th class="text-center">TIME</th>
                    <th class="text-center">ROOM</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schedules as $schedule)
                    <tr>
                        <td>{{ $schedule->subject->subject_code }}</td>
                        <td>{{ $schedule->subject->description }}</td>
                        @if ($schedule->block)
                            <td>{{ $schedule->block->course ?? ('' . ' ' . $schedule->block->section ?? '') }}</td>
                        @else
                            <td></td>
                        @endif

                        @if ($schedule->is_lab)
                            <td></td>
                            <td>{{ $schedule->subject->units_lab ?? ' ' }}</td>
                        @elseif (!$schedule->is_lab)
                            <td>{{ $schedule->subject->units_lecture ?? ' ' }}</td>
                            <td></td>
                        @else
                            <td>{{ $schedule->subject->units_lecture ?? ' ' }}</td>
                            <td>{{ $schedule->subject->units_lab ?? ' ' }}</td>
                        @endif
                        <td class="text-center">{{ $schedule->day ?? ''}}</td>
                        <td class="text-center">
                            @foreach ($schedule->time_slots as $time_slot)
                                {{ $time_slot->time_start_12hour() . ' - ' . $time_slot->time_end_12hour() }}
                            @endforeach
                        </td>
                        <td class="text-center">{{ $schedule->classroom->room ?? ''}}</td>
                        <td class="text-center">{{ $schedule->subject->load  ?? ''}}</td>
                        <td>
                            <form method="POST" action="{{ route('facultySchedule.destroy', $schedule->id) }}">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('facultySchedule.destroy', $schedule->id) }}"
                                    onclick="event.preventDefault(); confirmDeletion(event, this);">Remove</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @if ($faculty->designation)
                    <tr>
                        <td></td>
                        <td>{{ $faculty->designation ?? 'test' }}</td>
                        <td colspan="6"></td>
                        <td class="text-center">{{ $faculty->designation_load ?? '' }}</td>
                        <td></td>
                    </tr>
                @endif
                @if ($totalLoad > 25)
                    <tr class="table-warning border-danger">
                        <td></td>
                        <td class="text-danger">Total Load:</td>
                        <td colspan="6" class="text-danger">Warning: Total Load Greater Than 25</td>
                        <td class="text-center text-danger">{{ $totalLoad }}</td>
                        <td></td>
                    </tr>
                @else
                    <tr>
                        <td></td>
                        <td>Total Load:</td>
                        <td colspan="6"></td>
                        <td class="text-center">{{ $totalLoad }}</td>
                        <td></td>
                    </tr>
                @endif
            </tbody>
        </table>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addScheduleModal">Add Schedule</button>
    </div>
    @include('modals.faculty_schedule_modal', [
        'faculties' => $faculty,
        'subjects' => $subjects,
        'classroom' => $classrooms,
        'blocks' => $blocks,
        'schedules' => $allSchedules,
    ])
@endsection
