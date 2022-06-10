<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategorysApi;
use App\Http\Controllers\Api\HandleImage;
use App\Http\Controllers\Clients\ClientCommentController;
use App\Http\Controllers\Clients\ClientFavouriteController;
use App\Http\Controllers\Helper\CkeditorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('uploads-ckeditor',[CkeditorController::class,'upload'])->name('ckuploads');
Route::get('file-browser',[CkeditorController::class,'imgFile'])->name('ckimagefile');

Route::post('handleImage',[HandleImage::class,'index']);

Route::post('category/{id?}',[CategorysApi::class,'category'])->name('Api.category');

Route::post('storeComment',[ClientCommentController::class,'store'])->name('Comment.store');

Route::post('storeFavourite',[ClientFavouriteController::class,'store'])->name('Favourite.store');
Route::post('deleteFavourite',[ClientFavouriteController::class,'delete'])->name('Favourite.delete');
