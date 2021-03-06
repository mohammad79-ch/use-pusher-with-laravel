<?php

use App\Http\Controllers\Frontend\Post\PostController;
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
    return view('welcome');
});

Route::get('users',\App\Http\Livewire\User::class);

Route::get('images',\App\Http\Livewire\Image::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource("posts", PostController::class);

Route::view("users","users.showAll")->name("users.all");

Route::view("game","games.show")->name("games.show");
