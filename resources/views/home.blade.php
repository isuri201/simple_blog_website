@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create a new Blog') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method='post' action="{{ route('post.store') }}" enctype="multipart/form-data">
                        @if ($errors->any())
                            <div class='alert alert-danger'>
                                <ul>
                                    @foreach ($errors->all() as $error )
                                    <li>{{$error}}</li>   
                                    @endforeach
                                </ul>
                            </div>  
                        @endif
                        @csrf
  <div class="mb-3">
    <label for='title'  class="form-label">Post Title</label>
    <input type="text" class="form-control" id="title" name='title' placeholder='Enter Post Title'>
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Post Desciption</label>
    <textarea class='form-control' name='description'>Enter Post Description Here...</textarea>
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Upload an image</label>
    <input type='file' class='form-control' id='image' name='thumbnail'>
  </div>
  
  <button type="submit" class="btn btn-primary">Post</button>
</form>
              
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
