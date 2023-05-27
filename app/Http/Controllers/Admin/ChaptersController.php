<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Courses;

class ChaptersController extends Controller
{
    public function index($courseId)
    {
        $course = Courses::findOrFail($courseId);
        $chapters = $course->chapitres;
        return view('admin.chapters.index',compact('chapters','course'));
    }
    public function create($courseId)
    {
        $course = Courses::find($courseId);
        return view('admin.chapters.create',compact('course'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'courses_id' => 'required',
        ]);
        Chapter::create($request->all());
        return redirect()->route('admin.chapters.index',['courseId' => $request->courses_id])
          ->with('success','Chapter created successfully');
    }

    public function edit(Chapter $chapter)
    {
        return view('admin.chapters.edit',compact('chapter'));
    }

    public function update(Request $request,Chapter $chapter)
    {
        $request->validate([

        ]);
        $chapter->update($request->all());
        return redirect()->route('admin.chapters.index',['courseId' => $chapter->courses_id])
             ->with('success','Chapter updated successfully');

    }
    public function destroy(Chapter $chapter)
    {   
        $id=$chapter->courses_id;
        $chapter->delete();
        return redirect()->route('admin.chapters.index',['courseId' => $id])
             ->with('success','Chapter deleted successfully');
    } 
}
