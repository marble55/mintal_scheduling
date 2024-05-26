@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>
            Faculty Details
        </h1>
        <br>
    </div>
    <div class="container">
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar">
                                    <img src="{{ asset('dist/assets/images/DEFAULT-PROFILE.jpg') }}"></img>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">

                        <!-- Form -->
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container pt-5">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Subject Code</th>
                    <th>Description</th>
                    <th>YR/Block</th>
                    <th>Unit:Lec</th>
                    <th>Unit:Lab</th>
                    <th>Sched:Day</th>
                    <th>Sched:Time</th>
                    <th>Sched:Room</th>
                    <th>Faculty Load</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schedules as $schedule)
                    <tr>
                        <td>{{ $schedule->subject->subject_code }}</td>
                        <td>{{ $schedule->subject->description }}</td>
                        <td>{{ $schedule->block->course . ' ' . $schedule->block->section }}</td>
                        <td>{{ $schedule->subject->units_lecture ?? ' ' }}</td>
                        <td>{{ $schedule->subject->units_lab ?? ' ' }}</td>
                        <td>{{ $schedule->day }}</td>
                        <td>
                            @foreach ($schedule->time_slots as $time_slot)
                                {{ $time_slot->time_start_12hour() . ' - ' . $time_slot->time_end_12hour() }}
                            @endforeach
                        </td>
                        <td>{{ $schedule->classroom->room }}</td>
                        <td>{{ $schedule->subject->load }}</td>
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
                        <td>TD</td>
                        <td>{{ $schedule->faculty->designation }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{ $schedule->faculty->designation_load }}</td>
                        <td></td>
                    </tr>
                @endif
            </tbody>
        </table>

        <div>
            @if ($totalLoad > 25)
                <div class="border border-danger border-1 rounded p-2 w-25 h-25 mb-2 mt-2">
                    <h5 style="font-weight: 500; margin-top: 1.5rem;">Total Load:
                        <span style="color: red">{{ $totalLoad }}</span>
                    </h5>
                    <h6 style="margin-bottom: 1rem; color: red;">Total Load exceeds 25</h6>
                </div>
            @else
                <div class="border border-danger border-1 rounded p-2 w-25 h-25 mb-2 mt-2">
                    <h5 style="font-weight: 500; margin: 1.5rem 0;">Total Load:
                        <span>{{ $totalLoad }}</span>
                    </h5>
                </div>
            @endif

        </div>

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
