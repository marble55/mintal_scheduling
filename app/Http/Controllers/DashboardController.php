<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Faculty;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $tot_schedules = Schedule::count();
        $vacant_rooms = Classroom::whereDoesntHave('schedules')->get();
        $total_vr = $vacant_rooms->count();
        $all_faculty = Faculty::where('is_part_timer', '=',0)->count();
        $all_partTimer = Faculty::where('is_part_timer', '=',1)->count();
        $total_faculties = Faculty::count();
        $total_programheads = User::count();
        
        $user = Auth::user();
        return view('dashboard', compact(
            'total_faculties', 
            'vacant_rooms', 
            'total_vr',
            'tot_schedules',
            'all_faculty',
            'all_partTimer',
            'user',
            'total_programheads',
        ));
    }
}
