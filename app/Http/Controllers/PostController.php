<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $search = request('search');
        if ($search) {
            $posts = Post::where('is_published', true)
                ->where(function ($query) use ($search) {
                    $query->where('title', 'like', '%' . $search . '%')
                        ->orWhere('excerpt', 'like', '%' . $search . '%')
                        ->orWhere('content', 'like', '%' . $search . '%');
                })
                ->with(['category'])
                ->orderBy('published_at', 'desc')
                ->paginate(10)
                ->withQueryString();
        } else {
            $posts = Post::where('is_published', true)
                ->with(['category'])
                ->orderBy('published_at', 'desc')
                ->paginate(10);
        }
        // dd($posts);
        return view('posts', compact('posts'));
    }
    public function home()
    {
        $featured = Post::where('is_published', true)
            ->where('is_featured', true)
            ->with(['category'])
            ->orderBy('published_at', 'desc')
            ->limit(5)
            ->get();
        // dd($posts);
        return view('home', compact('featured'));
    }
    public function show($slug)
    {
        $post = Post::where('slug', $slug)
            ->with(['category'])
            ->where('is_published', true)
            ->firstOrFail();
        // dd($post);

        $recomendation = Post::where('is_published', true)
            ->where('slug', '!=', $slug)
            ->with(['category'])
            ->inRandomOrder()
            ->limit(2)
            ->get();
        // dd($recomendation);
        return view('post', compact('post', 'recomendation'));
    }
}
