@extends('layouts.app')

@section('content')

      <div class="container">
          <div class="row">
          
          <!-- main content -->

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4">{{$post->title}}</h1>

        <!-- Author -->
        <p class="lead">
          by
          <a href="#">{{$post->user->name}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Posted on 
            {{$post->created_at->toDayDateTimeString()}} 
            (<em>{{$post->created_at->diffForHumans()}}</em>)
        </p>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">

        <hr>

        <!-- Post Content -->
        
        {!! $post->body !!}

        <hr>

        <!-- Posted on category -->
        <p>Related to 
            <a href="/posts/category/{{$post->category->name}}">{{$post->category->name}} </a>
        </p>

        <hr>

        <!-- tags -->
        <p>Tags
          @foreach($post->tags as $tag) 
            <a href="/posts/tag/{{$tag->name}}">{{$tag->name}} </a>&nbsp;&nbsp;
          @endforeach
        </p>

        <hr>

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
          @if(Auth::check())
            <form class="form" action="/posts/comment" method="post">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">

              <div class="form-group">
                <textarea class="form-control" rows="3" name="body" id="body">{{ old('body') }}</textarea>
                @if($errors->has('body'))
                    <span class="error text-danger">{{ $errors->first('body') }}</span>
                @endif
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          @else
            <div class="alert alert-info">
                Please <a href="/login">login</a>  to leave a comment!!
            </div>
          @endif
          </div>
        </div>
        

        @foreach($post->comments as $comment)
        <!-- Single Comment -->
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">{{ $comment->user->name }}</h5>
            {!! $comment->body !!}
          </div>
        </div>
        @endforeach

      </div>


          <!-- end main content -->          
            
            
            @include('partials.sidebar')

          </div><!-- end row -->
      </div><!-- end container -->
      



@endsection