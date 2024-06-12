<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
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

        $facultiesWithProgramHead = Faculty::whereHas('program_head')->with('user')->orderBy('first_name')->get();
        $facultiesWithoutProgramHead = Faculty::whereDoesntHave('program_head')->orderBy('first_name')->get();
        $faculties = $facultiesWithoutProgramHead->merge($facultiesWithProgramHead);

        return view('program_head.assign_programhead', compact(['program_heads', 'faculties',]))
            ->with('action', 'Register New');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {

        $faculty = Faculty::find($request->faculty_id);
        $username = $request->input('name') == null ? $faculty->first_name.' '.$faculty->last_name: $request->input('name');
        $password = $request->input('password') == null ? $faculty->id_usep : $request->input('password');
        
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
        $programHead = User::find( $id );
        $faculties = Faculty::whereDoesntHave('program_head')->get();
        return view('program_head.view_programhead', compact([
            'programHead', 'faculties'
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $program_heads = User::with('faculty')->orderByDesc('id')->get();
        $programHead = User::find($id);

        $facultiesWithProgramHead = Faculty::whereHas('program_head')->with('user')->orderBy('first_name')->get();
        $facultiesWithoutProgramHead = Faculty::whereDoesntHave('program_head')->orderBy('first_name')->get();
        $faculties = $facultiesWithoutProgramHead->merge($facultiesWithProgramHead);

        return view('program_head.assign_programhead', compact([
            'program_heads', 'programHead', 'faculties'
        ]))->with('action','update');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $programHead = User::find($id);
        $password = Hash::make($request->input('password') == null ? $programHead->faculty->id_usep : $request->input('password'));
        $request->merge(['password'=> $password]);

        $programHead->fill($request->all());
        $programHead->save();   

        return back()->with('message','Program Head Updated!');
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

    public function updateFaculties(Request $request, int $id)
    {   
        $faculties = $request->input('faculties');

        foreach($faculties as $facultyId){
            $faculty = Faculty::find($facultyId);
            $faculty->user_id = $id;
            $faculty->save();
        }

        return back()->with('message','Faculty(ies) added');
    }

    public function destroyFaculties(int $id)
    {
        $faculty = Faculty::find($id);
        $faculty->user_id = null;
        $faculty->save();
        return back()->with('message','Faculty removed!');
    }

    
}
