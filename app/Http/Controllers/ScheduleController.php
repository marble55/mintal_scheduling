<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Classroom;
use App\Models\Faculty;
use App\Models\Schedule;
use App\Models\SchoolYear;
use App\Models\Semester;
use App\Models\Subject;
use App\Services\AcademicCalendarService;
use App\Services\CurrentSemesterService;
use App\Services\ScheduleService;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{


    protected $currentSemester;
    protected $currentYear;

    public function __construct(AcademicCalendarService $academicCalendarService)
    {
        $this->currentSemester = $academicCalendarService->getCurrentSemester();
        $this->currentYear = $academicCalendarService->getCurrentYear();
    }

    /**
     * display listing of resources
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

        return view('schedule.form-schedule', compact([
            'semesters', 'sy', 'faculties', 'subjects', 'classrooms', 'blocks'
        ]))->with(['action' => 'add']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ScheduleService $scheduleService)
    {
        $result = $scheduleService->createSchedule(
            $request->except(['sy_id', 'semesters_id']), 
            $this->currentSemester, 
            $this->currentYear
        );
        
        if($result['success']){
            return redirect()->route('schedule.index')->with('message', 'New schedule added!');
        } else{
            return redirect()->back()->with('error', $result['message']);
        }   
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
        $schedule = Schedule::findOrFail($id);
        $semesters = Semester::all();
        $sy = SchoolYear::all();
        $faculties = Faculty::all();
        $subjects = Subject::all();
        $classrooms =  Classroom::all();
        $blocks = Block::all();

        return view('schedule.form-schedule', compact([
            'schedule',
            'semesters', 
            'sy', 
            'faculties', 
            'subjects', 
            'classrooms', 
            'blocks'
        ]))->with(['action' => 'update']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, ScheduleService $scheduleService)
    {
        $result = $scheduleService->updateSchedule($request->except(['sy_id', 'semesters_id']), $id);
        
        if($result['success']){
            return redirect()->route('schedule.index')->with('message', 'Schedule Updated!');
        } else{
            return redirect()->back()->with('error', $result['message']);
        }   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Schedule::findOrFail($id)->delete();

        return redirect()->route('schedule.index')->with('message', 'Schedule Deleted!');
    }
}
