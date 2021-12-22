<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubscriptionController;


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

route::post("/post/store", [PostController::class, "store"])->name('post.store');

//Route::get('/forum', [PostController::class, 'forum'])->name('forum');
Route::get('/', [PostController::class, 'index'])->name('post.index');
Route::get('/post/{postId}', [PostController::class, 'show'])->name('post.show');

Route::group(['middleware' => ['auth']], function () {
    route::post("/post/update", [PostController::class, "update"])->name('post.update');
    route::get("/post/{postId}/edit", [PostController::class, "edit"])->name('post.edit');
    route::post("/post/destroy", [PostController::class, "destroy"])->name('post.destroy');
    route::post("/comment/destroy", [CommentController::class, "destroy"])->name('comment.destroy');
});

route::post('/comment', [CommentController::class, 'store'])->middleware('auth')->name('comment.store');

//Admin Only Routes
Route::group(['middleware' => ['auth', 'role:ROLE_ADMIN']], function () {
    route::post("/topic/post", [TopicController::class, "store"])->name('topic.post');
    route::post("/topic/destroy", [TopicController::class, "destroy"])->name('topic.destroy');
    Route::get('/control', [TaskController::class, 'index'])->name('control');
});
route::get('/control/createRole', [TaskController::class, 'createRole'])->middleware('auth')->name('control.createRole');
route::post('/control/storeRole', [TaskController::class, 'storeRole'])->middleware('auth')->name('control.storeRole');
route::post('/control/editRole/{roleId?}', [TaskController::class, 'editRole'])->middleware('auth')->name('control.editRole');
route::put('/control/putRole/{roleId?}', [TaskController::class, 'putRole'])->middleware('auth')->name('control.putRole');
route::delete('/control/destroyRole/{roleId?}', [TaskController::class, 'deleteRole'])->middleware('auth')->name('control.deleteRole');

Route::group(['middleware' => ['auth', 'role:ROLE_ADMIN']], function () {
    route::post("/user/post", [UserController::class, "store"])->name('user.post');
    route::post("/user/destroy", [UserController::class, "destroy"])->name('user.destroy');
    Route::get('/control', [TaskController::class, 'index'])->name('control');
});

route::post('/subscription/post', [SubscriptionController::class, 'store'])->middleware('auth')->name('subscription.store');
route::post('/subscription/destroy', [SubscriptionController::class, 'destroy'])->middleware('auth')->name('subscription.destroy');

