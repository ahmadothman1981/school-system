<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Classes;
use Illuminate\Support\Facades\Hash;


class UsersProfilesController extends Controller
{
    public function show()
    {

        $users = User::all();

         return view("admin.students",compact('users'));
    }
    public function create()
    {       
        $classes = Classes::all();
        return view('students.create_student',compact('classes'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required', 'numeric' ],
            'address' => ['required', 'string', 'max:255'],
            'date_of_birth'=>['required','date'],
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone'=>$request->phone,
            'password' => Hash::make('password'),
            'address'=>$request->address,
            'date_of_birth'=>$request->date_of_birth,
        ]);
        $users = User::all();

        return view("admin.students",compact('users'));
    }
    


}
