@extends('layouts.app')

@section('title')
Create a New Todo
@endsection

@section('content')
<h1 class="text-center">Create Todos</h1>
<div class="row justify-content-center">
  <div class="col-md-8 py-4">
    <div class="card">
      <div class="card-header">
        Create a new todo
      </div>
      <div class="card-body">
        <form action="/store-todos" method="POST">
          @csrf
          <div class="form-group">
            <input type="text" placeholder="Name" name="name" class="@error('name') is-invalid @enderror form-control">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <textarea name="description" cols="5" rows="5" placeholder="Description"
              class="@error('description') is-invalid @enderror form-control"></textarea>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group text-center">
            <button type="submit" class="btn btn-success">Create Todo</button>
          </div>
        </form>
      </div>
      </di>
    </div>
  </div>
  @endsection