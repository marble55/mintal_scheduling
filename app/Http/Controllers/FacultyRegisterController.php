<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacultyRegisterController extends Controller
{

        public function edit($user){
            return view('auth.register-faculty', compact('user'));
        }

        public function update(Request $request, $user){
            $program_head = User::findOrFail($user);
            
            $faculty = Faculty::findOrFail($program_head->getAttribute('faculty_id'));
            
            $faculty->update($request->all());

            Auth::login($program_head);
            
            return redirect(route('dashboard', false));
        }
}
