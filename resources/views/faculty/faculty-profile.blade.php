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
                                        <h6 style="font-weight:600;">First Name</h6>
                                        </label>
                                        <br>
                                        <label for="id_usep">{{ $faculty->first_name }}</label>
                                    </div>
                                </div>
                                <!-- last name -->
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="last_name">
                                        <h6 style="font-weight:600;">Last Name</h6>
                                        </label>
                                        <br>
                                        <label for="id_usep">{{ $faculty->last_name }}</label>
                                    </div>
                                </div>
                                <!-- remarks -->
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="remarks">
                                        <h6 style="font-weight:600;">Remarks</h6>
                                        </label>
                                        <br>
                                        <label for="id_usep">{{ $faculty->remarks }}</label>
                                    </div>
                                </div>
                                <label for="remarks">
                                <h6 style="font-weight:600;">Part-timer?</h6>
                                </label>
                                <label for="id_usep">
                                    {{ $faculty->is_part_timer ? 'Yes' : 'No' }}
                                </label>
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
                    <th>Sched ID</th>
                    <th>Day</th>
                    <th>Time Slot</th>
                    <th>Subject ID</th>
                    <th>Is Lab?</th>
                    <th>Class ID</th>
                    <th>Block ID</th>
                    <th>School Year</th>
                    <th>Semester</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($schedules as $schedule)
                    <tr>
                        <td>{{ $schedule->id }}</td>
                        <td>{{ $schedule->day }}</td>
                        <td>
                            @foreach ($schedule->time_slots as $time_slot)
                                {{ $time_slot->time_start . '-' . $time_slot->time_end }}
                            @endforeach
                        </td>
                        <td>{{ $schedule->subject_id }}</td>
                        <td>{{ $schedule->is_lab ? 'Yes' : 'No'}}</td> {{--  should be casted into true or false --}}
                        <td>{{ $schedule->classroom_id }}</td>
                        <td>{{ $schedule->block_id }}</td>
                        <td>{{ $schedule->sy_id }}</td>
                        <td>{{ $schedule->semesters_id }}</td>

                        <td>
                            <a href="{{ route('schedule.edit', $schedule->id) }}">Edit</a> |
                            <form method="POST" action="{{ route('schedule.destroy', $schedule->id) }}">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('schedule.destroy', $schedule->id) }}"
                                    onclick="event.preventDefault(); confirmDeletion(event, this);">Delete</a>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{-- <a href="{{route('facultySchedule.create')}}">Assign Schedule</a> --}}
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addScheduleModal">Add Schedule</button>
    </div>
    {{-- I uncomment ni siya para sa modals, pero mu error siya --}}
    @include('modals.faculty_schedule_modal', [
        'faculties' => $faculty,
        'subjects' => $subjects,
        'classroom' => $classrooms,
        'blocks' => $blocks,
        'schedules' => $allSchedules,
        ]) 
@endsection
