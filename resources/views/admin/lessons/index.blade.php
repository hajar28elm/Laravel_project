@extends('admin.layouts.admin_layout')

@section('content')
<div class="container">
        <div class="row">
 
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h1> lessons </h1> </div>
                    <div class="card-body">
                        <a href="{{ route('admin.lessons.create',['chapterId' => $chapter->id]) }}" class="btn btn-success btn-sm" title="Add New lesson">
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
                                        <th>title</th>
                                        <th>description</th>
                                        <th>video</th>
                                        <th>duration</th>
                                        <th width="145">Action</th>
                                    </tr>
                                     @foreach($lessons as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td> <a href="{{ asset('videos/' . $item->contenu) }}">contenu</a></td>
                                        <td>{{ $item->duration }}</td>
                                        <td> 
                                            <a href="{{ route('admin.lessons.edit',$item->id,$item->chapitre->id) }}" title="Edit lesson"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
 
                                            <form method="POST" action="{{ route('admin.lessons.destroy',$item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                 @csrf
                                                 @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete lesson" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            <a class="btn btn-primary" href="{{ route('admin.chapters.index',['courseId' => $chapter->cours->id]) }}"> Back </a>
                        </div>
 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection