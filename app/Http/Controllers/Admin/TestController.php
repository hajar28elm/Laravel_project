<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $tests = Test::all();

        return view('admin.tests.index',compact('tests'));
    }

    public function create()
    {
        return view('admin.tests.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        Test::create($request->all());
        return redirect()->route('admin.tests.index')
          ->with('success','Test created successfully');
    }

    public function edit(Test $test)
    {
        return view('admin.tests.edit',compact('test'));
    }

    public function update(Request $request,Test $test)
    {
        $request->validate([

        ]);
        $test->update($request->all());
        return redirect()->route('admin.tests.index')
             ->with('success','Test updated successfully');

    }
    public function destroy(Test $test)
    {
        $test->delete();
        return redirect()->route('admin.tests.index')
             ->with('success','Test deleted successfully');
    }
}
