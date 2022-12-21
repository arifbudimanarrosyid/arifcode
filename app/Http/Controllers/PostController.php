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
            $posts = Posts::where('is_published', true)
                ->where(function ($query) use ($search) {
                    $query->where('title', 'like', '%' . $search . '%')
                        ->orWhere('excerpt', 'like', '%' . $search . '%')
                        ->orWhere('content', 'like', '%' . $search . '%');
                })
                ->with(['category'])
                ->orderBy('published_at', 'desc')
                ->paginate(10);
        } else {
            $posts = Posts::where('is_published', true)
                ->with(['category'])
                ->orderBy('published_at', 'desc')
                ->paginate(10);
        }
        // dd($posts);
        return view('posts', compact('posts'));
    }
    public function home()
    {
        $featured = Posts::where('is_published', true)
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
