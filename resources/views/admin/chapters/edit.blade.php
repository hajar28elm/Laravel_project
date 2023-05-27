@extends('admin.layouts.admin_layout')

@section('content')
<div class="card">
  <div class="card-header">Edit Page</div>
  <div class="card-body">
      
      <form action="{{ route('admin.chapters.update',$chapter->id) }}" method="post">
        @csrf
        @method("PUT")
        <input type="hidden" name="id" id="id" value="{{$chapter->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$chapter->name}}" class="form-control"></br>
       <label>description</label></br>
        <input type="text" name="description" id="description" value="{{$chapter->description}}" class="form-control"></br>
       </br>
       <a class="btn btn-primary" href="{{ route('admin.chapters.index',['courseId' => $chapter->cours->id]) }}"> Back </a>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  </div>
</div>
@endsection