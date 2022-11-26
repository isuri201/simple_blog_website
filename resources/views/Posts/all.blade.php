@extends('layouts.app')
@section('content')
<div class="container">
<table class="table table-striped text-center">
    <thead class="table-info ">
      <tr>
        <th scope="col">count</th>
        <th scope="col">Title</th>
        <th scope="col">Created Date</th>
        <th scope="col" colspan="3">Action</th>

      </tr>
    </thead>
    <tbody>
        @php
        $count=0;
        @endphp
        @foreach($posts as $post)
        @php
        $count+=1;
        @endphp
      <tr>
        <td >{{$count}}</td>
        <td>{{$post->title}}</td>
        <td>{{$post->created_at}}</td>
        <td><a href="{{route('post.show', $post->id)}}" class='btn btn-info' >View</a></td>
        <td><a href="{{route('post.edit', $post->id)}}" class='btn btn-success' >Edit</a></td>
        <td><a href="{{route('post.delete', $post->id)}}" class='btn btn-danger' >Delete</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection