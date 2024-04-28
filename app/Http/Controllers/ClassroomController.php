<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classrooms = Classroom::all();
        return view('classroom.table-classroom', compact('classrooms'));
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
    public function store(Request $request)
    {
        Classroom::create($request->all());

        return redirect()->route('classroom.index');
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
    public function update(Request $request, string $id)
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
