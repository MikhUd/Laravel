<?php

use Illuminate\Support\Facades\Route;

Route::get('/registration', [App\Http\Controllers\RegistrationController::class,'registration']);


Route::get('/login', [App\Http\Controllers\RegistrationController::class,'login']);



Route::get('/',[App\Http\Controllers\MainController::class,'home']);


Route::get('/about', [App\Http\Controllers\MainController::class,'about']);

Route::post('/comment/delete', [App\Http\Controllers\PostController::class,'comment_delete'])->name('comment_delete');


Route::get('/review', [App\Http\Controllers\MainController::class,'review'])->name('review')->middleware('auth');

Route::get('/logout', [App\Http\Controllers\MainController::class,'logout']);

Route::post('/review/check', [App\Http\Controllers\MainController::class,'review_check'])->name('post_upload');



//Route::post('/post/add', function(Request $request){
    //App\Jobs\SendTelegram::dispatch($request);

    
//});
Route::post('/post/add', [App\Http\Controllers\PostController::class,'post_add']);



Route::post('/comment/add', [App\Http\Controllers\PostController::class,'comment_add'])->name('comment_add');


//Route::get('/posts', [App\Http\Controllers\PostController::class,'posts'])->name('posts');

Route::get('/posts', [App\Http\Controllers\PostController::class,'post_filter'])->name('postfilter');


Route::get('/post/{id}', [App\Http\Controllers\PostController::class,'show'])->name('show');


Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
