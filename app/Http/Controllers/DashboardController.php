<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $posts = Posts::count();
        $publishedPosts = Posts::where('is_published', 1)->count();
        $draftPosts = Posts::where('is_published', 0)->count();
        $featuredPosts = Posts::where('is_featured', 1)->count();
        $featuredAndPublishedPosts = Posts::where('is_featured', 1)->where('is_published', 1)->count();
        $categories = Category::count();
        if (Auth::user()->is_admin === 1) {
            $users = User::count();
            return view('dashboard', compact(
                'posts',
                'publishedPosts',
                'draftPosts',
                'featuredPosts',
                'featuredAndPublishedPosts',
                'users',
                'categories'
            ));
        } else {
            return view('dashboard', compact(
                'posts',
                'publishedPosts',
                'draftPosts',
                'featuredPosts',
                'featuredAndPublishedPosts',
                'categories'
            ));
        }
    }
    public function index()
    {
        return view('dashboard');
    }
}
