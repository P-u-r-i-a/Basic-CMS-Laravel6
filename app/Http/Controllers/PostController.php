<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
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
        $posts = Post::paginate(9);
        return view('post.index', compact('posts') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // TODO upload image
        // TODO improve slug
        // TODO improve form validation

        $request->validate([
            'title' => 'required',
            'body'  => 'required',
        ]);

        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->meta_description = $request->meta_description;
        $post->slug = Str::slug($post->title . '-' .now(), '-') . $post->id;
        $post->user_id = auth()->user()->id;
        $post->status = $request->status;

        $post->save();

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
        return view('post.edit', compact('post')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'body'  => 'required',
        ]);

        $post->title = $request->title;
        $post->body = $request->body;
        $post->meta_description = $request->meta_description;
        $post->status = $request->status;

        $post->save();

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
