@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>
            Add Faculty
        </h1>
        <br>
    </div>
    <div class="container">
        
        <div class="row gutters" style="margin-bottom: -17%;">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar">
                                    <img src="JIM.jpg"></img>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-center">
                                        <br>
                                        <button type="button" id="submit" name="submit" class="btn btn-primary"
                                            style="background-color: rgb(161, 49, 49); border:white;">Add Image</button>
                                        <button type="button" id="submit" name="submit" class="btn btn-secondary"
                                            style="border:white;">Remove Image</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">

                        <!-- Form -->
                        <form action="{{ route('faculty.store') }}" method="POST">
                            @csrf
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="details" style="color: rgb(161, 49, 49);">Set Personal Details</h6>
                                </div>
                                <!-- id_usep-->
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="id_usep">Usep ID</label>
                                        <input type="text" class="form-control" name="id_usep"
                                            placeholder="Enter Usep ID" required maxlength=10>
                                    </div>
                                </div>
                                <!-- first name -->
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control" name="first_name"
                                            placeholder="Enter First name" required>
                                    </div>
                                </div>
                                <!-- last name -->
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control" name="last_name"
                                            placeholder="Enter Last name" required>
                                    </div>
                                </div>
                                <!-- remarks -->
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="remarks">Remarks</label>
                                        <input type="text" class="form-control" name="remarks"
                                            placeholder="Enter Remarks" required>
                                    </div>
                                </div>
                                <label for="remarks">Degree</label>
                                <!-- is undergraduate -->
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <input type="checkbox" class="text-input" id="is_graduate" name="is_graduate"
                                        value="1" {{ old('is_graduate') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_graduate">Graduate?</label>
                                </div>
                                <!-- is partimer -->
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <input type="checkbox" class="text-input" id="is_part_timer" name="is_part_timer"
                                        value="1" {{ old('is_part_timer') ? 'checked' : '' }}>
                                    <label class="text-input" for="is_part_timer">Part-timer?</label>
                                </div>
                            </div>
                            <br>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="details" style="color: rgb(161, 49, 49);">Assignment</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="subject">Subject</label>
                                        <input type="text" class="form-control" id="subject"
                                            placeholder="Assign Subject">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="block">Block</label>
                                        <input type="text" class="form-control" id="block"
                                            placeholder="Assign Block">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="room">Classroom</label>
                                        <input type="text" class="form-control" id="room"
                                            placeholder="Assign Room">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        <br>
                                        <button type="submit" id="submit" name="submit"
                                            class="btn btn-secondary">Cancel</button>
                                        <button type="submit" id="submit" name="submit" class="btn btn-primary"
                                            style="background-color: rgb(161, 49, 49); border:white;">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
