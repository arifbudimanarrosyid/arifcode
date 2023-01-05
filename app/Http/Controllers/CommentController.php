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
        if (Auth::check()) {
            $request->validate([
                'body' => 'required|string|max:255',
            ]);
            Comment::create([
                'post_id' => $request->post_id,
                'user_id' => auth()->user()->id,
                'body' => $request->body,
            ]);
            return back()->with('success', 'Comment created successfully.');
        }
        return redirect()->route('login');
    }
    public function destroy(Comment $comment)
    {
        if (Auth::check()) {
            if (auth()->user()->id == $comment->user_id) {
                $comment->delete();
                return back()->with('success', 'Comment deleted successfully.');
            } elseif (auth()->user()->is_admin == true) {
                $comment->delete();
                return back()->with('success', 'Comment deleted successfully as Admin.');
            }
            return back()->with('danger', 'You are not authorized to delete this comment.');
        }
        return back()->with('danger', 'You are not authorized to delete this comment.');
    }


    public function update(Request $request, Comment $comment)
    {
        if (Auth::check()) {
            if (auth()->user()->id == $comment->user_id) {
                $request->validate([
                    'body' => 'required|string|max:255'
                ]);
                $comment->body = $request->body;
                $comment->save();
                return redirect()->route('post', $comment->post->slug)->with('success', 'Comment updated successfully.');
            } elseif (auth()->user()->is_admin == true) {
                $request->validate([
                    'body' => 'required|string|max:255'
                ]);
                $comment->timestamps = false;
                $comment->body = $request->body;
                $comment->save();
                return redirect()->route('post', $comment->post->slug)->with('success', 'Comment updated successfully as Admin');
            }
            return back()->with('danger', 'You are not authorized to update this comment.');
        } else {
            return back()->with('danger', 'You are not authorized to update this comment.');
        }
    }

    public function report(Comment $comment)
    {
        if (Auth::check()) {
            $comment->timestamps = false;
            $comment->incrementSpamCount();
            $comment->is_spam = true;
            $comment->save();
            return back()->with('success', 'Thanks for reporting this comment, Admin will check it soon.');
        }
        return redirect()->route('login');
    }

    public function undoReport(Comment $comment)
    {
        if (Auth::check() && auth()->user()->is_admin == true) {
            $comment->timestamps = false;
            $comment->spam_count = 0;
            $comment->is_spam = false;
            $comment->save();
            return back()->with('success', 'Comment report undone successfully.');
        }
        return back()->with('danger', 'You are not authorized to undo this report.');
    }
}
