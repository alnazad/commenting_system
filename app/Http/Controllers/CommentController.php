<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate(['comment' => 'required']);

    $post->comments()->create([
        'comment' => $request->comment,
        // 'user_id' => auth()->id(),
    ]);

    return redirect()->route('posts.index');
    }

    public function update(Request $request, Comment $comment)
    {
        $this->authorize('update', $comment);

        $comment->update($request->only('comment'));
        return back();
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();
        return back();
    }
}
