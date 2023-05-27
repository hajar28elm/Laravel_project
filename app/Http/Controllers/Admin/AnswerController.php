<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answers;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    
    public function index($questionId)
    {
        $question = Question::findOrFail($questionId);
        $answer = Answers::where(['question_id' => $question->id])->first();
        return view('admin.answers.index',compact('answer','question'));
    }

   
    public function create($questionId)
    {
        $question = Question::find($questionId);
        return view('admin.answers.create',compact('question'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'answer_text1' => 'required',
            'answer_text2' => 'required',
            'correct_answer' => 'required',
            'question_id' => 'required',
        ]);
        Answers::create($request->all()); 

        return redirect()->route('admin.answers.index',['questionId' => $request->question_id])
          ->with('success','Answer created successfully');
    }

    public function edit(Answers $answer)
    {
        return view('admin.answers.edit',compact('answer'));
    }

    
    public function update(Request $request, Answers $answer)
    {
        $request->validate([

        ]);
        
        $answer->update($request->all());
        return redirect()->route('admin.answers.index',['questionId' => $answer->question_id])
             ->with('success','Answer updated successfully'); 
    }

   
    public function destroy(Answers $answer)
    {
        $id=$answer->question_id;
        $answer->delete();
        return redirect()->route('admin.answers.index',['questionId' => $id])
             ->with('success','Answer deleted successfully'); 
    }
}
