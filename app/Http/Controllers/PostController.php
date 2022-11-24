<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        return view('posts', compact('posts'));
    }
    public function home()
    {
        $featured = Posts::where('is_published', true)
            ->where('is_featured', true)
            ->with(['category'])
            ->orderBy('published_at', 'desc')
            ->get();
        // dd($posts);
        return view('home', compact('featured'));
    }
    public function show($slug)
    {
        $post = Posts::where('slug', $slug)
            ->with(['category'])
            ->where('is_published', true)
            ->firstOrFail();
        // dd($post);

        $recomendation = Posts::where('is_published', true)
            ->where('slug', '!=', $slug)
            ->with(['category'])
            ->inRandomOrder()
            ->limit(2)
            ->get();
        // dd($recomendation);
        return view('post', compact('post', 'recomendation'));
    }
}
