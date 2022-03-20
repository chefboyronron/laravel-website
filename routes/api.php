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

// Required parameter
Route::get('customer/{name}', function($name){
    return $name;
});

// Optional parameter
Route::get('admin/{name?}', function($name = ''){
    return $name;
});


// Resource method
Route::match(['post', 'get'], '/match', function(Request $req){
    return $req->method();
});

// Any resource method

Route::any('/videos', function(Request $req){
    return $req->method();
});

// Routing custom method
Route::get('/article/{id}', 'ArticlesController@article');
// Routing resource method
/*  Possible resources 
 * index, store, create, show, destroy, update, edit
*/
Route::resource('/articles', 'ArticlesController');