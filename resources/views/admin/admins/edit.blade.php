@extends('admin.layouts.admin_layout')

@section('content')
<div class="card">
  <div class="card-header">Edit Page</div>
  <div class="card-body">
      
      <form action="{{ route('admin.admins.update',$admin->id) }}" method="post">
        @csrf
        @method("PUT")
        <input type="hidden" name="id" id="id" value="{{$admin->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="nom" id="nom" value="{{$admin->nom}}" class="form-control"></br>
       <label>email</label></br>
        <input type="email" name="email" id="email" value="{{$admin->email}}" class="form-control"></br>
        <label>password</label></br>
        <input type="password" name="password" id="password" value="{{$admin->password}}" class="form-control"></br>
       </br>
        <input type="submit" value="Update" class="btn btn-success"></br>
        <a class="btn btn-primary" href="{{ route('admin.admins.index') }}"> Back </a>
    </form>
  </div>
</div>
@endsection