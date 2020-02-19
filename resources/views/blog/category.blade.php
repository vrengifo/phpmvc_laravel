@extends('layouts.app')

@section('content')

      <div class="container">
        <div class="row">
        
      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="my-4">Page Heading
          <small>Secondary Text</small>
        </h1>

        @foreach($posts as $post)

        <!-- Blog Post -->
        <div class="card mb-4">
          <!--<img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">-->
          <div class="card-body">
            <h2 class="card-title">{{ $post->title }}</h2>
            <p><span>Posted in: <a href="/posts/category/{{ $post->category->name }}">{{ $post->category->name }}</a></span></p>

            <p>
              <span>Tags: </span>
              @foreach($post->tags as $tag)
                <a href="/posts/tag/{{ $tag->name }}">{{ $tag->name }}</a>
              @endforeach
            </p>
            
            @include('partials.blog.actions')

            <!--<p class="card-text">{!! $post->body !!}</p>-->
            <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Posted on {{ $post->created_at->diffForHumans() }} by
            <a href="#">{{ $post->user->name }}</a>
          </div>
        </div>

        @endforeach

        <!-- Pagination -->
        {!! $posts->links() !!}

      </div>          
          
          @include('partials.sidebar')
        
        </div> <!-- end row -->
      </div>


@endsection