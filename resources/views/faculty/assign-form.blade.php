@extends('layouts.app')


@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
    <div class="text-center">
        <h1>
            {{ ucfirst($action) }} Faculty
        </h1>
        <br>
    </div>
    <div class="container">
        @if ($action ==='update' && $faculty->is_part_timer)
            <a href="{{ route('faculty.index', ['category' => 'part-timer']) }}">Back</a>
        @else
            <a href="{{ route('faculty.index', ['category' => 'faculty']) }}">Back</a>
        @endif
        <form id="faculty_form" action="{{ isset($faculty) ? route('faculty.update', $faculty) : route('faculty.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($faculty))
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
                                            <img src="{{ Storage::url($faculty->profile_image) }}"
                                                alt="{{ $faculty->first_name }}'s profile image">
                                        @else
                                            <img src="{{ asset('dist/assets/images/DEFAULT-PROFILE.jpg') }}"></img>
                                        @endif
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="text-center">
                                            <br>
                                            <div>
                                                <label for="image" class="form-check-label mb-1 fw-semibold">Choose Image:</label>
                                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" accept="image/*"
                                                    style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                                                @error('image')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                                @enderror
                                            </div>
                                            <br>
                                            <button type="button" id="removeImageButton" name="remove_img"
                                                class="btn btn-secondary" style="border:white;">Remove Image</button>
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

                            <div class="row gutters row-gap-3">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="details" style="color: rgb(161, 49, 49);">Set Personal Details</h6>
                                </div>

                                <!-- id_usep-->
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <label for="usepIdInput" class="form-label fs-5">Usep ID</label>
                                    <div class="input-group">    
                                        <input id="usepIdInput" type="text" class="form-control @error('id_usep') is-invalid @enderror" name="id_usep"
                                            value="{{ old('id_usep', $faculty->id_usep ?? '') }}" placeholder="Enter Usep ID" required maxlength="10">
                                        @error('id_usep')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <!-- first name -->
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <label for="first_name" class="form-label fs-5">First Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                            value="{{ old('first_name', $faculty->first_name ?? '') }}" placeholder="Enter First name"
                                            required>
                                        @error('first_name')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- last name -->
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <label for="last_name" class="form-label fs-5">Last Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                            value="{{ old('last_name', $faculty->last_name ?? '') }}" placeholder="Enter Last name" required>
                                        @error('last_name')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- is partimer -->
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-4 form-check">
                                    <input type="checkbox" class="form-check-input ms-1 border-dark-maroon @error('is_part_timer') is-invalid @enderror" id="is_part_timer" name="is_part_timer"
                                        @if (isset($faculty) && $faculty->is_part_timer == true) checked @endif value="1"
                                        {{ old('is_part_timer', $faculty->is_part_timer ?? '' ) ? 'checked' : '' }}>
                                    <label class="form-check-label fs-6" for="is_part_timer">Part-timer</label>
                                    @error('is_part_timer')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <!-- designation-->
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <label for="designationInput" class="form-label fs-5">Designation (Optional)</label>
                                    <div class="input-group">
                                        <input type="text" id="designationInput" class="form-control @error('designation') is-invalid @enderror" name="designation"
                                            value="{{ old('designation', $faculty->designation ?? '') }}" placeholder="Enter Designation"
                                            maxlength="255">
                                            @error('designation')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                    </div>
                                </div>
                                <!-- designation_load -->
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <label for="designationLoadInput" class="form-label fs-5">Designation Load (Optional)</label>
                                    <div class="input-group">
                                        <input type="number" id="designationLoadInput" class="form-control @error('designation_load') is-invalid @enderror" name="designation_load"
                                            value="{{ old('designation_load', $faculty->designation_load ?? '') }}"
                                            placeholder="Enter Designation Load" max="99.99" min="0">
                                            @error('designation_load')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        <br>
                                        <button type="submit" id="submit" name="submit"
                                            class="btn btn-primary bg-light-maroon border border-white">{{ isset($faculty) ? 'Update' : 'Create' }}</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>

    @isset($faculty)
        @can('isAdmin')
            <div class="container">
                :wq<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 w-100 mt-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="card-title text-center fw-semibold">Program Head Details</h4>

                            <div class="col-12 mb-3">
                                <p class="fs-4">Assigned Program Head</p>
                                <form action="{{ route('faculty.setProgramhead', $faculty->id) }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <div class="row">
                                        <div class="col-6">
                                            <select name="programHead" id="programHead_select" class="form-control form-control-lg fs-6">
                                                @foreach ($programHeads as $ph)
                                                    <option value="{{ $ph->id }}">{{ $ph->name}} @if ($ph->faculty_id == $faculty->id) (Self) @endif</option>
                                                    @if ($ph->faculty_id == $faculty->id) 
                                                        <script> document.getElementById('programHead_select').setAttribute('disabled', 'true') </script>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <button type="submit" id="submit" name="submit" class="btn btn-primary bg-light-maroon border border-white">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
    @endisset

    @push('scripts')
        <script>
            $('#programHead_select').select2()
            $('#programHead_select').val('{{ $faculty->user_id ?? '' }}').trigger('change');
        </script>

        <script>
            document.getElementById('removeImageButton').addEventListener('click', function() {
                this.classList.toggle('checked');
                const isChecked = this.classList.contains('checked');

                // Remove any existing hidden input
                const existingInput = document.querySelector('input[name="remove_img"]');
                if (existingInput) {
                    existingInput.remove();
                }

                // If the button is checked, add a hidden input to the form
                if (isChecked) {
                    const hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.name = 'remove_img';
                    hiddenInput.value = '1';
                    document.getElementById('faculty_form').appendChild(hiddenInput);
                }
            });
        </script>

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
    @endpush
@endsection
