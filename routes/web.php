<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/message', function () {
    echo "Hi, I'm Ron";
});

// Segments parameter
Route::get('/post/{id}/{title}', function($id, $title){
    $content = 'ID: ' . $id . "<br>";
    $content .= 'Title: ' . $title;
    return $content;
});

// Alias Routes
Route::get('cms/login', array('as' => 'admin.login', function() {
    echo '<a href="'.route('admin.login').'">CMS Login</a> <br />';
    echo '<a href="'.route('logout').'">CMS logout</a> <br />';
    echo '<a href="'.route('articles').'">API articles</a>';
}));

// Alias using named routes
Route::get('cms/logout', function(){
    return 'You are logged out.';
})->name('logout');

// RegEx Constraints
Route::get('/article/{id}', function($id){
    return $id;
})->where('id', '[0-9]');