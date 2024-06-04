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
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Faculty ID</th>
                    <th>Full Name</th>
                    <th>Date Registered</th>
                    <th>Edit | Delete</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($program_heads as $ph)
                    <tr>
                        <!--User Name-->
                        <td>{{ $ph->name }}</td>
                        <!--Email-->
                        <td>{{ $ph->email }}</td>
                        <!--Faculty ID-->
                        <td>{{ $ph->faculty->id_usep ?? '' }}</td>
                        <!--User Name-->
                        <td>{{ $ph->faculty->last_name ?? ''}}, {{ $ph->faculty->first_name ?? ''}}</td>
                        <!--Date Registered-->
                        
                        @php $dateTime = \Carbon\Carbon::parse($ph->created_at); @endphp
                        <td>{{ $dateTime->toDateString() }}</td>
                        
                        <!--Action-->
                        <td class="d-flex align-items-center gap-3">
                            <a href="#">Edit</a>
                            <form method="POST" action="#" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <a href="#"
                                    onclick="event.preventDefault(); confirmDeletion(event, this);"
                                    class="text-danger">Delete</a>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <a href="#"> Add a Program Head</a>
    </div>
    </body>
@endsection
