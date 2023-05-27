@extends('admin.layouts.admin_layout')

@section('content')
<div class="container">
        <div class="row">
 
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h1> Categories </h1> </div>
                    <div class="card-body">
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-success btn-sm" title="Add New Category">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.dashboard') }}"> Back </a>
                        <br/>
                        <br/>
                        @if ($message = Session::get('success'))
                          <div class="alert alert-success">
                             <p> {{ $message }} </p>
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table" border="3">
                                    <tr>
                                        <th>id</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th width="145">Action</th>
                                    </tr>
                                @foreach($categories as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->logo }}</td>
                                        <td> 
                                            <a href="{{ route('admin.categories.edit',$item->id) }}" title="Edit category"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
 
                                            <form method="POST" action="{{ route('admin.categories.destroy',$item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                 @csrf
                                                 @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete category" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection