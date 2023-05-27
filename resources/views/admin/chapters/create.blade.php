@extends('admin.layouts.admin_layout')

@section('content')
<div class="card">
  <div class="card-header">Create Page</div>
  <div class="card-body">
      
      <form action="{{ route('admin.chapters.store') }}" method="post">
        @csrf
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>description</label></br>
        <input type="text" name="description" id="description" class="form-control"></br>
        <input type="hidden" name="courses_id" id="courses_id" value="{{ $course->id }}" class="form-control"></br>
       </br>
       <a class="btn btn-primary" href="{{ route('admin.chapters.index',['courseId' => $course->id]) }}"> Back </a>
        <input type="submit" value="Save" class="btn btn-success"></br>

    </form>
   
  </div>
</div>
@endsection