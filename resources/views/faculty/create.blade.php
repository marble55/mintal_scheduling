@extends('layouts.app')

@section('content')
    <div class="row align-items-center justify-content-center">
        <div class="col col-sm-6 col-lg-7 col-xl-6">
            <div class="text-center mb-5">
                <h3 class="fw-bold">Add Faculty</h3>
            </div>
            <!-- Divider -->
            <div class="position-relative">
                <hr class="text-secondary divider">
            </div>
            
            <!-- Form -->
            <form action="{{route('faculty.store')}}" method="POST">
                @csrf
                <!-- id_usep-->
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class='bx bx-id-card'></i>
                    </span>
                    <input type="text" class="form-control form-control-lg fs-6"
                        name="id_usep" placeholder="USEP ID" required maxlength=10>
                </div>
                
                <!-- first name -->
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class='bx bx-user-pin'></i>
                    </span>
                    <input type="text" class="form-control form-control-lg fs-6"
                        name="first_name" placeholder="Firstname" required>
                </div>
                
                <!-- last name -->
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class='bx bx-user-pin'></i>
                    </span>
                    <input type="text" class="form-control form-control-lg fs-6"
                        name="last_name" placeholder="Lastname" required>
                </div>
                
                <!-- remarks -->
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class='bx bx-bookmark'></i>
                    </span>
                    <input type="text" class="form-control form-control-lg
                            fs-6"
                        name="remarks" placeholder="Remarks" required>
                </div>
                
                <!-- is undergraduate -->
                <div class="input-group mb-3">
                    <input type="checkbox" class="text-input" id="is_graduate" name="is_graduate"
                    value="1" {{ old('is_graduate') ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_graduate">Graduate?</label>
                </div>

                 <!-- is partimer -->
                 <div class="input-group mb-3">
                    <input type="checkbox" class="text-input" id="is_part_timer" name="is_part_timer"
                        value="1" {{ old('is_part_timer') ? 'checked' : '' }}>
                    <label class="text-input" for="is_part_timer">Part-timer?</label>
                </div>


                <button class="btn btn-primary btn-lg w-100"
                    style="border: white; background-color: rgb(161, 49, 49);">Add</button>
            </form>

        </div>
    </div>
@endsection
