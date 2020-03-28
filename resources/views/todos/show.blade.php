@extends('layouts.app')

@section('title')
Single Todo | {{$todo->name}}
@endsection

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h1 class="py-5 mx-2 text-secondary">{{$todo->name}}</h1>
      <div class="card">
        <div class="card-header">Details</div>

        <div class="card-body">
          {{$todo->description}}
        </div>
      </div>
      <div class="wrapper py-2">
        <a href="/todos/{{$todo->id}}/edit" class="btn btn-info">Edit</a>
        <a href="/todos/{{$todo->id}}/delete" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>
@endsection