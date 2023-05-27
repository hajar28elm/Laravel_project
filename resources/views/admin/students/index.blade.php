@extends('admin.layouts.admin_layout')

@section('content')
<div class="container">
        <div class="row">
 
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h1> Students </h1> </div>
                    <div class="card-body">
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.dashboard') }}">Back </a>
                        <p> number of authentifications is : {{ count($students) }}</p>
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
                                        <th>image</th>
                                        <th>email</th>
                                        <th>password</th>
                                        <th>Autentification</th>
                                    </tr>
                                @foreach($students as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->img }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->password }}</td>
                                        <td>{{ $item->created_at }}</td>
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