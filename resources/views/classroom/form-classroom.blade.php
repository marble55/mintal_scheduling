@extends('layouts.app')

@section('content')
    <div class="row align-items-center justify-content-center" style="margin-bottom:-5%;">
        <div class="col col-sm-6 col-lg-7 col-xl-6">
            <div class="text-center mb-5">
                <h3 class="fw-bold">{{ ucfirst($action) }} Room</h3>
            </div>

            <!-- Divider -->
            <div class="position-relative">
                <hr class="text-secondary divider">
            </div>

            <!-- Form -->
            <form method="POST"
                action="{{ $action === 'update' ? route('classroom.update', $classroom->id) : route('classroom.store') }}">
                @if ($action === 'update')
                    @method('PUT')
                @endif
                @csrf
                <!-- Room -->
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class='bx bx-id-card'></i>
                    </span>

                    <input type="text" class="form-control form-control-lg fs-6" name="room" placeholder="Room"
                        value="{{ $classroom->room ?? ''}}" required>
                </div>

                <!-- Building -->
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class='bx bx-user-pin'></i>
                    </span>

                    <input type="text" class="form-control form-control-lg fs-6" name="building" placeholder="Building"
                        value="{{ $classroom->building ?? ''}}" required>
                </div>
                <!-- Button -->
                <button class="btn btn-primary btn-lg w-100"
                    style="border: white; background-color: rgb(161, 49, 49);">{{ucfirst($action)}}</button>
            </form>
        </div>
    </div>
@endsection
