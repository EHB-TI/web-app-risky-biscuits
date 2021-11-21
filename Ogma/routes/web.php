<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TaskController;

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


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

route::get('/post/create', [PostController::class, 'create'])->middleware('auth')->name('post.create');

route::post("/post/store", [PostController::class,"store"])->name('post.store');

Route::get('/forum', [PostController::class, 'index'])->name('forum');
Route::get('/post/{postId}', [PostController::class, 'show'])->name('post.show');

Route::group(['middleware' => ['auth']], function () {
    route::post("/post/update", [PostController::class,"update"])->name('post.update');
    route::get("/post/{postId}/edit", [PostController::class,"edit"])->name('post.edit');
    route::post("/post/destroy", [PostController::class,"destroy"])->name('post.destroy');
    route::post("/comment/destroy", [CommentController::class,"destroy"])->name('comment.destroy');
});

route::post('/comment', [CommentController::class, 'store'])->middleware('auth')->name('comment.store');
Route::get('/Control', [TaskController::class], 'all')->middleware('auth', 'role:ROLE_ADMIN');
