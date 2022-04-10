<?php

use App\Http\Controllers\FoodieController;
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
    ->name('posts.create');

Route::post('/posts', [PostController::class, 'store'])
    ->name('posts.store');

Route::get('/foodies/{username}', [FoodieController::class, 'show'])
    ->name('foodies.show');

Route::get('/restaurants', [RestaurantController::class, 'index'])
    ->name('restaurants.index');

Route::get('/restaurants/{id}', [RestaurantController::class, 'show'])
    ->name('restaurants.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
