@extends('admin.layouts.admin_layout')

@section('content')
<div class="card">
  <div class="card-header">Edit Page</div>
  <div class="card-body">
      
      <form action="{{ route('admin.events.update',$event->id) }}" method="post">
        @csrf
        @method("PUT")
        <input type="hidden" name="id" id="id" value="{{$event->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$event->name}}" class="form-control"></br>
        <label>Contenu</label></br>
        <input type="text" name="contenu" id="contenu" value="{{$event->contenu}}" class="form-control"></br>
        <label>Longcontent</label></br>
        <input type="text" name="longcontent" id="longcontent" value="{{$event->longcontent}}" class="form-control"></br>
        <label>Image</label></br>
        <input type="file" name="img" id="img"  value="{{$event->img}}" class="form-control"></br>
       </br>
        <input type="submit" value="Update" class="btn btn-success"></br>
        <a class="btn btn-primary" href="{{ route('admin.events.index') }}"> Back </a>
    </form>
   
  </div>
</div>
@endsection