@extends('layouts.frontend')
@section('content')

<div class="text-center card mb-5">
    <h5 class="card-header">{{$post->title}}</h5>
    <div class="card-body">
      
      <p class="card-text">{{$post->description}}</p>
     
    </div>
  </div>


@endsection