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
    return view('home');
});

Route::get('/blogs','BlogController@index');

Route::post('/blogs','BlogController@store');

Route::get('/blogs/{blog}','BlogController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('categories','CategoriesController');
Route::resource('posts','PostsController');

Route::get('trashed-post','PostsController@trashed')->name('trashed-posts.index');
