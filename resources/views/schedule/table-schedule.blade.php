@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>
            Schedule
        </h1>
        <br>
        <!-- <img src="table.png"></img> -->
    </div>
    <div class="container pt-5" style="margin-bottom:-5%;">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Sched ID</th>
                    <th>Faculty ID</th>
                    <th>Day</th>
                    <th>Time Slot</th>
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
                    <td>{{$schedule->id}}</td>
                    <td>{{$schedule->faculty->first_name}}</td>
                    <td>{{$schedule->day}}</td>
                    <td>Empty</td>
                    <td>{{$schedule->subject_id}}</td>
                    <td>{{$schedule->is_lab}}</td>
                    <td>{{$schedule->classroom_id}}</td>
                    <td>{{$schedule->block_id}}</td>
                    <td>{{$schedule->sy_id}}</td>
                    <td>{{$schedule->semesters_id}}</td>
                
                    <td><a href="?page=graduate">Edit | </a>
                        <a href="?page=graduate">Delete</a>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td>202401</td>
                    <td>Tuesday</td>
                    <td>8:00 AM</td>
                    <td>10:00 AM</td>
                    <td>201</td>
                    <td>216</td>
                    <td>0202</td>
                    <td>202201455</td>
                    <td>2024</td>
                    <td>2nd</td>

                    <td><a href="?page=graduate">Edit | </a>
                        <a href="?page=graduate">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
        <a href="?page=AssignSchedule"> Add a Schedule</a>
    </div>
@endsection
