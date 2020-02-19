{{-- Partial to show the actions / buttons based on role --}}

@if(Auth::check())
            <p>
                <a href="/posts/edit/{{ $post->slug }}" class="btn btn-secondary">Edit</a>
                &nbsp;
                <form action="/posts/delete/{{ $post->slug }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>                
            </p>
@endif
