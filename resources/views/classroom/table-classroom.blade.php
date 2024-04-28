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
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Classroom ID</th>
                    <th>Room</th>
                    <th>Building</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($classrooms as $classroom)
                    <tr>
                        <!--id-->
                        <td> {{$classroom->id}} </td>
                        <!--Room-->
                        <td> {{$classroom->room}} </td>
                        <!--building-->
                        <td> {{$classroom->building}} </td>
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
            </tbody>
        </table>
        <a href="{{route('classroom.create')}}"> Add a Room</a>
    </div>
@endsection
