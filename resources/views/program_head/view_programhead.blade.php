@extends('layouts.app')


@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

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
                                    @if ($programHead->faculty->profile_image)
                                        <img src="{{ Storage::url($programHead->faculty->profile_image) }}"
                                            alt="{{ $programHead->name }}'s profile image">
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
                            <p class="h5">{{ $programHead->faculty->last_name ?? '' }},
                                {{ $programHead->faculty->first_name ?? '' }}</p>
                        </div>
                        <hr class="hr">
                        <div class=" row">
                            <div class=" col-6">
                                <p class="h6 fw-bold">USeP ID:</>
                                <p class="h5">{{ $programHead->faculty->id_usep ?? '' }}</p>
                            </div>
                            <div class=" col-6">
                                <p class="h6 fw-bold">UserName:</p>
                                <p class="h5">{{ $programHead->name }}</p>
                            </div>
                        </div>
                        <hr class="hr">
                        <div class=" col-12">
                            <p class="h6 fw-bold">Email:</p>
                            <p class="h5">{{ $programHead->email }}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container pt-5">
        <h3>Faculties Under</h3>
        
        <div class="col-12 mb-5">
            <h6>Add faculties to this Program Head</h6>
            <form action="{{ route('program-head.updateFaculties', $programHead->id) }}" method="POST">
                @csrf
                <select name="faculties[]" id="faculties_select" multiple class="col-4" required>
                    @foreach ($faculties as $faculty)
                        <option value="{{ $faculty->id }}"> {{ $faculty->first_name }} {{ $faculty->last_name }}</option>
                    @endforeach
                </select>
                <button type="submit" id="submit" name="submit" class="btn btn-light-maroon border-black col-2">Add</button>
            </form>
        </div>

        <div class="col-12">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Faculty ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Designation (Load)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($programHead->faculties as $faculty)
                        <tr>
                            <!--Usep ID (clicking will lead to faculty profile)-->
                            <td>
                                <a href="{{ route('faculty.show', $faculty) }}"> {{ $faculty->id_usep }} </a>
                            </td>
                            <!--First Name-->
                            <td>{{ $faculty->first_name }}</td>
                            <!--last name-->
                            <td>{{ $faculty->last_name }}</td>
                            <!--Designation-->
                            <td>{{ $faculty->designation }} ({{ $faculty->designation_load ?? '' }})</td>
                            <!--Action-->
                            <td class="align-items-center gap-3"> {{-- gi remove sa nako ang dflex --}}
                                <form method="POST" action="{{ route('program-head.destroyFaculties', $faculty->id) }}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('program-head.destroyFaculties', $faculty->id) }}"
                                        onclick="event.preventDefault(); confirmDeletion(event, this);"
                                        class="text-danger">Remove</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#faculties_select').select2({
            closeOnSelect: false
        })
    </script>
@endpush
