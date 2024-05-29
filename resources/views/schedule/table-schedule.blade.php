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
                    <th>Semester</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($schedules as $schedule)
                    <tr>
                        <td>{{ $schedule->id }}</td>
                        <td>{{ $schedule->faculty->first_name ?? '' }}</td>
                        <td>{{ $schedule->day ?? '' }}</td>
                        <td>
                            @foreach ($schedule->time_slots as $time_slot)
                                {{ $time_slot->time_start_12hour() . ' - ' . $time_slot->time_end_12hour() }}
                            @endforeach
                        </td>
                        <td>{{ $schedule->subject->subject_code ?? '' }}</td>
                        <td>{{ $schedule->is_lab ?? '' }}</td>
                        <td>{{ $schedule->classroom->room ?? '' }}</td>
                        <td>{{ $schedule->block->section ?? '' }}</td>
                        <td>{{ $schedule->semester->name }}</td>

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
        <a href="{{route('schedule.create')}}"> Add a Schedule</a>
    </div>
@endsection
