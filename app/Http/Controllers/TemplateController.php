<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CoursesController;
use App\Models\courses;
use App\Models\Story;


class TemplateController extends Controller
{
    public function index(){
        $cours = new CoursesController();
        $courses=courses::all();
        $stories=Story::all();
        return view('Frontend.index',compact('courses','stories'));
    }

    public function search(Request $request)
     {
      $query = $request->input('query');
      $courses = courses::where('nom', 'like', '%'.$query.'%')->get();
      return response()->json(['courses' => $courses]);
}

}
