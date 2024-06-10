@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>
            Subject
        </h1>
        <br>
        <!-- <img src="table.png"></img> -->
    </div>
    <div class="container pt-5" style="margin-bottom: 5%;">
        <table id="datatablesDefault" class="table table-striped" style="width:100%" data-export-filename="Subjects CDM Scheduling" data-export-title="Subjects">
            <thead>
                <tr>
                    <th>Subject ID</th>
                    <th>Program</th>
                    <th>Subject Code</th>
                    <th>Description</th>
                    <th>Lec</th>
                    <th>Lab</th>
                    <th>Load</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $subject)
                    <tr>
                        <td>{{ $subject->id }}</td>
                        <td>
                            <p class="fw-bold">{{ $subject->is_graduate_program ? 'Graduate' : 'Undergraduate' }}</p>
                        </td>
                        <td>{{ $subject->subject_code }}</td>
                        <td>{{ $subject->description }}</td>
                        <td>{{ $subject->units_lecture }}</td>
                        <td>{{ $subject->units_lab }}</td>
                        <td>{{ $subject->load }}</td>

                        <!--Action-->
                        <td >
                            <a href="{{ route('subject.edit', $subject->id) }}">Edit</a>
                            <form method="POST" action="{{ route('subject.destroy', $subject->id) }}">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('subject.destroy', $subject->id) }}"
                                    onclick="event.preventDefault(); confirmDeletion(event, this);" class="text-danger">Delete</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tfoot>
                    <tr>
                        <th>Subject ID</th>
                        <th>Program</th>
                        <th>Subject Code</th>
                        <th>Description</th>
                        <th>Lec</th>
                        <th>Lab</th>
                        <th>Load</th>
                    </tr>
                </tfoot>
            </tbody>
        </table>
        <a href="{{route('subject.create')}}"> Add a Subject</a>
    </div>
@endsection
