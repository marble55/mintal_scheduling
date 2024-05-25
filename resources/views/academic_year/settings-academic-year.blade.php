@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-5">Modify Academic Calendar</h1>

        <form method="POST" action="{{ route('academic-calendar.store') }}" class="mt-4">
            @csrf
            @method('POST')

            <div class="form-group">
                <label for="semester">Select Semester:</label>
                <select name="semester_id" id="semester" class="form-control">
                    <option value="1">1st Semester</option>
                    <option value="2">2nd Semester</option>
                    <option value="3">Summer</option>
                </select>
            </div>

            <div class="form-group">
                <label for="academic_year">Academic Year:</label>
                <input type="text" value="{{ $currentYear }}" name="academic_year" id="academic_year" class="form-control"
                    placeholder="Enter academic year">
            </div>

            <button type="submit" class="btn btn-primary" style="margin-top: 20px; 
            background-color: rgb(161, 49, 49); border-color:white;">Update Academic Calendar</button>
        </form>
    </div>
@endsection
