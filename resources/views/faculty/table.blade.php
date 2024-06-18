@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>
            @if ($category == 'part-timer')
                Faculty Part-Timers
            @else
                Faculty
            @endif
        </h1>
        <br>
    </div>
    <div class="container pt-5">
        <table id="datatablesDefault" class="table table-striped" style="width:100%" data-export-filename="Faculties CDM Scheduling" data-export-title="Faculties">
            <thead>
                <tr>
                    <th>Faculty ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Program Designation</th>
                    <th>Date Added</th>
                    <th>Edit | Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($faculties as $faculty)
                    <tr>
                        <!--Usep ID (clicking will lead to faculty profile)-->
                        <td>
                            <a href="{{ route('faculty.show', $faculty) }}"> {{ $faculty->id_usep }} </a>
                        </td>
                        <!--First Name-->
                        <td>{{ $faculty->first_name }}
                        </td>
                        <!--last name-->
                        <td>{{ $faculty->last_name }}</td>
                        <!--Designation-->
                        {{-- <td>{{ $faculty->designation_id }}</td> --}}
                        <!--Program Head-->
                        <td>{{ $faculty->program_head->faculty->designation ?? '' }}</td>
                        <!--Date Added-->
                        @php $dateTime = \Carbon\Carbon::parse($faculty->created_at); @endphp
                        <td>{{ $dateTime->toDateString() }}</td>
                        <!--Action-->
                        <td class="align-items-center gap-3"> {{-- gi remove sa nako ang dflex --}}
                            <a href="{{ route('faculty.edit', $faculty) }}">Edit</a>
                            <form method="POST" action="{{ route('faculty.destroy', $faculty) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('faculty.destroy', $faculty) }}"
                                    onclick="event.preventDefault(); confirmDeletion(event, this);"
                                    class="text-danger">Delete</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Faculty ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Program Head</th>
                    <th>Date Added</th>
                </tr>
            </tfoot>
        </table>
        <a href="{{ route('faculty.create') }}"> Add a Faculty</a>
    </div>
    </body>
@endsection
