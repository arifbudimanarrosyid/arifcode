<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardPostController;

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

Route::get('/guestbook', function () {
    return view('guestbook');
})->name('guestbook');

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
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/category', function () {
    return view('dashboard.category.index');
})->middleware(['auth', 'verified'])->name('dashboard.category.index');
Route::get('/dashboard/category/create', function () {
    return view('dashboard.category.create');
})->middleware(['auth', 'verified'])->name('dashboard.category.create');

Route::get('/dashboard/portofolio', function () {
    return view('dashboard.portofolio.index');
})->middleware(['auth', 'verified'])->name('dashboard.portofolio.index');
Route::get('/dashboard/guestbook', function () {
    return view('dashboard.guestbook.index');
})->middleware(['auth', 'verified'])->name('dashboard.guestbook.index');
Route::get('/dashboard/user', function () {
    return view('dashboard.user.index');
})->middleware(['auth', 'verified'])->name('dashboard.user.index');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', DashboardController::class, 'index')->name('dashboard');
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('isAdmin');
});

require __DIR__ . '/auth.php';
