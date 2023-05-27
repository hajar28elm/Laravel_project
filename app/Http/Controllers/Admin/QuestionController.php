<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
  
    public function index($testId)
    {
        $test = Test::findOrFail($testId);
        $questions = $test->questions;
        return view('admin.questions.index',compact('questions','test'));
    }

    public function create($testId)
    {
        $test = Test::find($testId);
        return view('admin.questions.create',compact('test'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'test_id' => 'required',
        ]);
        Question::create($request->all());
        return redirect()->route('admin.questions.index',['testId' => $request->test_id])
          ->with('success','Question created successfully');
    }

    public function show(Question $question)
    {
       
    }

    public function edit(Question $question)
    {
        return view('admin.questions.edit',compact('question'));
    }

    public function update(Request $request, Question $question)
    {
         $request->validate([

        ]);
        $question->update($request->all());
        return redirect()->route('admin.questions.index',['testId' => $question->test_id])
             ->with('success','Question updated successfully');
    }

    public function destroy(Question $question)
    {
        $id=$question->test_id;
        $question->delete();
        return redirect()->route('admin.questions.index',['testId' => $id])
             ->with('success','Question deleted successfully');
    }
}
