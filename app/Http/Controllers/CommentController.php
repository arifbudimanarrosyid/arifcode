<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|string|max:255',
        ]);

        Comment::create([
            'post_id' => $request->post_id,
            'user_id' => auth()->user()->id,
            'body' => $request->body,
        ]);

        // dd($request->all());

        return back();
    }
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back()->with('success', 'Comment deleted successfully');
    }

    public function edit(Comment $comment, Post $post)
    {
        $post = Post::find($comment->post_id);
        if (auth()->user()->id == $comment->user_id || auth()->user()->is_admin == true) {
            return view('comment.edit', compact('comment', 'post'));
        }
        return back()->with('danger', 'You are not authorized to edit this comment');
    }

    public function update(Request $request, Comment $comment)
    {
        if (auth()->user()->id == $comment->user_id || auth()->user()->is_admin == true) {
            $request->validate([
                'body' => 'required|string|max:255',
            ]);

            $comment->update([
                'body' => $request->body,
            ]);

            return redirect()->route('post', $comment->post->slug)->with('success', 'Comment updated successfully');
        } else {

            return back();
        }

        // return back();
    }

    public function report(Comment $comment)
    {
        //update comment is_spam to true
        if (auth()->user()) {
            $comment->is_spam = true;
            $comment->save();
            return back()->with('success', 'Thanks for reporting this comment, Admin will check it soon.');
        }
        return back()->with('danger', 'You need to login to report this comment');
    }
}
