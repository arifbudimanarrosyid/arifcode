<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Posts::where('is_published', true)
            ->with(['category'])
            ->orderBy('published_at', 'desc')
            ->paginate(10);
        // dd($posts);
        return view('posts')->with('posts', $posts);
    }
    public function home()
    {
        $featured = Posts::where('is_published', true)
            ->where('is_featured', true)
            ->with(['category'])
            ->orderBy('published_at', 'desc')
            ->get();
        // dd($posts);
        return view('home')->with('featured', $featured);
    }
}
