@extends('admin.layouts.admin_layout')

@section('content')
<div class="card">
  <div class="card-header">Create Page</div>
  <div class="card-body">
      
      <form action="{{ route('admin.events.store') }}" method="post">
        @csrf
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>Contenu</label></br>
        <input type="text" name="contenu" id="contenu" class="form-control"></br>
        <label>Long content</label></br>
        <input type="text" name="longcontent" id="longcontent" class="form-control"></br>
        <label>Image</label></br>
        <input type="file" name="img" id="img" class="form-control"></br>
        </br>
        <input type="submit" value="Save" class="btn btn-success"></br>
        <a class="btn btn-primary" href="{{ route('admin.events.index') }}"> Back </a>
    </form>
  </div>
</div>
@endsection