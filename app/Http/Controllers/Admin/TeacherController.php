<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Support\Facades\Log;

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
        ],[
            'name.required' => 'من فضلك ادخل اسم الفصل الدراسى',
            'email.required' => 'من فضلك ادخل الايميل',
            'phone.required' => 'من فضلك ادخل رقم التليفون'


        ]);
        try{
            $teacher = Teacher::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone, 
             ]);
             Log::info(message:"Store Teacher : System  store Teacher with id {$teacher->id} successfully.");
        }
        catch(\Throwable $exception){
    
            Log::error(message:" can't Store Teacher : System can't  store Teacher ".$exception->getMessage());
            abort(500);
    
         }
        
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
        ],[
            'name.required' => 'من فضلك ادخل اسم الفصل الدراسى',
            'email.required' => 'من فضلك ادخل الايميل',
            'phone.required' => 'من فضلك ادخل رقم التليفون'


        ]);
        try{
            Teacher::findOrFail($TeacherId)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone, 
             ]);
             Log::info(message:"Update Teacher : System  Update Teacher with id {$teacher->id} successfully.");
        }
        catch(\Throwable $exception){
    
            Log::error(message:" can't Update Teacher : System can't  Update Teacher ".$exception->getMessage());
            abort(500);
    
         }
        
       
        return redirect()->route('admin.teachers')->with('success','Teacher updated Successfully');
    }
    public function delete($id)
    {
        try{
            $TeacherId = Teacher::findOrFail($id);
            $TeacherId->delete();
            Log::info(message:"Delete Teacher : System  Delete Teacher  successfully.");
        }
        catch(\Throwable $exception){
    
            Log::error(message:" can't Delete Teacher : System can't  Delete Teacher ".$exception->getMessage());
            abort(500);
    
         }
       
        return redirect()->route('admin.teachers')->with('warning','Teacher Deleted Successfully');

    }

}
