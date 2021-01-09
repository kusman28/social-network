<?php

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

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::get('profile', 'API\ProfileController@index');
Route::put('profile', 'API\ProfileController@updateProfile');
Route::get('user/profile', 'API\ProfileController@profile');

Route::post('post/save', 'PostController@store');
Route::get('posts', 'PostController@index')->name('posts.index');
Route::get('post/{slug}','PostController@show')->name('post');

// Follow
Route::get('users/{user}', 'UserController@show')->name('user.show');
Route::get('users/{user}/follow', 'UserController@follow')->name('user.follow');
Route::get('users/{user}/unfollow', 'UserController@unfollow')->name('user.unfollow');

// Like
Route::post('/like','PostController@getlike');
Route::post('/like/{id}','PostController@like');
 
// Dislike
Route::post('/dislike','PostController@getDislike');
Route::post('/dislike/{id}','PostController@dislike');