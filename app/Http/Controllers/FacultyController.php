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
        $faculties = Faculty::with('program_head')->get();

        return view('faculty.table-data', compact('faculties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('faculty.create-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->user()->faculties()
            ->create($request->all());
    
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Faculty $faculty)
    {
        
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
        Gate::authorize('delete', $faculty);

        $faculty->delete();

        return redirect()->route('faculty.index');
    }
}
