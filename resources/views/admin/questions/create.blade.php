@extends('admin.layouts.admin_layout')

@section('content')
<div class="card">
  <div class="card-header">Create Page</div>
  <div class="card-body">
      
      <form action="{{ route('admin.questions.store') }}" method="post">
        @csrf
        <label>Question</label></br>
        <input type="text" name="question" id="question" class="form-control"></br>
        <input type="hidden" name="test_id" id="test_id" value="{{ $test->id }}" class="form-control"></br>
       </br>
       <a class="btn btn-primary" href="{{ route('admin.questions.index',['testId' => $test->id]) }}"> Back </a>
        <input type="submit" value="Save" class="btn btn-success"></br>
</form>
  </div>
</div>
@endsection