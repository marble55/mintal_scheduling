<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Classroom;
use App\Models\Faculty;
use App\Models\Schedule;
use App\Models\SchoolYear;
use App\Models\Semester;
use App\Models\Subject;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $category = request('category');
        
        if($category === "part-timer")
        {
            $faculties = Faculty::with('program_head')->where('is_part_timer', '=', '1')->get();
        }else{
            $faculties = Faculty::with('program_head')->where('is_part_timer', '=', '0')->get();
        } 
        return view('faculty.table', compact('faculties', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('faculty.assign-form')->with(['action' => 'add']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->user()->faculties()
            ->create($request->all());
            
        return redirect()->route('faculty.index', ['category' => 'graduate'])->with('message', 'The Action is successful!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Faculty $faculty)
    {
        // Temporary and should be removed later
        $semesters = Semester::all();
        $sy = SchoolYear::all();
        $subjects = Subject::all();
        $classrooms =  Classroom::all();
        $blocks = Block::all();

        $subjectLoad = $faculty->schedules()->leftJoin('subject','subject.id','=','subject_id')->sum('load');
        $facultyLoad = $faculty->designation_load;
        $totalLoad = $subjectLoad + $facultyLoad;

        $allSchedules = Schedule::all()->whereNull('faculty_id');
        $schedules = $faculty->schedules()->getResults();
        

        return view('faculty.faculty-profile', compact(
            'faculty', 
            'schedules',
            'sy',
            'classrooms',
            'blocks',
            'subjects',
            'semesters',
            'sy',
            'allSchedules',
            'totalLoad',
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faculty $faculty)
    {   
        
        return view('faculty.assign-form', compact('faculty'))->with(['action' => 'update']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faculty $faculty)
    {
        // dd($request->all());
        $faculty->fill($request->all());
        $faculty->update();
        return redirect()->route('faculty.index')->with('message', 'Faculty updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faculty $faculty):RedirectResponse
    {   
        //Gate::authorize('delete', $faculty);

        $part_timer = $faculty->getAttribute('is_part_timer');

        if($part_timer){
            $category = 'part-timer';
        }else $category = 'graduate';

        $faculty->delete();

        return redirect()->route('faculty.index', ['category' => $category]);
    }

}
