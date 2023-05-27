@extends('admin.layouts.admin_layout')

@section('content')
<div class="card">
  <div class="card-header">Create Page</div>
  <div class="card-body">
      
      <form action="{{ route('admin.courses.store') }}" method="post">
        @csrf
        <label>Name</label></br>
        <input type="text" name="nom" id="nom" class="form-control"></br>
        <label>descriprtion</label></br>
        <input type="text" name="description" id="description" class="form-control"></br>
        <label>longdescription</label></br>
        <input type="text" name="longdescription" id="longdescription" class="form-control"></br>
        <label>prix</label></br>
        <input type="text" name="prix" id="prix" class="form-control"></br>
        <label>solde</label></br>
        <input type="text" name="solde" id="solde" class="form-control"></br>
        <label>category_id</label></br>
        <input type="text" name="category_id" id="category_id" class="form-control"></br>
       </br>
       <label>image</label></br>
        <input type="url" name="logo" id="logo" class="form-control"></br>
       </br>
        <input type="submit" value="Save" class="btn btn-success"></br>
        <a class="btn btn-primary" href="{{ route('admin.courses.index') }}"> Back </a>
    </form>
   
  </div>
</div>
@endsection