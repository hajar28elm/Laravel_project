<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    
    public function index()
    {
        $tests = Test::all();
        return view('user.tests.index',compact('tests'));
    }
}
