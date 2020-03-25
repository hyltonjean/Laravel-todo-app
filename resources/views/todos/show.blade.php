@extends('layouts.app')

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
    </div>
  </div>
</div>
@endsection