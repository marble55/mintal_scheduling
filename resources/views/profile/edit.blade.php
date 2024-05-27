@extends('layouts.app')

@section('content')
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
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div>
                                                <label for="image">Choose Image:</label>
                                                <input type="file" name="image" id="image" accept="image/*"
                                                style="width: 200px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                                            </div>
                                        <br>
                                        <button type="button" id="submit" name="submit" class="btn btn-primary"
                                            style="background-color: rgb(161, 49, 49); border:white;">Upload Image</button>
                                        </form>

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