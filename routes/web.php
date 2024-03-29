<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RestaurantController;
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

Route::redirect('/', '/posts')
    ->name('home');

Route::get('/posts', [PostController::class, 'index'])
    ->name('posts.index');

Route::get('/posts/create', [PostController::class, 'create'])
    ->middleware(['auth'])->name('posts.create');

Route::post('/posts/', [PostController::class, 'store'])
    ->middleware(['auth'])->name('posts.store');

Route::get('/posts/{post}', [PostController::class, 'show'])
    ->middleware(['auth'])->name('posts.show');

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])
    ->middleware(['auth'])->name('posts.edit');

Route::put('/posts/{post}', [PostController::class, 'update'])
    ->middleware(['auth'])->name('posts.update');

Route::delete('/posts/{post}', [PostController::class, 'destroy'])
    ->middleware(['auth'])->name('posts.destroy');

Route::get('/users/{user}', [UserController::class, 'show'])
    ->name('users.show');

Route::get('/users/{user}/edit', [UserController::class, 'edit'])
    ->middleware(['auth'])->name('users.edit');

Route::put('/users/{user}', [UserController::class, 'update'])
    ->middleware(['auth'])->name('users.update');

Route::get('/restaurants', [RestaurantController::class, 'index'])
    ->name('restaurants.index');

Route::get('/restaurants/{restaurant}', [RestaurantController::class, 'show'])
    ->name('restaurants.show');

Route::post('/comments/', [CommentController::class, 'apiStore'])
    ->middleware(['auth'])->name('api.comments.store');

Route::get('/comments/{post}', [CommentController::class, 'apiShow'])
    ->name('api.comments.show');

Route::delete('/comments/', [CommentController::class, 'apiDestroy'])
    ->name('api.comments.destroy');

Route::post('/likes/', [LikeController::class, 'apiStore'])
    ->middleware(['auth'])->name('api.likes.store');

Route::get('/{user}/likes/{likeable_type}/{likeable_id}', [LikeController::class, 'apiShow'])
    ->name('api.likes.show');

Route::delete('/likes/', [LikeController::class, 'apiDestroy'])
    ->name('api.likes.destroy');

Route::get('/storage/{filename}', function ($filename) {
    $path = public_path('images/') . $filename;
    return readfile($path);
})->name('images.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
