<?php

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


// Dashboard
Route::resource('/guestbook', GuestbookController::class)
    ->only(['index', 'store', 'edit', 'update', 'destroy']);

Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Dashboard
    Route::get('/dashboard', DashboardController::class, 'index')->name('dashboard');
    // Guestbook
    // Route::get('/guestbook', function () {
    //     return view('guestbook');
    // })->name('guestbook');
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    // Dashboard Posts
    Route::resource('/dashboard/posts', DashboardPostController::class);
    Route::resource('/dashboard/category', DashboardCategoryController::class);
    Route::resource('/dashboard/user', DashboardUserController::class);
    // Dashboard Cartegory
    // Route::get('/dashboard/category', function () {
    //     return view('dashboard.category.index');
    // })->name('dashboard.category.index');
    // Route::get('/dashboard/category/create', function () {
    //     return view('dashboard.category.create');
    // })->name('dashboard.category.create');
    // Dashboard Portofolio
    Route::get('/dashboard/portofolio', function () {
        return view('dashboard.portofolio.index');
    })->name('dashboard.portofolio.index');
    // Dashboard Guestbook
    Route::get('/dashboard/guestbook', function () {
        return view('dashboard.guestbook.index');
    })->name('dashboard.guestbook.index');
    // Dashboard Users
    // Route::get('/dashboard/user', function () {
    //     return view('dashboard.user.index');
    // })->name('dashboard.user.index');
});

require __DIR__ . '/auth.php';
