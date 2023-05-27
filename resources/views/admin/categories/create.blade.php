@extends('admin.layouts.admin_layout')

@section('content')
<div class="card">
  <div class="card-header">Create Page</div>
  <div class="card-body">
      
      <form action="{{ route('admin.categories.store') }}" method="post">
        @csrf
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>Logo</label></br>
        <input type="url" name="logo" id="logo" class="form-control"></br>
       </br>
        <input type="submit" value="Save" class="btn btn-success"></br>
        <a class="btn btn-primary" href="{{ route('admin.categories.index') }}"> Back </a>
    </form>
   
  </div>
</div>
@endsection