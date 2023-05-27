@extends('admin.layouts.admin_layout')
@section('content')
<div class="card">
  <div class="card-header">Create Page</div>
  <div class="card-body">
      
      <form action="{{ route('admin.tests.store') }}" method="post">
        @csrf
        <label>Title</label></br>
        <input type="text" name="title" id="title" class="form-control"></br>
        <label>Descriprtion</label></br>
        <input type="text" name="description" id="description" class="form-control"></br>
       </br>
        <input type="submit" value="Save" class="btn btn-success"></br>
        <a class="btn btn-primary" href="{{ route('admin.tests.index') }}"> Back </a>
    </form>
   
  </div>
</div>
@endsection