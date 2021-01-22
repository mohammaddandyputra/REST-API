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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/get-all-product', 'ProductController@getAllData');
Route::post('/create-product', 'ProductController@createData');
// Route::get('/search-product', 'ProductController@searchData');
Route::patch('/update-all-product/{id}', 'ProductController@updateAllData');
Route::put('/update-product/{id}', 'ProductController@updateData');
Route::delete('/delete-product/{id}', 'ProductController@deleteData');


// Custom Routes
Route::get('/get-product/{key:name}', 'ProductController@getData');

//Nested Routes
Route::get('/product/{productId}/comment/{commentId}', 'ProductController@show');