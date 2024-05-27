@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>
            {{ ucfirst($action) }} Faculty
        </h1>
        <br>
    </div>
    <div class="container">
        {{-- @if ($faculty->is_part_timer)
        <a href="{{ route('faculty.index', ['category' => 'part-timer']) }}">Back</a>
         @else
        <a href="{{ route('faculty.index', ['category' => 'faculty']) }}">Back</a>
        @endif --}}
    <form action="{{ isset($faculty) ? route('faculty.update', $faculty) : route('faculty.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($faculty))
                                            @method('PUT')
                                        @endif
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar">
                                @if ($action == 'update' && $faculty->profile_image)
                                    <img src="{{ Storage::url($faculty->profile_image) }}" alt="{{ $faculty->first_name }}'s profile image">
                                @else
                                    <img src="{{ asset('dist/assets/images/DEFAULT-PROFILE.jpg') }}"></img>
                                @endif
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-center">
                                        <br>
                                            <div>
                                                <label for="image">Choose Image:</label>
                                                <input type="file" name="image" id="image" accept="image/*"
                                                style="width: 200px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                                            </div>
                                            <br>
                                           
                                        <button type="button" id="removeImageButton" name="submit" class="btn btn-secondary"
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
                                            placeholder="Enter Designation" maxlength="255">
                                    </div>
                                </div>
                                <!-- designation_load -->
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="designation_load">Designation Load (Optional)</label> <!-- optional term is optional -->
                                        <input type="number" class="form-control" name="designation_load" value="{{ $faculty->designation_load ?? '' }}"
                                            placeholder="Enter Designation Load" max="99.99" min="0">
                                    </div>
                                </div>
                            </div>
                            <br>
                            
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        <br>
                    
                                        <button type="submit" id="submit" name="submit" class="btn btn-primary"
                                            style="background-color: rgb(161, 49, 49); border:white;">{{ isset($faculty) ? 'Update' : 'Create' }}</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var fileInput = document.getElementById('image');
        var removeButton = document.getElementById('removeImageButton');
        var imgElement = document.querySelector('.user-avatar img');

        removeButton.addEventListener('click', function() {
            fileInput.value = ''; // Clear the file input

            // Reset the displayed image to the default image
            imgElement.src = '{{ asset('dist/assets/images/DEFAULT-PROFILE.jpg') }}';
        });

        fileInput.addEventListener('change', function(event) {
            var file = event.target.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    imgElement.src = e.target.result; // Set the img src to the selected file
                };
                reader.readAsDataURL(file); // Read the selected file as a data URL
            }
        });
    });

    </script>
@endsection
