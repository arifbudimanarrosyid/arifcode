<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Posts;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
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
            $posts = Post::where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('excerpt', 'like', '%' . $search . '%')
                    ->orWhere('content', 'like', '%' . $search . '%');
            })
                ->with(['category'])
                ->orderBy('created_at', 'desc')
                ->paginate(10)
                ->withQueryString();
        } else {
            $posts = Post::orderBy('created_at', 'desc')
                ->with(['category'])
                ->paginate(10);
        }
        $reportedComments = Comment::where('is_spam', 1)->count();
        $totalPosts = Post::count();
        $publishedPosts = Post::where('is_published', 1)->count();
        $draftPosts = Post::where('is_published', 0)->count();
        $featuredPosts = Post::where('is_featured', 1)->count();
        $featuredAndPublishedPosts = Post::where('is_featured', 1)->where('is_published', 1)->count();
        // dd($posts->toArray());
        return view('dashboard.posts.index', compact(
            'posts',
            'totalPosts',
            'publishedPosts',
            'draftPosts',
            'featuredPosts',
            'featuredAndPublishedPosts',
            'reportedComments'
        ));
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


        $post = Post::create([
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
        $posts = Post::findOrFail($id);

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
        $posts = Post::findOrFail($id);
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
    public function update(Request $request, Post $post)
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
            // $posts = Post::findOrFail($posts);
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '.' . $thumbnail->extension();
            $thumbnail->move(public_path('storage/thumbnails'), $thumbnailName);

            $post->update(
                [
                    'title' => $request->title,
                    'slug' => $slug,
                    'category_id' => $request->category_id,
                    'excerpt' => $request->excerpt,
                    'content' => $request->content,
                    'thumbnail' => $thumbnailName,
                    'is_published' => $request->is_published,
                    'is_featured' => $request->is_featured,
                    'published_at' => $request->published_at,
                ]
            );

            return back()->with('success', 'Post saved successfully with thumbnail');
        }

        $post->update(
            [
                'title' => $request->title,
                'slug' => $slug,
                'category_id' => $request->category_id,
                'excerpt' => $request->excerpt,
                'content' => $request->content,
                'is_published' => $request->is_published,
                'is_featured' => $request->is_featured,
                'published_at' => $request->published_at,
            ]

        );
        return back()->with('success', 'Post saved successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->thumbnail) {
            if (Storage::exists('public/thumbnails/' . $post->thumbnail)) {
                unlink(public_path('storage/thumbnails/' . $post->thumbnail));
            }
        }

        if (preg_match_all('/<img[^>]+>/i', $post->content, $result)) {
            foreach ($result[0] as $img) {
                preg_match('/src="([^"]+)/i', $img, $imgUrl);
                $url = str_replace('src="', '', $imgUrl[0]);
                if (Storage::exists('public/posts/' . basename($url))) {
                    unlink(public_path('storage/posts/' . basename($url)));
                }
            }
        }
        // if (preg_match_all('/<img[^>]+>/i', $post->content, $result)) {
        //     foreach ($result[0] as $img) {
        //         preg_match('/src="([^"]+)/i', $img, $imgUrl);
        //         $url = str_replace('src="', '', $imgUrl[0]);
        //         if (Storage::exists('public/posts/' . basename($url))) {
        //             unlink(public_path('storage/posts/' . basename($url)));
        //         }
        //     }
        // }

        Post::destroy($post->id);
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }

    public function deleteThumbnail($posts)
    {
        $posts = Post::findOrFail($posts);
        if ($posts->thumbnail) {
            if (Storage::exists('public/thumbnails/' . $posts->thumbnail)) {
                unlink(public_path('storage/thumbnails/' . $posts->thumbnail));
            }
        }
        $posts->thumbnail = null;
        $posts->save();
        // dd($posts);
        return back()->with('danger', 'Thumbnail deleted successfully');
    }

    public function deleteAllDraftPosts()
    {
        if (Post::where('is_published', 0)->count() == 0) {
            return redirect()->route('posts.index')->with('danger', 'No draft posts found');
        }
        $posts = Post::where('is_published', 0)->get();
        foreach ($posts as $post) {
            if ($post->thumbnail) {
                if (Storage::exists('public/thumbnails/' . $post->thumbnail)) {
                    unlink(public_path('storage/thumbnails/' . $post->thumbnail));
                }
            }
            Post::destroy($post->id);
        }
        return redirect()->route('posts.index')->with('success', 'All draft posts deleted successfully');
    }

    public function deleteAllReportedComments()
    {
        if (Comment::where('is_spam', 1)->count() == 0) {
            return redirect()->route('posts.index')->with('danger', 'No reported comments found');
        }
        $comments = Comment::where('is_spam', 1)->get();
        foreach ($comments as $comment) {
            Comment::destroy($comment->id);
        }
        return redirect()->route('posts.index')->with('success', 'All reported comments deleted successfully');
    }

    public function imageUpload(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time() . '.' . $request->file->extension();
        $request->file->move(public_path('storage/uploads'), $imageName);
        return response()->json(['location' => asset('storage/uploads/' . $imageName)]);

        // $fileName=$request->file('file')->getClientOriginalName();
        // $path=$request->file('file')->storeAs('uploads', $fileName, 'public');
        // return response()->json(['location'=>"/storage/$path"]);

        /*$imgpath = request()->file('file')->store('uploads', 'public');
        return response()->json(['location' => "/storage/$imgpath"]);*/
    }
}
