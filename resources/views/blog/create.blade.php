@extends('layouts.app')

@section('content')

<!--<div class="row">-->
      <div class="col">
        <div class="card">
          <div class="card-img-left d-none d-md-flex">
             <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body">
            
            <h5 class="card-title text-center">New Post</h5>

            @include('partials.errors')

            <form class="form" action="/posts" method="post">
              @csrf
              <div class="form-label-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" placeholder="Title" autofocus 
                       value="{{ old('title') }}" />
                @if($errors->has('title'))
                <span class="error text-danger">{{ $errors->first('title') }}</span>
                @endif
              </div>

              <div class="form-label-group">
                <label for="body">Body</label>
                <textarea name="body" id="body" cols="30" rows="10"  class="form-control">{{ old('body') }}</textarea>
                @if($errors->has('body'))
                <span class="error text-danger">{{ $errors->first('body') }}</span>
                @endif
              </div>

              <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" class="form-control">
                  <option value="">Select a category</option>
                  @foreach($cats as $key => $value)
                    <option value="{{ $key }}" 
                    {{ ($key == old('category_id')) ? 'selected' : '' }}
                    >{{ $value }}</option>
                  @endforeach
                </select>
                  @if($errors->has('body'))
                <span class="error text-danger">{{ $errors->first('body') }}</span>
                @endif
              </div>

              <div class="form-group">
                <label for="tags">Tags</label><br/>
                    
                  @foreach($tags as $key => $value)
                    @php
                        $taglist = old('tags',[]);
                        if(in_array($key, $taglist)) {
                            $checked = 'checked';
                        } else {
                            $checked = '';
                        }
                    @endphp
                    <label class="checkbox-inline">
                      <input type="checkbox" class="checkbox" name="tags[]" value="{{ $key }}" {{ $checked }}>&nbsp;{{ $value }} &nbsp;
                    </label>

                  @endforeach

              </div>
              
              <hr>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Create</button>
            </form>
          </div>
        </div>
      </div>
<!--    </div>-->


@endsection