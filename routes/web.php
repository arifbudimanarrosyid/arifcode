<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestbookController;
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
    // Dashboard
    Route::get('/dashboard', DashboardController::class, 'index')
        ->name('dashboard');
});



Route::prefix('dashboard')
    ->middleware(['auth', 'isAdmin'])
    ->group(function () {
        Route::resource('/posts', DashboardPostController::class);
        Route::patch('/posts/{post}/delete-thumbnail', [DashboardPostController::class, 'deleteThumbnail'])->name('posts.delete-thumbnail');
        Route::resource('/category', DashboardCategoryController::class)
            ->except(['destroy']);
        Route::resource('/user', DashboardUserController::class)->only(['index']);
        Route::patch('/user/{user}/make-admin', [DashboardUserController::class, 'makeRoleAdmin'])->name('user.make-admin');
        Route::patch('/user/{user}/make-user', [DashboardUserController::class, 'makeRoleUser'])->name('user.make-user');
        // Route::get('/portofolio', function () {
        //     return view('dashboard.portofolio.index');
        // })->name('dashboard.portofolio.index');
    });

require __DIR__ . '/auth.php';
