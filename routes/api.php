<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('messages',PostController:: Class);
Route::apiResource('user',PostController:: Class);

Route::get('/text', function () {
    return "api is working";
});
//    ->middleware('auth:sanctum');
