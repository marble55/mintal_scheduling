@extends('layouts.app')

@section('content')
    <div class="row gutters">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="account-settings">
                        <div class="user-profile">
                            <div class="user-avatar">
                                @if ($user->faculty->profile_image)
                                    <img src="{{ Storage::url($user->faculty->profile_image) }}"
                                        alt="{{ $user->faculty->profile_image }}'s profile image">
                                @else
                                    <img src="{{ asset('dist/assets/images/DEFAULT-PROFILE.jpg') }}"></img>
                                @endif
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-center">
                                    <br>
                                    <form id="image_form" action="{{ route('profile.image-update') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
                                        <div>
                                            <label for="image">Choose Image:</label>
                                            <input type="file" name="image" id="image" accept="image/*"
                                                style="width: 200px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                                        </div>
                                        <br>
                                        <button type="submit" id="submit" name="submit" class="btn btn-primary"
                                            style="background-color: rgb(161, 49, 49); border:white;">Save</button>


                                        <button type="button" id="removeImageButton" name="submit"
                                            class="btn btn-secondary" style="border:white;">Remove Image</button>
                                    </form>
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
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                <div class="max-w-xl">
                                    @include('profile.partials.update-profile-information-form')
                                </div>
                            </div>

                            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                <div class="max-w-xl">
                                    @include('profile.partials.update-password-form')
                                </div>
                            </div>

                            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                <div class="max-w-xl">
                                    @include('profile.partials.delete-user-form')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                    document.getElementById('image_form').appendChild(hiddenInput);
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
