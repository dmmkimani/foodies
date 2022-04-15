<?php

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
    ->name('posts.store');

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])
    ->name('posts.edit');

Route::put('/posts/{post}', [PostController::class, 'update'])
    ->name('posts.update');

Route::delete('/posts/{post}', [PostController::class, 'destroy'])
    ->name('posts.destroy');

Route::get('/users/{user}', [UserController::class, 'show'])
    ->name('users.show');

Route::get('/restaurants', [RestaurantController::class, 'index'])
    ->name('restaurants.index');

Route::get('/restaurants/{restaurant}', [RestaurantController::class, 'show'])
    ->name('restaurants.show');

Route::get('/storage/{filename}', function ($filename) {
    $path = public_path('images/').$filename;
    return readfile($path);
})->name('images.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
