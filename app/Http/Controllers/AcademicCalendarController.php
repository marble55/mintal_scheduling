<?php

namespace App\Http\Controllers;

use App\Http\Requests\AcademicCalendarRequest;
use App\Models\SchoolYear;
use App\Services\AcademicCalendarService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AcademicCalendarController extends Controller
{

    protected $currentAcademicCalendar;

    public function __construct(AcademicCalendarService $academicCalendarService)
    {
        $this->currentAcademicCalendar = $academicCalendarService;
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {  
        $currentSemester = $this->currentAcademicCalendar->getCurrentSemesterName();
        $currentYear = $this->currentAcademicCalendar->getCurrentYearName();
        

        return view('academic_year.settings-academic-year', compact(
            'currentSemester',
            'currentYear',    
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AcademicCalendarRequest $request)
    {
        $newYear = SchoolYear::createOrFirst(['academic_year' => $request->input('academic_year')]);
        
        $newSemesterID = $request->input('semester_id');
        $newYearID = $newYear->getAttribute('id');

        $this->currentAcademicCalendar->setCurrentAcademicCalendar($newSemesterID, $newYearID);
        
        return back()->with('message', 'Changes Saved!');
    }
}
