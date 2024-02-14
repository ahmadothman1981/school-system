<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teachers;
class TeacherController extends Controller
{
    public function allTeachers()
    {
        $teachers = Teachers::all();
        return view('teachers.teachers',compact('teachers'));
    }
    public function create()
    {
        return view('teachers.teacher_create');
    }
    public function store(Request $request)
    {
      
        $request->validate([
            'name'=>['required','string','max:255'],
            'email'=>['required','email'],
            'phone'=>['required','string','max:255'],
        ]);
        
        $teacher = Teachers::create([
           'name'=>$request->name,
           'email'=>$request->email,
           'phone'=>$request->phone, 
        ]);
        $teachers = Teachers::all();

        return view('teachers.teachers',compact('teachers'));
    }
    public function edit($id)
    {
       $teacher = Teachers::findOrFail($id);
       return view('teachers.teacher-edit',compact('teacher'));

    }
    public function update(Request $request)
    {
        $TeacherId = $request->id;
        $request->validate([
            'name'=>['required','string','max:255'],
            'email'=>['required','email'],
            'phone'=>['required','string','max:255'],
        ]);
        
         Teachers::findOrFail($TeacherId)->update([
           'name'=>$request->name,
           'email'=>$request->email,
           'phone'=>$request->phone, 
        ]);
        return redirect()->route('admin.teachers');
    }
    public function delete($id)
    {
        $TeacherId = Teachers::findOrFail($id);
        $TeacherId->delete();
        return redirect()->route('admin.teachers');

    }

}
