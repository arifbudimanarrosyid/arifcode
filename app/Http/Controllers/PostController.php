<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $search = request('search');
        if ($search) {
            $posts = Posts::where('title', 'like', '%' . $search . '%')
                ->orWhere('excerpt', 'like', '%' . $search . '%')
                ->orWhere('content', 'like', '%' . $search . '%')
                ->where('is_published', true)
                ->orderBy('published_at', 'desc')
                ->with(['category'])
                ->paginate(10)
                ->withQueryString();
        } else {
            $posts = Posts::where('is_published', true)
                ->with(['category'])
                ->orderBy('published_at', 'desc')
                ->with(['category'])
                ->paginate(10);
        }
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
    public function show($slug)
    {
        $post = Posts::where('slug', $slug)
            ->with(['category'])
            ->where('is_published', true)
            ->first();
        // dd($post);
        return view('post')->with('post', $post);
    }
}
