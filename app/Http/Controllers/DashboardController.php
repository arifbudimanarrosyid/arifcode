<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $totalPosts = Posts::count();
        $publishedPosts = Posts::where('is_published', 1)->count();
        $draftPosts = Posts::where('is_published', 0)->count();
        $featuredPosts = Posts::where('is_featured', 1)->count();
        $featuredAndPublishedPosts = Posts::where('is_featured', 1)->where('is_published', 1)->count();
        return view('dashboard', compact('totalPosts', 'publishedPosts', 'draftPosts', 'featuredPosts', 'featuredAndPublishedPosts'));
    }
    public function index()
    {
        return view('dashboard');
    }
}
