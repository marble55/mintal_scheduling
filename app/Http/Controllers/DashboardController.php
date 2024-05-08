<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Faculty;
use App\Models\Schedule;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $tot_schedules = Schedule::count();
        $vacant_rooms = Classroom::whereDoesntHave('schedules')->get();
        $total_vr = $vacant_rooms->count();
        $total_faculties = Faculty::count();
        return view('dashboard', compact(
            'total_faculties', 
            'vacant_rooms', 
            'total_vr',
            'tot_schedules',
        ));
    }
}
