@extends('admin.layouts.admin_layout')

@section('content')
<div class="card">
  <div class="card-header">Create Page</div>
  <div class="card-body">
      
      <form action="{{ route('admin.admins.store') }}" method="post">
        @csrf
        <label>Name</label></br>
        <input type="text" name="nom" id="nom" class="form-control"></br>
        <label>email</label></br>
        <input type="email" name="email" id="email" class="form-control"></br>
        </br>
        <label>password</label></br>
        <input type="password" name="password" id="password" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
        <a class="btn btn-primary" href="{{ route('admin.admins.index') }}"> Back </a>
    </form>
   
  </div>
</div>
@endsection