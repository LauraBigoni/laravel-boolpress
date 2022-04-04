<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function () {
    $names = ['laurant', 'nicolas', 'pietros', 'antonios', 'adriana'];
    $lorem = 'lorem ipsum dolor sit amet, consectetur adip';
    return response()->json(compact('names', 'lorem'));
});

Route::get('/posts', 'Api\PostController@index');
