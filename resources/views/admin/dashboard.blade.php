@extends('admin.layouts.admin_layout')

@section('content')
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="admin/dashboard">dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.courses.index') }}">courses</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.categories.index') }}">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.students.index') }}">Students</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.contacts.index') }}">Contacts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.events.index') }}">Events</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.tests.index') }}">Tests</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

@endsection