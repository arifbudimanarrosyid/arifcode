<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use Termwind\Components\Dd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

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
            ->orderBy('views', 'desc')
            ->limit(5)
            ->get();
        return view('home', compact('featured'));
    }
    public function show($slug)
    {
        $post = Post::where('is_published', true)
            ->where('slug', $slug)
            ->firstOrFail();

        $comments = Comment::where('post_id', $post->id)
            ->orderBy('created_at', 'asc')
            ->get();

        if (!Cookie::has('post_' . $post->slug)) {
            $post->incrementViewCount();
            Cookie::queue('post_' . $post->slug, 'true', 60 * 2);
        }

        // dd to array
        // dd($post->toArray());
        // dd($post->comments->toArray());
        $recomendations = Post::where('is_published', true)
            ->where('slug', '!=', $slug)
            ->inRandomOrder()
            ->limit(2)
            ->get();
        // dd($recomendations->toArray(), $comments->toArray(), $post->toArray());
        return view('post', compact(
            'post',
            'recomendations',
            'comments'
        ));
    }
}
