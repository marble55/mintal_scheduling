@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>
            Program Head Details
        </h1>
        <br>
    </div>
    <div class="container">
        
            <a href="{{ route('program-head.index') }}">Back</a>
       
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar">
                                    @if ($ph->faculty->profile_image)
                                        <img src="{{ Storage::url($ph->faculty->profile_image) }}"
                                            alt="{{ $ph->name }}'s profile image">
                                    @else
                                        <img src="{{ asset('dist/assets/images/DEFAULT-PROFILE.jpg') }}"></img>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
{{-- Program Head Details --}}
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class=" col-12">
                            <p class="h6 fw-bold">Full Name:</p>
                            <p class="h5">{{ $ph->faculty->last_name ?? ''}}, {{ $ph->faculty->first_name ?? ''}}</p>
                        </div>
                        <hr class="hr">
                        <div class=" row">
                            <div class=" col-6">    
                                <p class="h6 fw-bold">USeP ID:</>
                                <p class="h5">{{ $ph->faculty->id_usep ?? '' }}</p>
                            </div>
                            <div class=" col-6">    
                                <p class="h6 fw-bold">UserName:</p>
                                <p class="h5">{{ $ph->name }}</p>
                            </div>
                        </div>
                        <hr class="hr">
                        <div class=" col-12">
                            <p class="h6 fw-bold">Email:</p>
                            <p class="h5">{{ $ph->email }}</p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container pt-5">
        <h4>Faculty Under</h4>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Faculty ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Program Head</th>
                    <th>Date Added</th>
                    <th>Edit | Delete</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($program_head->faculties as $faculty)
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
                        <td>{{ $faculty->program_head->name ?? '' }}</td>
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
        </table>
        <a href="{{ route('faculty.create') }}"> Add a Faculty</a>
    </div>
    
@endsection
