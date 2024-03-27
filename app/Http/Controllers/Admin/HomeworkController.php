<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Semester;
use App\Models\Teacher;
use App\Models\Subject;
use App\Http\Requests\StoreAssignmentRequest;
use App\Http\Requests\UpdateAssignmentRequest;
use Illuminate\Support\Facades\Log;





class HomeworkController extends Controller
{
    public function index()
    {
        $assignments = Assignment::paginate(10);
        return view("homework.homework",compact('assignments'));
       
    }

    public function create()
    {
        $semesters = Semester::with('assignment')->get();
        $teachers = Teacher::with('assignment')->get();
        $subjects = Subject::with('assignment')->get();
      
         return view("homework.create_homework",compact('semesters','teachers','subjects'));
    }

    public function store(StoreAssignmentRequest $request)
    {

       try{
        $validatatedRequest = $request->validated();
       
    $assignment = Assignment::create([
        'name' => $validatatedRequest['name'],
        'notes' => $validatatedRequest['notes'],
        'exam_date'=>$validatatedRequest['exam_date'],
        'semester_id' =>$validatatedRequest['semester_id'],
        'teacher_id'=>$validatatedRequest['teacher_id'],
        'subject_id'=>$validatatedRequest['subject_id'],
    ]);
    $assignment->addMediaFromRequest('image')->toMediaCollection('assignments');
    //piovet table attach
      
       
    Log::info(message:"Store assignment : System  store assignment with id {$assignment->id} successfully.");
    }
    catch(\Throwable $exception){
    
        Log::error(message:" can't Store assignment : System can't  store assignment ".$exception->getMessage());
        abort(500);

     }

          
        return redirect()->route('admin.homework')->with('success','Assignment Created Successfully');
    }

    public function edit($id)
    {
        $assignment = Assignment::findOrFail($id);
        $semesters = Semester::with('assignment')->get();
        $teachers = Teacher::with('assignment')->get();
        $subjects = Subject::with('assignment')->get(); 

        return view('homework.update_assignment',compact('assignment','semesters','teachers','subjects'));
    }

    public function update(UpdateAssignmentRequest $request)
    {
        
       try{
        $validatatedRequest = $request->validated();
        $assignment_id = $request->id;
        $assignment = Assignment::find($assignment_id);
       
       $UpdatedAssignment =  Assignment::FindOrFail($assignment_id)->update([
        'name' => $validatatedRequest['name'],
        'notes' => $validatatedRequest['notes'],
        'exam_date'=>$validatatedRequest['exam_date'],
        'semester_id' =>$validatatedRequest['semester_id'],
        'teacher_id'=>$validatatedRequest['teacher_id'],
        'subject_id'=>$validatatedRequest['subject_id'],
        ]);
        if($request->file('image'))
        {  
            
            $assignment->clearMediaCollection('assignments');
            $assignment->addMediaFromRequest('image')->toMediaCollection('assignments');
        }
        
        Log::info(message:"Update Assignment : System  Update Assignment with id {$assignment->id} successfully.");
       
        }
        
    
    catch(\Throwable $exception){
    
        Log::error(message:" can't Update Assignment : System can't  Update Assignment ".$exception->getMessage());
        abort(500);

     }

        

        return redirect()->route('admin.homework')->with('success','Assignment Updated Successfully');
        
    }

    public function delete($id)
    {
        try{
            $assignment = Assignment::findOrFail($id);
           
        
        $assignment->delete();
        Log::info(message:"Delete assignment : System  Delete assignment  successfully.");
        }
        

        catch(\Throwable $exception){
    
            Log::error(message:" can't Delete Assignment : System can't  Delete Assignment ".$exception->getMessage());
            abort(500);
    
         }
    

        return redirect()->route('admin.homework')->with('warning','Assignment Deleted Successfully');
    }

    

    public function show($id)
    {
        $assignment = Assignment::find($id);
        
      
       
        return view('homework.show_assignment',compact('assignment'));
    }

    

}
