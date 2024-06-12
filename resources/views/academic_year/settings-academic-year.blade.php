@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-5">Modify Academic Calendar</h1>

        <form method="POST" action="{{ route('academic-calendar.store') }}" class="mt-4">
            @csrf
            @method('POST')

            <div class="form-group">
                <label for="semester">Select Semester:</label>
                <select id="semester_select" name="semester_id" id="semester" class="form-select @error('semester_id') is-invalid @enderror">
                    <option value="1">1st Semester</option>
                    <option value="2">2nd Semester</option>
                    <option value="3">Summer</option>
                </select>
                @error('semester_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="academic_year">Academic Year:</label>
                <input type="text" value="{{ $currentYear }}" name="academic_year" id="academic_year" class="form-control @error('academic_year') is-invalid @enderror"
                    placeholder="Enter academic year" maxlength="9" minlength="9">
                @error('academic_year')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary" style="margin-top: 20px; 
            background-color: rgb(161, 49, 49); border-color:white;">Update Academic Calendar</button>
        </form>
    </div>
@endsection

@push('scripts')
    <script>document.getElementById("semester_select").value = "{{ old('semester_id', app('current_academic_year')->getCurrentSemester()) }}";</script>
@endpush