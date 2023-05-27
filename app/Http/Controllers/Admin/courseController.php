<?php

namespace App\Http\Controllers\admin;
use App\Models\Courses;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class courseController extends Controller
{
    public function index()
    {
        $courses = courses::all();

        return view('admin.courses.index',compact('courses'));
    }
    
    public function create()
    {
        return view('admin.courses.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'logo' => 'required',
            'description' => 'required',
            'longdescription' => 'required',
            'prix' => 'required',
            'solde' => 'required',
            'category_id' => 'required',
        ]);
        Courses::create($request->all());
        return redirect()->route('admin.courses.index')
          ->with('success','Course created successfully');
    }

    
    public function show(Courses $course)
    {
        return view('admin.courses.show',compact('course'));
    }

   
    public function edit(Courses $course)
    {
        return view('admin.courses.edit',compact('course'));
    }

    
    public function update(Request $request,Courses $course)
    {
        $request->validate([

        ]);
        $course->update($request->all());
        return redirect()->route('admin.courses.index')
             ->with('success','Course updated successfully');

    }
    
    public function destroy(Courses $course)
    {
        $course->delete();
        return redirect()->route('admin.courses.index')
             ->with('success','Course deleted successfully');
    }
}
