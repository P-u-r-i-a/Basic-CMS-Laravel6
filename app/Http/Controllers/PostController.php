<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StorePost;
use App\Http\Requests\UpdatePost;
use App\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Posts';
        $posts = Post::paginate(9);
        return view('post.index', compact(['posts','title']) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create New Post';
        $categories = Category::all();
        return view('post.create', compact(['categories','title']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->meta_description = $request->meta_description;
        $post->user_id = auth()->user()->id;
        $post->status = $request->status;

        if($request->hasFile('cover_image')){
            $path = $request->cover_image->storeAs("public/posts", Str::slug($request->title) . '.' . $request->cover_image   ->extension());
            if ($request->cover_image->isValid())
                $post->cover_image = $path;   
        }
        
        $post->save();
        $post->categories()->sync($request->categories);

        return back()->with('message','Successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // TODO show a single post
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $title = 'Edit Post';
        $categories = Category::all();
        return view('post.edit', compact(['post','categories','title'])); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePost $request, Post $post)
    {
        $post->title = $request->title;
        $post->body = $request->body;
        $post->meta_description = $request->meta_description;
        $post->status = $request->status;

        if ($request->hasFile('cover_image')) {
            $path = $request->cover_image->storeAs("public/posts", Str::slug($request->title) . '.' . $request->cover_image->extension());
            if ($request->cover_image->isValid())
                $post->cover_image = $path;
        }

        $post->save();
        $post->categories()->sync($request->categories);

        return back()->with('message', 'Successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('message', 'Successful!');
    }
}
