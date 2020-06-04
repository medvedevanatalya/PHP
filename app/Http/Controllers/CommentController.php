<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $comment['user_id'] = $request->user()->id;
        $comment['post_id'] = $request->input('post_id');
        $comment['comment'] = $request->input('comment');
        Comment::create($comment);

        $post = Post::find($comment['post_id']);

        return redirect()->route('posts.show', compact('post'));
    }

    public function show(Comment $comment)
    {
        //
    }

    public function edit(Comment $comment)
    {
        //
    }

    public function update(Request $request, Comment $comment)
    {
        //
    }

    public function destroy(Comment $comment)
    {
        $post = Post::find($comment->post_id);
        $comment->delete();

        return redirect()->route('posts.show', $post);
    }
}
