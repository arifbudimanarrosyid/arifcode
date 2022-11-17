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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
