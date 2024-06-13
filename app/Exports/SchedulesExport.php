<?php

namespace App\Exports;

use App\Models\Faculty;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SchedulesExport implements FromView, ShouldAutoSize
{
    use Exportable;
    public function view(): View
    {
        $academicCalendarService = app('current_academic_year');

        $facultiesRegular = Faculty::with('schedules', 'schedules.subject', 'schedules.block', 'schedules.time_slots', 'schedules.classroom')
            ->where('is_part_timer', '=', '0')
            ->orderBy('first_name')
            ->get();
        $facultiesPartTime = Faculty::with('schedules', 'schedules.subject', 'schedules.block', 'schedules.time_slots', 'schedules.classroom')
            ->where('is_part_timer', '=', '1')
            ->orderBy('first_name')
            ->get();
        $semester = $academicCalendarService->getCurrentSemesterName();
        $school_year = $academicCalendarService->getCurrentYearName();
        
        return view('components.export.schedules', compact('facultiesRegular', 'facultiesPartTime', 'school_year', 'semester'));
    }
}
