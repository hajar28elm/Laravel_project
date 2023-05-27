@extends('admin.layouts.admin_layout')

@section('content')
<div class="card">
  <div class="card-header">Create Page</div>
  <div class="card-body">
      
      <form action="{{ route('admin.answers.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label>Answer 1</label></br>
        <input type="text" name="answer_text1" id="answer_text1" class="form-control"></br>
        <label>Answer 2</label></br>
        <input type="text" name="answer_text2" id="answer_text2" class="form-control"></br>
        <label>Correct Answer</label></br>
        <input type="text" name="correct_answer" id="correct_answer" class="form-control"></br>
        <input type="hidden" name="question_id" id="question_id" value="{{ $question->id }}" class="form-control"></br>
       </br>
       <a class="btn btn-primary" href="{{ route('admin.answers.index',['questionId' => $question->id]) }}"> Back </a>
        <input type="submit" value="Save" class="btn btn-success"></br>

    </form>
   
  </div>
</div>
@endsection