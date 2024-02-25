<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::paginate(3);
        return view('teachers.teachers',compact('teachers'));
    }
    
    public function store(Request $request)
    {
      
        $request->validate([
            'name'=>['required','string','max:255'],
            'email'=>['required','email'],
            'phone'=>['required','string','max:255'],
        ]);
        
        $teacher = Teacher::create([
           'name'=>$request->name,
           'email'=>$request->email,
           'phone'=>$request->phone, 
        ]);

        return redirect()->route('admin.teachers')->with('success','Teacher Created Successfully');
    }
    public function edit($id)
    {
       $teacher = Teacher::findOrFail($id);
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
        
        Teacher::findOrFail($TeacherId)->update([
           'name'=>$request->name,
           'email'=>$request->email,
           'phone'=>$request->phone, 
        ]);
        return redirect()->route('admin.teachers')->with('success','Teacher updated Successfully');
    }
    public function delete($id)
    {
        $TeacherId = Teacher::findOrFail($id);
        $TeacherId->delete();
        return redirect()->route('admin.teachers')->with('warning','Teacher Deleted Successfully');

    }

}
