<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Category;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
                ->orderBy('created_at', 'desc')
                ->with(['category'])
                ->paginate(10)
                ->withQueryString();
        } else {
            $posts = Posts::orderBy('created_at', 'desc')
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
        $categories = Category::all();
        return view('dashboard.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'thumbnail' => 'image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'required|max:255',
            'slug' => 'unique:posts|max:255',
            'category_id' => 'required',
            'excerpt' => 'required',
            'content' => 'required',
            'published_at' => 'required',
        ]);

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '.' . $thumbnail->extension();
            $thumbnail->move(public_path('storage/thumbnails'), $thumbnailName);
        } else {
            $thumbnailName = null;
        }

        // if request have slug change to lowwercase and replace space with dash
        if ($request->slug == null) {
            $slug = strtolower(str_replace(' ', '-', $request->title));
        } else {
            $slug = strtolower(str_replace(' ', '-', $request->slug));
        }


        $post = Posts::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => $slug,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'thumbnail' => $thumbnailName,
            'is_published' => $request->is_published,
            'is_featured' => $request->is_featured,
            'published_at' => $request->published_at,
        ]);
        // dd($post);

        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $posts = Posts::findOrFail($id);

        // dd($posts);
        return view('dashboard.posts.show', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Posts::findOrFail($id);
        $categories = Category::all();
        // dd($posts);
        return view('dashboard.posts.edit', compact('posts', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $posts)
    {
        $request->validate(
            [
                'thumbnail' => 'image|mimes:jpeg,png,jpg|max:2048',
                'title' => 'required|max:255',
                'slug' => 'max:255|unique:posts',
                'category_id' => 'required',
                'excerpt' => 'required',
                'content' => 'required',
                'is_published' => 'required',
                'is_featured' => 'required',
                'published_at' => 'required',
            ]
        );

        if ($request->slug == null) {
            $slug = strtolower(str_replace(' ', '-', $request->title));
        } else {
            $slug = strtolower(str_replace(' ', '-', $request->slug));
        }

        if ($request->hasFile('thumbnail')) {
            $posts = Posts::findOrFail($posts);
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '.' . $thumbnail->extension();
            $thumbnail->move(public_path('storage/thumbnails'), $thumbnailName);
            $posts->thumbnail = $thumbnailName;
            $posts->title = $request->title;
            $posts->slug = $slug;
            $posts->category_id = $request->category_id;
            $posts->excerpt = $request->excerpt;
            $posts->content = $request->content;
            $posts->is_published = $request->is_published;
            $posts->is_featured = $request->is_featured;
            $posts->published_at = $request->published_at;
            $posts->save();
            // return redirect()->route('posts.index')
            //     ->with('success', 'Post saved successfully');
            return back()->with('success', 'Post saved successfully');

        }

        $posts = Posts::findOrFail($posts);
        $posts->title = $request->title;
        $posts->slug = $slug;
        $posts->category_id = $request->category_id;
        $posts->excerpt = $request->excerpt;
        $posts->content = $request->content;
        $posts->is_published = $request->is_published;
        $posts->is_featured = $request->is_featured;
        $posts->published_at = $request->published_at;
        $posts->save();

        // dd($validatedPosts);
        // dd($posts);


        // return redirect()->route('posts.index')
        //     ->with('success', 'Post updated successfully');
        return back()->with('success', 'Post saved successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $post)
    {
        if ($post->thumbnail) {
            if (Storage::exists('public/thumbnails/' . $post->thumbnail)) {
                unlink(public_path('storage/thumbnails/' . $post->thumbnail));
            }
        }
        Posts::destroy($post->id);
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }

    public function deleteThumbnail($posts)
    {
        $posts = Posts::findOrFail($posts);
        if ($posts->thumbnail) {
            if (Storage::exists('public/thumbnails/' . $posts->thumbnail)) {
                unlink(public_path('storage/thumbnails/' . $posts->thumbnail));
            }
        }
        $posts->thumbnail = null;
        $posts->save();
        // dd($posts);
        return back()->with('success', 'Thumbnail deleted successfully');
    }
}
