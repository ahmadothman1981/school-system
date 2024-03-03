<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassName;
use Illuminate\Support\Facades\Log;

class ClassesController extends Controller
{
    public function index()
    {
        $classes = ClassName::paginate(3);
        
        return view('classes.classes',compact('classes'));
    }

    public function create()
    {
        return view('classes.class_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required','string','max:255'],
        ],[
            'name.required' => 'من فضلك ادخل اسم الفصل الدراسى',
            
        ]);
        try{
        $class= ClassName::create([
            'name'=>$request->name,
        ]);
        

        Log::info(message:"Store Class : System  store Class with id {$class->id} successfully.");
     }
        catch(\Throwable $exception){
    
        Log::error(message:" can't Store Class : System can't  store Class ".$exception->getMessage());
        abort(500);

     }
     
        return redirect()->route('admin.classes')->with('success','تم إنشاء الفصل الدراسى');

    }
    public function edit($id)
    {
        $class = ClassName::findOrFail($id);
        return  view('classes.edit_class',compact('class'));
    }
    public function update(Request $request)
    {
        try{
            $ClassId = $request->id;
            $request->validate([
                'name'=>['required','string','max:255'],
            ],[
                'name.required' => 'من فضلك ادخل اسم الفصل الدراسى',
                
            ]);
            Log::info(message:"Update Class : System  Update Class with id {$ClassId} successfully.");
        }
        catch(\Throwable $exception){
    
            Log::error(message:" can't Update Class : System can't  Update Class ".$exception->getMessage());
            abort(500);
    
         }
       
        
        ClassName::findOrFail($ClassId)->update([
            'name'=>$request->name,
        ]);
        
        return redirect()->route('admin.classes')->with('success','Class updated Successfully');
    }
    public function delete($id)
    {
        try{
            $ClassId = ClassName::findOrFail($id);
            $ClassId->delete();
            Log::info(message:"Delete Class : System  Delete Class  successfully.");
        }
        catch(\Throwable $exception){
    
            Log::error(message:" can't Delete Class : System can't  Delete Class ".$exception->getMessage());
            abort(500);
    
         }
        
       
        return redirect()->route('admin.classes')->with('warning','تم حذف الفصل الدراسى');

    }
}
