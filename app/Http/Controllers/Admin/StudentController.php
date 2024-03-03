<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\User;
use App\Models\ClassName;
use Illuminate\Support\Facades\Hash;


class StudentController extends Controller
{
    public function index()
    {

        $users = User::paginate(3);

         return view("students.students",compact('users'));
    }
    public function create()
    {       
        $classes = ClassName::all();
        return view('students.create_student',compact('classes'));
    }
    public function store(StoreStudentRequest $request)
    {

       try{ $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $image-> move(public_path('/images/students'), $name_gen);
        $new_image = 'images/students/'.$name_gen;
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone'=>$request->phone,
        'password' => Hash::make('password'),
        'address'=>$request->address,
        'date_of_birth'=>$request->date_of_birth,
        'notes'=>$request->notes,
        'photo'=>$new_image,
        'class'=>$request->class,
    ]);
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
        $classes = ClassName::all();
        return view('students.update_student',compact('student','classes'));
    }

    public function update(UpdateStudentRequest $request)
    {
        try{
            $UserId = $request->id;
        $user = User::find($UserId);
        if($request->file('image'))
        {
            $update_image = $request->file('image');
            unlink(public_path('/').$user->photo); 
            $image_name = date('YmdHi').$update_image->getClientOriginalExtension();
            $update_image->move(public_path('/images/students'), $image_name);
        }else{
            $update_image= $user->photo ;
        }
        User::FindOrFail($UserId)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone'=>$request->phone,
            'password' => Hash::make('password'),
            'address'=>$request->address,
            'date_of_birth'=>$request->date_of_birth,
            'notes'=>$request->notes,
            'photo'=>$update_image,
            'class'=>$request->class,
        ]);
        Log::info(message:"Update Student : System  Update Student with id {$user->id} successfully.");
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
        $UserImage = $user->photo;
        
        if(!$UserImage == null)
        {
            unlink($UserImage);
            $user = User::findOrFail($id);
        }
        
        $user->delete();
        Log::info(message:"Delete Student : System  Delete Student  successfully.");
        }
        

        catch(\Throwable $exception){
    
            Log::error(message:" can't Delete Student : System can't  Delete Student ".$exception->getMessage());
            abort(500);
    
         }
    

        return redirect()->route('admin.profiles')->with('warning','Student Deleted Successfully');
    }
    


}
