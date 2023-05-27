<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Courses;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Auth;

class StudentController extends Controller
{
   
    public function Form(Request $request){

        if($request->ajax()){
            $success= true;
            return response()->json(['success' => $success ]);
        }
    }
    public function index()
    {
        $profile = Student::where(['id' => Auth::user()->id])->first();
        return view('user.profile.index', compact('profile'));
    }


    public function Profile(Request $request)
    {
        $request->validate([

        ]);
        $id =  Auth::user()->id;
        $profile = Student::find($id);
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = $file->getClientOriginalName();
            $profile->img = $fileName;
        }
        $profile->update($request->all());
        $courses = Courses::all();
        $stories = Story::all();
        return view('user.dashboard',compact('courses','stories'));
    }

   
    public function stories()
    {
        $stories = Story::all();
        return view('user.stories.index',compact('stories'));
    }
}
