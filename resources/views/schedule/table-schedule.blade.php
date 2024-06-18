@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>
            Schedule
        </h1>
        <br>
    </div>
    <div class="container pt-5">
        <table id="datatableSchedule" class="table" style="width:100%" >
            <thead>
                <tr>
                    <th>Faculty Details</th>
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
                    <th>Semester</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schedules as $schedule)
                    <tr>
                        <td>
                            <a href="{{ route('faculty.show', $schedule->faculty) }}"> {{ $schedule->faculty->first_name ?? '' }} {{ $schedule->faculty->last_name ?? '' }} {{ '('.$schedule->faculty->designation.')' ?? '' }} </a>
                        </td>
                        <td>{{ $schedule->faculty->first_name ?? '' }} {{ $schedule->faculty->last_name ?? '' }}</td>
                        <td>{{ $schedule->subject->subject_code ?? '' }}</td>
                        <td>{{ $schedule->subject->description ?? '' }}</td>
                        <td>{{ $schedule->subject->is_graduate_program_text ?? '' }}</td>
                        <td>{{ $schedule->is_lab_text ?? '' }}</td>
                        <td>{{ $schedule->block->course ?? '' }} {{ $schedule->block->section ?? '' }}</td>
                        <td>{{ $schedule->day_stripped ?? '' }}</td>
                        <td>
                            @foreach ($schedule->time_slots as $time_slot)
                                {{ $time_slot->time_start_12hour() . ' - ' . $time_slot->time_end_12hour() }}
                            @endforeach
                        </td>
                        <td>{{ $schedule->classroom->building ?? '' }} - {{ $schedule->classroom->room ?? '' }}</td>
                        <td class="text-light-maroon fw-semibold">{{ $schedule->subject->load ?? '' }}</td>
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
            <tfoot>
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
                    <th>Semester</th>
                </tr>
            </tfoot>
        </table>
        <a href="{{ route('schedule.create') }}"> Add a Schedule</a> <br>
        
        <a href="{{ route('schedule.export') }}" class="text-center fs-5 text-maroon">Download Faculty Loading Summary</a>
    </div>

@endsection

@push('scripts')
@endpush
