@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>
            Classroom
        </h1>
        <br>
        <!-- <img src="table.png"></img> -->
    </div>
    <div class="container pt-5">
        <table id="datatablesDefault" class="table table-striped" data-export-filename="Classrooms CDM Scheduling" data-export-title="Classrooms">
            <thead>
                <tr>
                    <th>Classroom ID</th>
                    <th>Room</th>
                    <th>Building</th>
                    <th>Vaccant</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($classroomsWithoutSchedules as $classroom)
                    <tr>
                        <!--id-->
                        <td> {{ $classroom->id }} </td>
                        <!--Room-->
                        <td> {{ $classroom->room }} </td>
                        <!--building-->
                        <td> {{ $classroom->building }} </td>
                        <!--If vaccant-->
                        <td> Yes </td>
                        <!--Action-->
                        <td><a href="{{ route('classroom.edit', $classroom->id) }}">Edit</a> |
                            <form method="POST" action="{{ route('classroom.destroy', $classroom->id) }}">
                                @csrf
                                @method('delete')
                                <a href="{{ route('classroom.destroy', $classroom->id) }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();">Delete</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @foreach ($classroomsWithSchedules as $classroom)
                    <tr>
                        <!--id-->
                        <td> {{ $classroom->id }} </td>
                        <!--Room-->
                        <td> {{ $classroom->room }} </td>
                        <!--building-->
                        <td> {{ $classroom->building }} </td>
                        <!--If vaccant-->
                        <td> No </td>
                        <!--Action-->
                        <td class="d-flex align-items-center gap-3">
                            <a href="{{ route('classroom.edit', $classroom->id) }}">Edit</a>
                            <form method="POST" action="{{ route('classroom.destroy', $classroom->id) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('classroom.destroy', $classroom->id) }}"
                                    onclick="event.preventDefault(); confirmDeletion(event, this);" class="text-danger">Delete</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tfoot>
                    <tr>
                        <th>Classroom ID</th>
                        <th>Room</th>
                        <th>Building</th>
                        <th>Vaccant</th>
                    </tr>
                </tfoot>
            </tbody>
        </table>
        <a href="{{ route('classroom.create') }}"> Add a Room</a>
    </div>
@endsection
