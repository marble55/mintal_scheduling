<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
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
        return view('faculty.assign-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->user()->faculties()
            ->create($request->all());
    
        return redirect()->route('faculty.index', ['category' => 'graduate']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Faculty $faculty)
    {
        $schedules = $faculty->schedules()->getResults();
        return view('faculty.faculty-profile', compact('faculty', 'schedules'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faculty $faculty)
    {
        return view('faculty.edit-form', compact('faculty'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faculty $faculty)
    {
        $faculty->update($request->all());

        return redirect()->route('faculty.index');
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
