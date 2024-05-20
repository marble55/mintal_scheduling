<?php

namespace App\Services;
use App\Models\AcademicYearConfig;
use App\Models\SchoolYear;
use App\Models\Semester;

class AcademicCalendarService{

    private $currentAcademicCalendar;

    public function __construct() {
        $this->currentAcademicCalendar = AcademicYearConfig::first();
    }

    public function getCurrentSemester(){
        return $this->currentAcademicCalendar->getAttribute('current_semester');
    }
    public function getCurrentSemesterName(){
        return Semester::find($this->getCurrentSemester())->getAttribute('name');
    }

    public function getCurrentYear(){
        return $this->currentAcademicCalendar->getAttribute('current_school_year');
    }
    public function getCurrentYearName(){
        return SchoolYear::find($this->getCurrentYear())->getAttribute('academic_year');
    }
    

    public function getCurrentAcademiCalendar(){
        return $this->currentAcademicCalendar;
    }
    public function setCurrentAcademicCalendar(int $newSemesterID, int $newYearID){
        $this->currentAcademicCalendar->update(['current_semester' => $newSemesterID, 'current_school_year' => $newYearID]);
    }
}