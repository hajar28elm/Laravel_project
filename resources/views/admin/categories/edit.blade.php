@extends('admin.layouts.admin_layout')

@section('content')
<div class="card">
  <div class="card-header">Edit Page</div>
  <div class="card-body">
      
      <form action="{{ route('admin.categories.update',$categorie->id) }}" method="post">
        @csrf
        @method("PUT")
        <input type="hidden" name="id" id="id" value="{{$categorie->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$categorie->name}}" class="form-control"></br>
       <label>Image</label></br>
        <input type="url" name="logo" id="logo" value="{{$categorie->logo}}" class="form-control"></br>
       </br>
        <input type="submit" value="Update" class="btn btn-success"></br>
        <a class="btn btn-primary" href="{{ route('admin.categories.index') }}"> Back </a>
    </form>
  </div>
</div>
@endsection