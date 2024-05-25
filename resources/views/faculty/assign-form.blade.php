@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>
            {{ ucfirst($action) }} Faculty
        </h1>
        <br>
    </div>
    <div class="container">
        
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar">
                                    <img src="{{ asset('dist/assets/images/DEFAULT-PROFILE.jpg') }}"></img>
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
                                        <input type="text" class="form-control" name="id_usep" value="{{ $faculty->user_id ?? '' }}"
                                            placeholder="Enter Usep ID" required maxlength="10">
                                    </div>
                                </div>
                                <!-- first name -->
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control" name="first_name" value="{{ $faculty->first_name ?? '' }}"
                                            placeholder="Enter First name" required>
                                    </div>
                                </div>
                                <!-- last name -->
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control" name="last_name" value="{{ $faculty->last_name ?? '' }}"
                                            placeholder="Enter Last name" required>
                                    </div>
                                </div>
                                <!-- remarks -->
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="remarks">Remarks</label>
                                        <input type="text" class="form-control" name="remarks" value="{{ $faculty->remarks ?? '' }}"
                                            placeholder="Enter Remarks">
                                    </div>
                                </div>
                                <label for="remarks">Degree</label>
                                <!-- is partimer -->
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <input type="checkbox" class="text-input" id="is_part_timer" name="is_part_timer" 
                                    @if (isset($faculty) && $faculty->is_part_timer == true)
                                        checked
                                    @endif
                                        value="1" {{ old('is_part_timer') ? 'checked' : '' }}>
                                    <label class="text-input" for="is_part_timer">Part-timer?</label>
                                </div>
                                <!-- designation-->
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="designation">Designation (Optional)</label>
                                        <input type="text" class="form-control" name="designation" value="{{ $faculty->designation ?? '' }}"
                                            placeholder="Enter Designation" required maxlength="255">
                                    </div>
                                </div>
                                <!-- designation_load -->
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="designation_load">Designation Load (Optional)</label> <!-- optional term is optional -->
                                        <input type="number" class="form-control" name="designation_load" value="{{ $faculty->designation_load ?? '' }}"
                                            placeholder="Enter Usep ID" max="99.99" min="0">
                                    </div>
                                </div>
                            </div>
                            <br>
                            
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
