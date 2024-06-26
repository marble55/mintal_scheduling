@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .select2-container{
            max-width: 100%;
        }
    </style>
@endpush

@section('content')
    <div class="text-center">
        <h1>
            {{ ucfirst($action) }} Program Head
        </h1>
        <br>
    </div>

    <div class="container mb-5">
        <form id="faculty_form"
            action="{{ $action === 'update' ? route('program-head.update', $programHead->id) : route('program-head.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @isset($programHead)
                @method('PUT')
            @endisset
            <div class="row gutters">
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 w-100">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="details" style="color: rgb(161, 49, 49);">Set Program Head Details</h6>
                                </div>

                                <!-- Faculties -->
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="faculty_select" class="form-label">Faculty: </label>
                                        <select name="faculty_id" id="faculty_select" autofocus required class="form-select @error('faculty_id') is-invalid @enderror"
                                            @if ($action === 'update') disabled @endif >
                                            @foreach ($faculties as $faculty)
                                                <option  value="{{ $faculty->id }}" @if ($faculty->user != null) disabled @endif>{{ $faculty->first_name . ' ' . $faculty->last_name }} @if ($faculty->user != null) (Registered) @endif</option>
                                            @endforeach
                                        </select>
                                        <br>
                                        <label for="id_not_exsit" class="form-text text-input-helper">Note: If Faculty doesn't exist, please <a href="{{ route('faculty.create') }}"> Add a Faculty</a> first. </label>
                                        @error('faculty_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="emailInput" class="form-label ">Email</label>
                                        <input id="emailInput" type="email" required class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('', $programHead->email ?? '') }}"
                                            placeholder="Enter Email"   >
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Username -->
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="input_username" class="form-label ">Username</label>
                                        <input id="input_username" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name', $programHead->name ?? '') }}"
                                            placeholder="Optional">
                                        <div id="usernameHelpBlock" class="form-text text-input-helper">
                                            Note: Leave blank to set user name as Faculty Name*
                                        </div>
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- password -->
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="input_password" class="form-label">Password</label>
                                        <input id="input_password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                            placeholder="Optional" autocomplete="new-password" minlength="8">
                                        <div id="passwordHelpBlock" class="form-text text-input-helper">
                                            Note: Leave blank to set password as Faculty ID.* <br>
                                        </div>
                                        @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        <br>
                                        <button type="submit" id="submit" name="submit" class="btn btn-primary"
                                            style="background-color: rgb(161, 49, 49); border:white;">{{ isset($programHead) ? 'Update' : 'Create' }}</button>
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
        <h4 class="text-center fw-bold">Program Head Table</h4>
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
                        <td>{{ $ph->faculty->last_name ?? '' }}, {{ $ph->faculty->first_name ?? '' }}</td>
                        <!--Date Registered-->

                        @php $dateTime = \Carbon\Carbon::parse($ph->created_at); @endphp
                        <td>{{ $dateTime->toDateString() }}</td>

                        <!--Action-->
                        <td class="d-flex align-items-center gap-3">
                            <a href="{{ route('program-head.edit', $ph->id) }}">Edit</a>
                            <form method="POST" action="{{ route('program-head.destroy', $ph->id) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('program-head.destroy', $ph->id) }}"
                                    onclick="event.preventDefault(); confirmDeletion(event, this);"
                                    class="text-danger">Delete</a>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
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

        <script>
            $('#faculty_select').select2()
            $('#faculty_select').val('{{ $programHead->faculty_id ?? ''}}').trigger('change');
        </script>
    @endpush
@endsection
