<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $search = request('search');
        if ($search) {
            $posts = Posts::where('title', 'like', '%' . $search . '%')
                ->orWhere('excerpt', 'like', '%' . $search . '%')
                ->orWhere('content', 'like', '%' . $search . '%')
                ->orderBy('published_at', 'desc')
                ->with(['category'])
                ->paginate(10)
                ->withQueryString();
        } else {
            $posts = Posts::orderBy('published_at', 'desc')
                ->with(['category'])
                ->paginate(10);
        }
        $totalPosts = Posts::count();
        $publishedPosts = Posts::where('is_published', 1)->count();
        $draftPosts = Posts::where('is_published', 0)->count();
        $featuredPosts = Posts::where('is_featured', 1)->count();
        $featuredAndPublishedPosts = Posts::where('is_featured', 1)->where('is_published', 1)->count();
        return view('dashboard.posts.index', compact('posts', 'totalPosts', 'publishedPosts', 'draftPosts', 'featuredPosts', 'featuredAndPublishedPosts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $posts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posts $posts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $posts)
    {
        //
    }
}
