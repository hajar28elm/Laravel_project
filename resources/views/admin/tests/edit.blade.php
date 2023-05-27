@extends('admin.layouts.admin_layout')

@section('content')
<div class="card">
  <div class="card-header">Edit Page</div>
  <div class="card-body">
      
      <form action="{{ route('admin.tests.update',$test->id) }}" method="post">
        @csrf
        @method("PUT")
        <input type="hidden" name="id" id="id" value="{{$test->id}}" id="id" />
        <label>Title</label></br>
        <input type="text" name="title" id="title" value="{{$test->title}}" class="form-control"></br>
        <label>descriprtion</label></br>
        <input type="text" name="description" id="description"  value="{{$test->description}}" class="form-control"></br>
        </br>
        <input type="submit" value="Update" class="btn btn-success"></br>
        <a class="btn btn-primary" href="{{ route('admin.tests.index') }}"> Back </a>
    </form>
   
  </div>
</div>
@endsection