@extends('admin.layouts.admin_layout')

@section('content')
<div class="card">
  <div class="card-header">Edit Page</div>
  <div class="card-body">
      
      <form action="{{ route('admin.lessons.update',$lesson->id) }}" method="post">
        @csrf
        @method("PUT")
        <input type="hidden" name="id" id="id" value="{{$lesson->id}}" id="id" />
        <label>title</label></br>
        <input type="text" name="title" id="title" value="{{$lesson->title}}" class="form-control"></br>
       <label>description</label></br>
        <input type="text" name="description" id="description" value="{{$lesson->description}}" class="form-control"></br>
        <label>Video</label></br>
        <input type="file" name="contenu" id="contenu" value="{{$lesson->contenu}}" class="form-control"></br>
        <label>duration</label></br>
        <input type="text" name="duration" id="duration" value="{{$lesson->duration}}" class="form-control"></br>
       </br>
       <a class="btn btn-primary" href="{{ route('admin.lessons.index',['chapterId' => $lesson->chapitre->id]) }}"> Back </a>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  </div>
</div>
@endsection