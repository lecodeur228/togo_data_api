<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/places', [ApiController::class, 'getAllPaces']);
Route::get('/search-places', [ApiController::class, 'searchPlaces']);
Route::get('/articles', [ApiController::class, 'getAllArticles']);
Route::get('/search-articles', [ApiController::class, 'searchArticle']);
