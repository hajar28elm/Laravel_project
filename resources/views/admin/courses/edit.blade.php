@extends('admin.layouts.admin_layout')

@section('content')
<div class="card">
  <div class="card-header">Edit Page</div>
  <div class="card-body">
      
      <form action="{{ route('admin.courses.update',$course->id) }}" method="post">
        @csrf
        @method("PUT")
        <input type="hidden" name="id" id="id" value="{{$course->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="nom" id="nom" value="{{$course->nom}}" class="form-control"></br>
        <label>descriprtion</label></br>
        <input type="text" name="description" id="description"  value="{{$course->description}}" class="form-control"></br>
        <label>longdescription</label></br>
        <input type="text" name="longdescription" id="longdescription" value="{{$course->description}}"  class="form-control"></br>
        <label>prix</label></br>
        <input type="text" name="prix" id="prix" value="{{$course->prix}}" class="form-control"></br>
        <label>solde</label></br>
        <input type="text" name="solde" id="solde" value="{{$course->solde}}" class="form-control"></br>
        <label>category_id</label></br>
        <input type="text" name="category_id" id="category_id" value="{{$course->category_id}}" class="form-control"></br>
       <label>image</label></br>
        <input type="url" name="logo" id="logo" value="{{$course->logo}}" class="form-control"></br>
       </br>
        <input type="submit" value="Update" class="btn btn-success"></br>
        <a class="btn btn-primary" href="{{ route('admin.courses.index') }}"> Back </a>
    </form>
   
  </div>
</div>
@endsection