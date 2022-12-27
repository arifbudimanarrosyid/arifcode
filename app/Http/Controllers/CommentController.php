<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

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

        return back();
    }

    public function edit(Comment $comment)
    {
        if (auth()->user()->id == $comment->user_id || auth()->user()->is_admin == true) {
            return view('comment.edit', compact('comment'));
        }
        return back();
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

            return redirect()->route('post', $comment->post->slug);
        } else {

            return back();
        }

        // return back();
    }
}
