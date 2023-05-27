@extends('admin.layouts.admin_layout')

@section('content')
<div class="container">
        <div class="row">
 
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h1> Answer </h1> </div>
                    <div class="card-body">
                        <a href="{{ route('admin.answers.create',['questionId' => $question->id]) }}" class="btn btn-success btn-sm" title="Add New answer">
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
                        @if ($answer)
                            <table class="table" border="3">
                                    <tr>
                                        <th>id</th>
                                        <th>Answer 1</th>
                                        <th>Answer 2</th>
                                        <th>Correct Answer</th>
                                        <th width="145">Action</th>
                                    </tr>
                                    <tr>
                                        <td>{{ $answer->id }}</td>
                                        <td>{{ $answer->answer_text1 }}</td>
                                        <td>{{ $answer->answer_text2 }}</td>
                                        <td>{{ $answer->correct_answer }}</td>
                                        <td> 
                                            <a href="{{ route('admin.answers.edit',$answer->id,$answer->question->id) }}" title="Edit answer"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
 
                                            <form method="POST" action="{{ route('admin.answers.destroy',$answer->id) }}" accept-charset="UTF-8" style="display:inline">
                                                 @csrf
                                                 @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete answer" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                            
                                        </td>
                                    </tr>
                            </table>
                            <a class="btn btn-primary" href="{{ route('admin.questions.index',['testId' => $question->test->id]) }}"> Back </a>
                            @else
                                <p>No answer available for this question.</p>
                            @endif
                        </div>
 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection