@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>
            {{ ucfirst($action) }} Program Head
        </h1>
        <br>
    </div>

    <div class="container mb-5">
        <form id="faculty_form" action="{{ isset($faculty) ? route('faculty.update', $faculty) : route('faculty.store') }}" method="POST" enctype="multipart/form-data">
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
                                            </form>
                                            <button type="button" id="removeImageButton" name="remove_img" class="btn btn-secondary"
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
                                        <h6 class="details" style="color: rgb(161, 49, 49);">Set Program Head Details</h6>
                                    </div>
                                    <!-- id_usep-->
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="id_usep">Usep ID</label>
                                            <input type="text" class="form-control" name="id_usep" value="{{ $faculty->id_usep ?? '' }}"
                                                placeholder="Enter Usep ID" required maxlength="10">
                                            <br>
                                            <label for="id_not_exsit" style="color:rgb(145, 40, 40); font-size:0.8rem;">Note: If ID doesn't exist, please <a href="{{ route('faculty.create') }}"> Add a Faculty</a> first.</label>
                                        </div>
                                    </div>
                                    <!-- Email -->
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="first_name">Email</label>
                                            <input type="text" class="form-control" name="email"
                                                placeholder="Enter Email" required>
                                        </div>
                                    </div>
                                    <!-- Username -->
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="first_name">Username</label>
                                            <input type="text" class="form-control" name="name" placeholder="Enter Username" required>
                                        </div>
                                    </div>
                                    <!-- password -->
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="last_name">Password</label>
                                            <input type="password" class="form-control" name="password" placeholder="Password" required autocomplete="new-password">
                                        </div>
                                    </div>
                                    <!-- confirm password -->
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="last_name">Confirm Password</label>
                                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
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
    <div class="container pt-5 p-3 border-top border-black">
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

    @push('scripts')
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
