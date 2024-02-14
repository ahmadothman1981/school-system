<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classes;

class ClassesController extends Controller
{
    public function AllClasses()
    {
        $classes = Classes::all();

        return view('admin.classes',compact('classes'));
    }
    public function create()
    {
        return view('classes.class_create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required','string','max:255'],
        ]);

        $class= Classes::create([
            'name'=>$request->name,
        ]);

        return redirect()->route('admin.classes');

    }
    public function edit($id)
    {
        $class = Classes::findOrFail($id);
        return  view('classes.edit_class',compact('class'));
    }
    public function update(Request $request)
    {
        $ClassId = $request->id;
        Classes::findOrFail($ClassId)->update([
            'name'=>$request->name,
        ]);
        return redirect()->route('admin.classes');
    }
    public function delete($id)
    {
        $ClassId = Classes::findOrFail($id);
        $ClassId->delete();
        return redirect()->route('admin.classes');

    }
}
