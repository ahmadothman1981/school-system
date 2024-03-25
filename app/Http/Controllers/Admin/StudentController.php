<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\User;
use App\Models\Semester;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;



class StudentController extends Controller
{
    public function index()
    {

        $users = User::paginate(3);
        $semesters = Semester::all();
       //dd($users);
         return view("students.students",compact('users','semesters'));
    }
    public function create()
    {       
        $classes = Semester::all();
        return view('students.create_student',compact('classes'));
    }
    public function store(StoreStudentRequest $request)
    {

       try{/* $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $image-> move(public_path('/images/students'), $name_gen);
        $new_image = 'images/students/'.$name_gen;*/
        $validatatedRequest = $request->validated();
       
    $user = User::create([
        'name' => $validatatedRequest['name'],
        'email' => $validatatedRequest['email'],
        'phone'=>$validatatedRequest['phone'],
        'password' => Hash::make('password'),
        'address'=>$validatatedRequest['address'],
        'date_of_birth'=>$validatatedRequest['date_of_birth'],
        'notes'=>$validatatedRequest['notes'],
        //'photo'=>$new_image,
        'semester'=>$validatatedRequest['semester_id'],
    ]);
    $user->addMediaFromRequest('image')->toMediaCollection('images');
    //piovet table attach
       $semester_id = $user->semester;
       $user->semesters()->attach($semester_id);
       
    Log::info(message:"Store Student : System  store Student with id {$user->id} successfully.");
    }
    catch(\Throwable $exception){
    
        Log::error(message:" can't Store Student : System can't  store Student ".$exception->getMessage());
        abort(500);

     }

          
        return redirect()->route('admin.profiles')->with('success','Student Created Successfully');
    }

    public function edit($id)
    {
        $student = User::findOrFail($id);
        $classes = Semester::all();
        return view('students.update_student',compact('student','classes'));
    }

    public function update(UpdateStudentRequest $request)
    {
        
        try{
            $UserId = $request->id;
        $user = User::find($UserId);
        $validatatedRequest = $request->validated();
       $update_user =  User::FindOrFail($UserId)->update([
        'name' => $validatatedRequest['name'],
        'email' => $validatatedRequest['email'],
        'phone'=>$validatatedRequest['phone'],
        'password' => Hash::make('password'),
        'address'=>$validatatedRequest['address'],
        'date_of_birth'=>$validatatedRequest['date_of_birth'],
        'notes'=>$validatatedRequest['notes'],
        'semester'=>$validatatedRequest['semester_id'],
        ]);
        if($request->file('image'))
        {
            $user = User::find($UserId);
            $user->clearMediaCollection('images');
            $user->addMediaFromRequest('image')->toMediaCollection('images');
        }
        $user->semesters()->sync($user->semester);
        Log::info(message:"Update Student : System  Update Student with id {$user->id} successfully.");
       /* if($request->file('image'))
        {
           $update_image = $request->file('image');
            unlink(public_path('/').$user->photo); 
            $image_name = date('YmdHi').$update_image->getClientOriginalExtension();
            $update_image->move(public_path('/images/students'), $image_name);
            else{
                $update_image= $user->photo ;
            }*/
        }
        
    
    catch(\Throwable $exception){
    
        Log::error(message:" can't Update Student : System can't  Update Student ".$exception->getMessage());
        abort(500);

     }

        

        return redirect()->route('admin.profiles')->with('success','Student Updated Successfully');
        
    }

    public function delete($id)
    {
        try{
            $user = User::findOrFail($id);
            $user->semesters()->detach($user->semester);
           /* $UserImage = $user->photo;
        
        if(!$UserImage == null)
        {
            unlink($UserImage);
            $user = User::findOrFail($id);
        }*/
        
        $user->delete();
        Log::info(message:"Delete Student : System  Delete Student  successfully.");
        }
        

        catch(\Throwable $exception){
    
            Log::error(message:" can't Delete Student : System can't  Delete Student ".$exception->getMessage());
            abort(500);
    
         }
    

        return redirect()->route('admin.profiles')->with('warning','Student Deleted Successfully');
    }

    public function show($id)
    {
        $student = User::find($id);
        
      
       
        return view('students.show_student',compact('student'));
    }
    


}
