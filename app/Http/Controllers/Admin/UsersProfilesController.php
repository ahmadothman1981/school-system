<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Models\User;
use App\Models\ClassName;
use Illuminate\Support\Facades\Hash;


class UsersProfilesController extends Controller
{
    public function index()
    {

        $users = User::paginate(3);

         return view("admin.students",compact('users'));
    }
    public function create()
    {       
        $classes = ClassName::all();
        return view('students.create_student',compact('classes'));
    }
    public function store(StoreStudentRequest $request)
    {

        
        
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $image-> move(public_path('public/images/students'), $name_gen);
       $new_image = 'images/students'.$name_gen;
       // dd($new_image);

       

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone'=>$request->phone,
            'password' => Hash::make('password'),
            'address'=>$request->address,
            'date_of_birth'=>$request->date_of_birth,
            'photo'=>$new_image,
        ]);
        return redirect()->route('admin.profiles')->with('success','Student Created Successfully');
    }
    


}
