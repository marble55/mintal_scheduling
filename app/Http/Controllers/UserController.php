<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('program_head.table_programhead')->with('program_heads', User::with('faculty')->orderByDesc('id')->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $program_heads = User::with('faculty')->orderByDesc('id')->get();
        $faculties = Faculty::whereDoesntHave('user')->orderBy('first_name')->get();

        return view('program_head.assign_programhead', compact(['program_heads', 'faculties',]))
            ->with('action', 'Register New');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $faculty = Faculty::find($request->faculty_id);
        $username = $request->input('name') == null ? $faculty->first_name.' '.$faculty->last_name: $request->input('name');
        $password = $request->input('password') == null ? $faculty->faculty_id : $request->input('password');

        User::create([
            'name' => $username,
            'email' => $request->input('email'),
            'password' => Hash::make($password),
            'faculty_id' => $request->input('faculty_id')
        ]);

        return back()->with('message','New Program Head Registered!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $program_heads = User::with('faculty')->orderByDesc('id')->get();
        $user = User::find($id);
        $faculties = Faculty::whereDoesntHave('user')->orderBy('first_name')->get();
        return view('program_head.assign_programhead', compact([
            'program_heads', 'user', 'faculties'
        ]))->with('action','update');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        
        return back();
    }
}
