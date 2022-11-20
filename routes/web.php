<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/guestbook', function () {
    return view('guestbook');
})->name('guestbook');
Route::get('/blog', function () {
    return view('blog');
})->name('blog');
Route::get('/post', function () {
    return view('post');
})->name('post');
Route::get('/portofolio', function () {
    return view('portofolio');
})->name('portofolio');
Route::get('/gear', function () {
    return view('gear');
})->name('gear');
Route::get('/aboutme', function () {
    return view('aboutme');
})->name('aboutme');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard/blog', function () {
    return view('dashboard.blog.index');
})->middleware(['auth', 'verified'])->name('dashboard.blog.index');
Route::get('/dashboard/blog/create', function () {
    return view('dashboard.blog.create');
})->middleware(['auth', 'verified'])->name('dashboard.blog.create');
Route::get('/dashboard/blogcategory', function () {
    return view('dashboard.blogcategory.index');
})->middleware(['auth', 'verified'])->name('dashboard.blogcategory.index');
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
});

require __DIR__ . '/auth.php';
