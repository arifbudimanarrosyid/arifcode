<?php

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestbookController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Site
Route::get('/', [PostController::class, 'home'])->name('home');
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/post/{slug}', [PostController::class, 'show'])->name('post');

Route::get('/portofolio', function () {
    return view('portofolio');
})->name('portofolio');
Route::get('/gear', function () {
    return view('gear');
})->name('gear');
Route::get('/aboutme', function () {
    return view('aboutme');
})->name('aboutme');

//Socialite
Route::get('auth/redirect/github', [SocialiteController::class, 'redirectGithub'])->name('auth.redirect.github');
Route::get('auth/callback/github', [SocialiteController::class, 'callbackGithub'])->name('auth.callback.github');

Route::get('auth/redirect/google', [SocialiteController::class, 'redirectGoogle'])->name('auth.redirect.google');
Route::get('auth/callback/google', [SocialiteController::class, 'callbackGoogle'])->name('auth.callback.google');

// Comment
Route::post('/comments', [CommentController::class, 'store'])->name('comment.store');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');
Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comment.edit');
Route::patch('/comments/{comment}', [CommentController::class, 'update'])->name('comment.update');

// Guestbook
Route::resource('/guestbook', GuestbookController::class)
    ->only(['index', 'store', 'edit', 'update', 'destroy']);
Route::patch('/guestbook/{guestbook}/pin', [GuestbookController::class, 'pin'])->name('guestbook.pin');
Route::patch('/guestbook/{guestbook}/unpin', [GuestbookController::class, 'unpin'])->name('guestbook.unpin');

Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/profilesocialite', [ProfileController::class, 'deleteAccountWithNoPassword'])->name('profile.deleteAccountWithNoPassword');
    // Dashboard
    Route::get('/dashboard', DashboardController::class, 'index')
        ->name('dashboard');
});



Route::prefix('dashboard')
    ->middleware(['auth', 'isAdmin'])
    ->group(function () {

        //Posts
        Route::resource('/posts', DashboardPostController::class);
        Route::patch('/posts/{post}/delete-thumbnail', [DashboardPostController::class, 'deleteThumbnail'])->name('posts.delete-thumbnail');
        Route::patch('/posts', [DashboardPostController::class, 'deleteDraftPosts'])->name('posts.deletedraftposts');

        //Categories
        Route::resource('/category', DashboardCategoryController::class)
            ->except(['destroy']);

        //Users
        Route::resource('/user', DashboardUserController::class)->only(['index']);
        Route::patch('/user/{user}/make-admin', [DashboardUserController::class, 'makeRoleAdmin'])->name('user.make-admin');
        Route::patch('/user/{user}/make-user', [DashboardUserController::class, 'makeRoleUser'])->name('user.make-user');

        // Route::get('/portofolio', function () {
        //     return view('dashboard.portofolio.index');
        // })->name('dashboard.portofolio.index');
    });

require __DIR__ . '/auth.php';
