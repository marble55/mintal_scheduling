<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Classroom;
use App\Models\Faculty;
use App\Models\Schedule;
use App\Models\SchoolYear;
use App\Models\Semester;
use App\Models\Subject;
use App\Models\TimeSlot;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::with([
            'faculty', 'semester', 'school_year',
            'subject', 'classroom', 'block',  'time_slots'
        ])->get();

        return view('schedule.table-schedule', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $semesters = Semester::all();
        $sy = SchoolYear::all();
        $faculties = Faculty::all();
        $subjects = Subject::all();
        $classrooms =  Classroom::all();
        $blocks = Block::all();

        return view('schedule.form-schedule', compact([
            'semesters', 'sy', 'faculties', 'subjects', 'classrooms', 'blocks'
        ]))->with(['action' => 'add']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $schedule = Schedule::create($request->all());

        $time_slot = $schedule->time_slots->first;
        
        $time_slot->update($request->all());

        return redirect()->route('classroom.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
