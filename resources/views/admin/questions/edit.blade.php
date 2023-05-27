@extends('admin.layouts.admin_layout')

@section('content')
<div class="card">
  <div class="card-header">Edit Page</div>
  <div class="card-body">
      
      <form action="{{ route('admin.questions.update',$question->id) }}" method="post">
        @csrf
        @method("PUT")
        <input type="hidden" name="id" id="id" value="{{$question->id}}" id="id" />
        <label>Question</label></br>
        <input type="text" name="question" id="question" value="{{$question->question}}" class="form-control"></br>
        </br>
       <a class="btn btn-primary" href="{{ route('admin.questions.index',['testId' => $question->test->id]) }}"> Back </a>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  </div>
</div>
@endsection