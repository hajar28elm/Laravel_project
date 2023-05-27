@extends('admin.layouts.admin_layout')

@section('content')
<div class="container">
        <div class="row">
 
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h1> Contacts </h1> </div>
                    <div class="card-body">
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.dashboard') }}">Back </a>
                        <p> {{ count($contacts) }} of users contact u</p>
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
                                        <th>email</th>
                                        <th>telephone</th>
                                        <th>pays</th>
                                        <th>message</th>
                                        <th>send at</th>
                                        <th>respond</th>
                                    </tr>
                                @foreach($contacts as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->telephone }}</td>
                                        <td>{{ $item->pays }}</td>
                                        <td>{{ $item->message }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td> <a href="mailto:{{ $item->email }}" class="btn btn-primary">Send email</a> </td>
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