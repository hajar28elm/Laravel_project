@extends('admin.layouts.admin_layout')

@section('content')
<div class="container">
        <div class="row">
 
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h1> Courses </h1> </div>
                    <div class="card-body">
                        <a href="{{ route('admin.courses.create') }}" class="btn btn-success btn-sm" title="Add New Course">
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
                                        <th>description</th>
                                        <th>longdescription</th>
                                        <th>prix</th>
                                        <th>solde</th>
                                        <th>categoriy_id</th>
                                        <th width="145">Action</th>
                                    </tr>
                                @foreach($courses as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nom }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->longdescription }}</td>
                                        <td>{{ $item->prix }}</td>
                                        <td>{{ $item->solde }}</td>
                                        <td>{{ $item->category_id }}</td>
                                        <td> 
                                            <a href="{{ route('admin.courses.edit',$item->id) }}" title="Edit course"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
 
                                            <form method="POST" action="{{ route('admin.courses.destroy',$item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                 @csrf
                                                 @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete course" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                            <a href="{{ route('admin.chapters.index',['courseId' => $item->id])}}"  title="Goto chapters"> <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Goto chapters</button></a>
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