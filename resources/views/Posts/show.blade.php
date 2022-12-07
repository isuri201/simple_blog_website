@extends('layouts.frontend')
@section('content')
<div class="container">

<div class="text-center card mb-5">
  <img class="card-img-top" src="{{asset('uploads/'.$post->thumbnail)}}" alt="..."  />
    <h5 class="card-header">{{$post->title}}</h5>
    <div class="card-body">
      
      <p class="card-text">{{$post->description}}</p>
     
    </div>
  </div>

@if (Route::has('post.show'))
@auth
  <h5>Drop your ideas and feedbacks</h5>
  <form method="POST" action="{{route('post.comment',$post->id) }}">
    @csrf
  <input type="text" class="form-control" name="comment" placeholder="Type your comment...">
  <button type="submit" class="btn btn-primary btn-sm mt-3 mb-5" value="comment" >Submit</button> 
</form>
@endauth
@endif
@foreach ($Comments as $comment)
<div class="alert alert-secondary">
  <h6>{{$comment->user->name}}</h6>
  <div style="font-size: 10px" >{{$comment->created_at}}</div>
  <div>{{$comment->comment}}</div>
</div>
@endforeach
</div>
@endsection