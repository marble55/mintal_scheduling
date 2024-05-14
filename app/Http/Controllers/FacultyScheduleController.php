<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Classroom;
use App\Models\Faculty;
use App\Models\Schedule;
use App\Models\SchoolYear;
use App\Models\Semester;
use App\Models\Subject;
use Illuminate\Http\Request;

class FacultyScheduleController extends Controller
{
    /**
     * display listing of resources
     * (Gi create nako ni nga controller kay para unta ni sa faculty 
     * nga schedule, just in case nga dili mu work ang modals)
     * 
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
        // Ang kani kay para ni sa faculty schedule
        return view('schedule.faculty-schedule', compact([
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

        return redirect()->route('schedule.index');
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
