@extends('admin.layouts.admin_layout')

@section('content')
<div class="container">
        <div class="row">
 
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h1> Chapters </h1> </div>
                    <div class="card-body">
                        <a href="{{ route('admin.chapters.create',['courseId' => $course->id]) }}" class="btn btn-success btn-sm" title="Add New Chapter">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
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
                                        <th width="145">Action</th>
                                    </tr>
                                     @foreach($chapters as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td> 
                                            <a href="{{ route('admin.chapters.edit',$item->id,$item->cours->id) }}" title="Edit chapter"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
 
                                            <form method="POST" action="{{ route('admin.chapters.destroy',$item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                 @csrf
                                                 @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete chapter" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                            <a href="{{ route('admin.lessons.index',['chapterId' => $item->id])}}"  title="Goto lesson"> <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Goto Lessons</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            <a class="btn btn-primary" href="{{ route('admin.courses.index') }}"> Back </a>
                        </div>
 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection