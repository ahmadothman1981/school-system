<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Semester;
use Illuminate\Support\Facades\Log;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::paginate(3);
        return view('subjects.subjects',compact('subjects'));
    }

    public function create()
    {
        $teachers =Teacher::all();
        $semesters = Semester::all();
        return view('subjects.create-subject',compact('teachers','semesters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required','string','max:255'],
            'teacher_id'=>['required','string'],
            'semester_id'=>['required','string'],

        ],[
            'name.required' => 'من فضلك ادخل اسم المادة الدراسية',
            'teacher_id.required' => 'من فضلك ادخل مدرس المادة الدراسية',
            'semester_id.required' => 'من فضلك ادخل مدرس الفصل الدراسي',

            
        ]);
        try{
        $subject= Subject::create([
            'name'=>$request->name,
            'teacher_id'=>$request->teacher_id,
            'semester_id'=>$request->semester_id,
        ]);
        //piovet table attach
      
       


        Log::info(message:"Store Subject : System  store Subject with id {$subject->id} successfully.");
     }
        catch(\Throwable $exception){
    
        Log::error(message:" can't Store subject : System can't  store subject ".$exception->getMessage());
        abort(500);

     }
     
        return redirect()->route('admin.subjects')->with('success','تم إنشاء المادة الدراسية');

    }

    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        $teachers =Teacher::all();
        $semesters = Semester::all();
        return view('subjects.update_subject',compact('subject','teachers','semesters'));
    }

    public function update(Request $request)
    {
        try{
            $SubjectId = $request->id;
            $request->validate([
                'name'=>['required','string','max:255'],
                'teacher_id'=>['required','string'],
                'semester_id'=>['required','string'],

            ],[    
            'name.required' => 'من فضلك ادخل اسم المادة الدراسية',
            'teacher_id.required' => 'من فضلك ادخل مدرس المادة الدراسية',
            'semester_id.required' => 'من فضلك ادخل مدرس الفصل الدراسي',
                
            ]);
            Log::info(message:"Update Subject : System  Update Subject with id {$SubjectId} successfully.");
        }
        catch(\Throwable $exception){
    
            Log::error(message:" can't Update Subject : System can't  Update Subject ".$exception->getMessage());
            abort(500);
    
         }
       
        
        Subject::findOrFail($SubjectId)->update([
            'name'=>$request->name,
            'teacher_id'=>$request->teacher_id,
            'semester_id'=>$request->semester_id,
        ]);
        
        return redirect()->route('admin.subjects')->with('success','Subject updated Successfully');
    }

    public function delete($id)
    {
        try{
            $SubjectId = Subject::findOrFail($id);
            $SubjectId->delete();
            Log::info(message:"Delete Subject : System  Delete Subject  successfully.");
        }
        catch(\Throwable $exception){
    
            Log::error(message:" can't Delete Subject : System can't  Delete Subject ".$exception->getMessage());
            abort(500);
    
         }
        
       
        return redirect()->route('admin.subjects')->with('warning','تم حذف المادة الدراسية');

    }

}
