<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReplyController;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', [ForumController::class,'index']);
Route::get('/forum/view/{id}', [ForumController::class,'view']);
Route::get('/forum/modify/{id}', [ForumController::class,'modify']);
Route::get('/forum/create', [ForumController::class,'create']);
Route::post('/forum/create/posts', [ForumController::class,'createPosts']);
Route::put('/forum/{id}/modify', [ForumController::class,'put']);
Route::post('/forum/{postId}/heart', [ForumController::class,'heart']);
Route::delete('/forum/{id}/delete', [ForumController::class,'delete']);

Route::get('/category', [CategoryController::class,'index']);
Route::get('/category/{id}', [CategoryController::class,'view']);
Route::get('/category/{id}/posts', [CategoryController::class,'viewPosts']);
Route::post('/category/store', [CategoryController::class,'store']);
Route::put('/category/{id}/modify', [CategoryController::class,'put']);
Route::delete('/category/{id}/delete', [CategoryController::class,'delete']);

Route::post('/reply/create/{id}', [ReplyController::class,'create']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



