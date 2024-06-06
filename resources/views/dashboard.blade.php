@extends('layouts.app')

@section('content')
<div class="text-center">
        <h1>
            Dashboard
        </h1>
        <br>
</div>
    <div class="content-wrapper">
        <div class="container-fluid">
            <h3>Welcome Program Head, {{ $user->name }}</h3>
            <div class="row">

                <!-- Icon Cards-->
                <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
                    
                        <div class="inforide">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-4 col-4 rideone">
                                    <i class="lni lni-calendar"></i>
                                </div>
                                <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                                    <h4>Schedule</h4>
                                    <h2>{{ $tot_schedules }}</h2>
                                </div>
                            </div>
                        </div>
                
                    <!-- Button -->
                <a style="color:black;"href="{{ route('schedule.index') }}">
                    <button class="btn btn-primary btn-lg w-100"
                    style="border: white; background-color: rgb(68, 161, 49); margin-bottom:10px; margin-top:10px;">
                    View Schedule</button>
                </a>
                <a style="color:black;"href="{{ route('schedule.create') }}">
                    <button class="btn btn-primary btn-lg w-100"
                    style="border: white; background-color: rgb(0, 102, 0);">Assign Schedule</button>
                </a>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
                    <div class="inforide">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-4 col-4 ridethree">
                                <i class="lni lni-school-bench"></i>
                            </div>
                            <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                                <h4>Vacant Room</h4>
                                <h2>{{ $total_vr }}</h2>
                            </div>
                        </div>
                    </div>
                    <a style="color:black;"href="{{ route('classroom.index') }}">
                        <button class="btn btn-primary btn-lg w-100"
                        style="border: white; background-color: rgb(49, 144, 161); margin-bottom:10px; margin-top:10px;">
                        View Room</button>
                    </a>
                    <a style="color:black;"href="{{ route('classroom.create') }}">
                        <button class="btn btn-primary btn-lg w-100"
                        style="border: white; background-color: rgb(0, 15, 102);">Add Room</button>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
                    <div class="inforide-1">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-4 col-4 ridetwo">
                                <i class="lni lni-users"></i>
                            </div>
                            <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                                <h4>Faculty: {{ $all_faculty }}</h4>
                                <h4>Part Timer: {{ $all_partTimer }}</h4>
                                <h4 style="font-weight: bold;">Total: {{ $total_faculties }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="btn-group w-100">
                                <a style="color:black;" href="{{ route('faculty.index', ['category' => 'faculty']) }}">
                                    <button class="btn btn-primary btn-lg w-100" style="background-color: rgb(69, 49, 161); margin-bottom:10px; margin-top:10px;">
                                        View Faculty
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="btn-group w-100">
                                <a style="color:black;" href="{{ route('faculty.index', ['category' => 'part-timer']) }}">
                                    <button class="btn btn-primary btn-lg w-100" 
                                    style="background-color: rgb(129, 49, 161); margin-top:10px; margin-bottom:10px; font-size:1.2rem;">
                                        View Part Timer
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <a style="color:black;"href="{{ route('faculty.create') }}">
                        <button class="btn btn-primary btn-lg w-100"
                        style="border: white; background-color: rgb(36, 49, 124);">Add Faculty</button>
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
