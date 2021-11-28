<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Comment;
use App\Models\Task;
use App\Models\Post;
use DateTime;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Post.index', ['topics' => Topic::all(), 'posts' => Post::all()]);
    }


    public function create()
    {
        return view('Post.create', ['topics' => Topic::all()]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'message' => 'required|string',
            'topic' => 'required|integer',
            'author' => 'required|integer',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'message' => $request->message,
            'topic' => $request->topic,
            'author' => $request->author
        ]);

        Task::create([
            'post' => $post->id,
            'question' => $request->question,
            'answer1' => $request->answer1,
            'answer2' => $request->answer2,
            'answer3' => $request->answer3
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($postId)
    {
        return view('post.post', ['post' => Post::find($postId), 'comments' => Comment::where('post',$postId)->get(), 'task' => Task::where('post',$postId)->first()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($postId)
    {
        return view('post.edit', ['post' => Post::find($postId)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        $request->validate([
            'title' => 'required|string',
            'message' => 'required|string'
        ]);



        $post = Post::find($request->id);
        if ($post == null) return abort(404);

        $post->title = $request->title;
        $post->message = $request->message;

        $post->save();

        return redirect()->route('post.show', ['postId' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Post::find($request->id)->delete();
        return redirect()->route('post.index');
    }
}
