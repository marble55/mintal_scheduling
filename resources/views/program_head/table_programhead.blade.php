@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Program Head</h1>
        <br>
    </div>
    <div class="container pt-5">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Faculty ID</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Full Name</th>
                    <th>Date Registered</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($program_heads as $ph)
                    <tr>
                        <!--Faculty ID-->
                        <td><a href="{{ route('program-head.show', $ph) }}">{{ $ph->faculty->id_usep ?? '' }}</a></td>
                        <!--User Name-->
                        <td>{{ $ph->name }}</td>
                        <!--Email-->
                        <td>{{ $ph->email }}</td>
                        <!--Full Name-->
                        <td>{{ $ph->faculty->last_name ?? ''}}, {{ $ph->faculty->first_name ?? ''}}</td>
                        <!--Date Registered-->
                        
                        @php $dateTime = \Carbon\Carbon::parse($ph->created_at); @endphp
                        <td>{{ $dateTime->toDateString() }}</td>
                        
                        <!--Action-->
                        <td class="d-flex align-items-center gap-3">
                            <a href="{{ route('program-head.edit', $ph->id) }}">Edit</a>
                            <form method="POST" action="{{ route('program-head.destroy', $ph->id) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('program-head.destroy', $ph->id) }}"
                                    onclick="event.preventDefault(); confirmDeletion(event, this);"
                                    class="text-danger">Delete</a>
                            </form>
                            <a href="{{ route('faculty.edit', $ph->faculty->id) }}" class="text-info">Check</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <a href="{{ route('program-head.create') }}"> Add a Program Head</a>
    </div>
    </body>
@endsection
