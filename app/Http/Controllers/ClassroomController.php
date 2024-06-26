<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassroomRequest;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classroomsWithSchedules = Classroom::whereHas('schedules')->get();
        $classroomsWithoutSchedules = Classroom::whereDoesntHave('schedules')->get();
        
        return view('classroom.table-classroom', compact(['classroomsWithSchedules', 'classroomsWithoutSchedules']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('classroom.form-classroom')->with(['action' => 'add']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClassroomRequest $request)
    {
        Classroom::create($request->all());

        return redirect()->route('classroom.index')->with('message', 'The Action is successful!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $classroom = Classroom::findOrFail($id);
        return view('classroom.form-classroom', compact('classroom'))->with(['action' => 'update']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClassroomRequest $request, string $id)
    {
        $classroom = Classroom::find($id);

        $classroom->update($request->all());

        return redirect()->route('classroom.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $classroom = Classroom::find($id);

        $classroom->delete();

        return redirect()->route('classroom.index');
    }
}
