<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    // Route to get all posts
    Route::get('/posts', [PostController::class, 'index']);

    // Route to create a new post
    Route::post('/post', [PostController::class, 'createPost']);
});