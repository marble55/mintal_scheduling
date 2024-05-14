@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>
            Schedule
        </h1>
        <br>
    </div>
    <div class="container pt-5" >
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Sched ID</th>
                    <th>Faculty ID</th>
                    <th>Day</th>
                    <th>Time</th>
                    <th>Subject ID</th>
                    <th>Lab</th>
                    <th>Classroom ID</th>
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
                        <td>{{ $schedule->faculty->first_name }}</td>
                        <td>{{ $schedule->day }}</td>
                        <td>
                            @foreach ($schedule->time_slots as $time_slot)
                                {{ $time_slot->time_start . '-' . $time_slot->time_end }}
                            @endforeach
                        </td>
                        <td>{{ $schedule->subject_id }}</td>
                        <td>{{ $schedule->is_lab }}</td>
                        <td>{{ $schedule->classroom_id }}</td>
                        <td>{{ $schedule->block_id }}</td>
                        <td>{{ $schedule->sy_id }}</td>
                        <td>{{ $schedule->semesters_id }}</td>

                        <td><a href="?page=graduate">Edit | </a>
                            <a href="?page=graduate">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{route('schedule.create')}}"> Add a Schedule</a>
    </div>
@endsection
