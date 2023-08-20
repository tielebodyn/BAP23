<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Group;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // store
    public function store(Request $request, Group $group, Post $post)
    {
        $request->validate([
            'comment' => ['required', 'max:255']
        ]);

        $post->comments()->create([
            'user_id' => auth()->id(),
            'post_id' => $post->id,
            'message' => $request->comment
        ]);

        return back();
    }
    // delete comment [$group, $post, $comment]
    public function destroy(Group $group, Post $post, Comment $comment)
    {
        $comment->delete();
        return back();
    }
}
