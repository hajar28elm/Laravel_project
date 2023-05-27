<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\CoursesController;
use App\Models\courses;
use App\Models\Story;


class HomeController extends Controller
{
    public function index(){
        $cours = new CoursesController();
        $courses=courses::all();
        $stories=Story::all();
        return view('user.dashboard',compact('courses','stories'));
    }
}
