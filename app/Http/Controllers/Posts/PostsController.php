<?php

namespace App\Http\Controllers\Posts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Comment;
use App\Tag;
use Auth;

/**
 * Posts Controller
 */
class PostsController extends Controller
{
    /**
     * Maximum of records by pagination
     */
    const MAX_POSTS = 10;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Query Post model for all posts
        // 1st version
        //$posts = Post::all();
        //dd($posts);

        // adding category and user
        // Query Post model for all posts
        // latest() sort by created_at desc
        // with('user') compliments the information of user, running the function user()
        // with('category') compliments the information of category, running the function category()
        // paginate() the results using the constant MAX_POSTS
        $posts = Post::latest()
                    ->with('user')
                    ->with('category')
                    ->paginate(self::MAX_POSTS);

        // show the view 'blog\index.blade.php' sending the $posts result
        return view('blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $post['title'] = 'Create your post';
        //return view('blog.create',compact('post'));

        // adding data for the category element
        // get the columns name and id to choose a category
        $cats = Category::orderBy('name')->pluck('name', 'id');
        $tags = Tag::orderBy('name')->pluck('name', 'id');

        return view('blog.create', compact('cats','post','tags'));

    }

    /**
     * Store a newly created resource in storage.
     * Linked to 'post' request method
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $valid = $request->validate([
            'category_id' => 'required|integer',
            'title' => 'required|string',
            'body' => 'required',
        ]);

        /*
        // old way
        $post = new Post();
        $post->title = $valid['title'];
        $post->slug = str_slug($valid['title']);
        $post->body = $valid['body'];
        $post->save();
        */

        // convert a string in a slug
        $valid['slug'] = str_slug($valid['title']);

        // get the user_id
        $valid['user_id'] = Auth::user()->id;

        // save the 'valid' to posts table
        $post = Post::create($valid);

        if(count($request['tags'])) {
            $post->tags()->attach($request['tags']);
        }

        //redirect to /posts but adding a "success" message 
        return redirect('/posts')->with('success','Post was added!!');

    }

    /**
     * Store a newly created Comment in Post.
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*
    public function storeComment(Request $request)
    {
        //dd($request);

        // validation
        $valid = $request->validate([
            'post_id' => 'required|integer',
            'body' => 'required|string|min:10',
        ]);

        $valid['user_id'] = Auth::user()->id;

        // sanitize the body
        $valid['body'] = e($valid['body']);

        $comment = Comment::create($valid);

        //dd($comment);

        return redirect('/posts/' . $valid['post_id'])->with('success','Comment was added!!');

    }
    */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*
    public function show($slug)
    {
        $post = Post::where('id','=',$slug)
                    ->with('comment')
                    ->first();
        return view('blog.show',compact('post'));
    }
    */

    /**
     * Display the $post using a blog.show view
     * @param  Post   $post Routing model binding
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // way without Routin Model Binding
        //$post = Post::where('slug','=',$post)->with('comment')->first();
        //dd($post);
        /*
        $post = Post::where('id','=',$slug)
                    ->with('comment')
                    ->first();
        */
        return view('blog.show',compact('post'));
    }


    /**
     * Show the form for editing the specified resource.
     * @param  Post   $post 
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // view blog.edit.blade.php
        $cats = Category::orderBy('name')->pluck('name', 'id');
        $tags = Tag::orderBy('name')->pluck('name', 'id');
        $tagsChecked = $post->tags->pluck('id');
        return view('blog.edit',compact('post','cats','tags','tagsChecked'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // validation
        $valid = $request->validate([
            'id' => 'required|integer',
            'title' => 'required|string',
            'body' => 'required'
        ]);

        // load the values to $post
        $post = Post::find($valid['id']);
        $post->title = $valid['title'];
        $post->body = $valid['body'];

        // saving the changes to Posts table
        $post->save();

        //if(count($request['tags'])) {
        if(is_array($request['tags'])) {
            $post->tags()->sync($request['tags']);
        }

        // redirect to the posts/slug
        // adding a message
        return redirect('/posts/'.$post->slug)->with('success','Post updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // delete comments
        //Comment::where('post_id',$post->id)->delete();
        $post->comments()->delete();

        // delete post_tag
        $post->tags()->detach();
        //$post->tags()->sync([]); // this delete all inclusive the tags table
        // delete post
        $post->delete();
        return redirect('/posts')->with('success','Post deleted!!');
    }
}
