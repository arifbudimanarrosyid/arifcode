<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Guestbook;
use App\Models\Portofolio;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $posts = Post::count();
        $publishedPosts = Post::where('is_published', 1)->count();
        $draftPosts = Post::where('is_published', 0)->count();
        $categories = Category::count();
        $featuredPosts = Post::where('is_featured', 1)->count();
        $featuredAndPublishedPosts = Post::where('is_featured', 1)->where('is_published', 1)->count();
        $guestbooks = Guestbook::count();
        $portofolios = Portofolio::count();
        if (Auth::user()->is_admin === 1) {
            $users = User::count();
            return view('dashboard', compact(
                'posts',
                'publishedPosts',
                'draftPosts',
                'featuredPosts',
                'featuredAndPublishedPosts',
                'categories',
                'guestbooks',
                'portofolios',
                'users',
            ));
        } else {
            return view('dashboard', compact(
                'posts',
                'publishedPosts',
                'draftPosts',
                'featuredPosts',
                'featuredAndPublishedPosts',
                'categories',
                'guestbooks',
                'portofolios',
            ));
        }
    }
    public function index()
    {
        return view('dashboard');
    }
}
