@extends('admin.layouts.admin_layout')

@section('content')
<div class="container">
        <div class="row">
 
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h1> Questions </h1> </div>
                    <div class="card-body">
                        <a href="{{ route('admin.questions.create',['testId' => $test->id]) }}" class="btn btn-success btn-sm" title="Add New Question">
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
                                        <th>Question</th>
                                        <th width="145">Action</th>
                                    </tr>
                                     @foreach($questions as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->question }}</td>
                                        <td> 
                                            <a href="{{ route('admin.questions.edit',$item->id,$item->test->id) }}" title="Edit question"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
 
                                            <form method="POST" action="{{ route('admin.questions.destroy',$item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                 @csrf
                                                 @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete question" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                            <a href="{{ route('admin.answers.index',['questionId' => $item->id])}}"  title="Goto answer"> <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Goto Answer</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            <a class="btn btn-primary" href="{{ route('admin.tests.index') }}"> Back </a>
                        </div>
 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection