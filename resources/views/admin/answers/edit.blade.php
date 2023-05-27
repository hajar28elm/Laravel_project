@extends('admin.layouts.admin_layout')

@section('content')
<div class="card">
  <div class="card-header">Edit Page</div>
  <div class="card-body">
      
      <form action="{{ route('admin.answers.update',$answer->id) }}" method="post">
        @csrf
        @method("PUT")
        <input type="hidden" name="id" id="id" value="{{$answer->id}}" id="id" />
        <label>Answer 1</label></br>
        <input type="text" name="answer_text1" id="answer_text1" value="{{$answer->answer_text1}}" class="form-control"></br>
       <label>Answer 2</label></br>
        <input type="text" name="answer_text2" id="answer_text2" value="{{$answer->answer_text2}}" class="form-control"></br>
        <label>Correct Answer</label></br>
        <input type="text" name="correct_answer" id="correct_answer" value="{{$answer->correct_answer}}" class="form-control"></br>
       </br>
       <a class="btn btn-primary" href="{{ route('admin.answers.index',['questionId' => $answer->question->id]) }}"> Back </a>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  </div>
</div>
@endsection