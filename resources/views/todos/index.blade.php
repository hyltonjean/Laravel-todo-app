@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header text-center">Todos</div>

        <div class="card-body" style="padding:0px !important">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          <ul class="list-group">
            @foreach($todos as $todo)
            <li class="list-group-item text-center text-secondary">
              {{$todo->name}}
              <a href="todos/{{$todo->id}}" class="btn btn-primary btn-sm float-right">View</a>
            </li>
            @endforeach
          </ul>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection