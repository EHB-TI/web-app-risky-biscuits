<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
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


route::get('/post/create', [PostController::class, 'create'])->middleware('auth')->name('post.create');

route::post("/post/store", [PostController::class,"store"])->name('post.store');

//Route::get('/forum', [PostController::class, 'forum'])->name('forum');
Route::get('/', [PostController::class, 'index'])->name('post.index');
Route::get('/post/{postId}', [PostController::class, 'show'])->name('post.show');

Route::group(['middleware' => ['auth']], function () {
    route::post("/post/update", [PostController::class,"update"])->name('post.update');
    route::get("/post/{postId}/edit", [PostController::class,"edit"])->name('post.edit');
    route::post("/post/destroy", [PostController::class,"destroy"])->name('post.destroy');
    route::post("/comment/destroy", [CommentController::class,"destroy"])->name('comment.destroy');
});

route::post('/comment', [CommentController::class, 'store'])->middleware('auth')->name('comment.store');

