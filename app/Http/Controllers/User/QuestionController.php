<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Test;
use App\Models\Answers;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
   
    public function index($id)
    {
      $test = Test::find($id);
      $questions = Question::where(['test_id' => $id])->get();
      return view('user.tests.question',compact('questions','test')); 
    }

     public function checkAnswer(Request $request)
    {
      if($request->ajax()){
    $selectedAnswers = $request->input('answers');
    $questionIds = array_keys($selectedAnswers);
    $correctAnswers = Answers::whereIn('question_id', $questionIds)->pluck('correct_answer', 'question_id');
    $score = 0;
    foreach ($selectedAnswers as $questionId => $selectedAnswer) {
        $correctAnswer = $correctAnswers[$questionId] ?? null;
        if ($correctAnswer === $selectedAnswer) {
            $score++;
        }
    }
     
       return response()->json(['score' => $score]);
    }
}

}
