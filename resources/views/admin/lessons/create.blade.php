@extends('admin.layouts.admin_layout')

@section('content')
<div class="card">
  <div class="card-header">Create Page</div>
  <div class="card-body">
      
      <form action="{{ route('admin.lessons.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label>title</label></br>
        <input type="text" name="title" id="title" class="form-control"></br>
        <label>description</label></br>
        <input type="text" name="description" id="description" class="form-control"></br>
        <label>Video</label></br>
        <input type="file" name="contenu" id="contenu" class="form-control"></br>
        <label>duration</label></br>
        <input type="text" name="duration" id="duration" class="form-control"></br>
        <input type="hidden" name="chapter_id" id="chapter_id" value="{{ $chapter->id }}" class="form-control"></br>
       </br>
       <a class="btn btn-primary" href="{{ route('admin.lessons.index',['chapterId' => $chapter->id]) }}"> Back </a>
        <input type="submit" value="Save" class="btn btn-success"></br>

    </form>
   
  </div>
</div>
@endsection