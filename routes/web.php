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

Auth::routes();

Route::get('/', function () {return view('welcome');});


Route::middleware(['auth'])->group(function (){

    Route::get('/blogs','BlogController@index');

    Route::post('/blogs','BlogController@store');

    Route::get('/blogs/{blog}','BlogController@show');

    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('categories','CategoriesController');
    Route::resource('posts','PostsController');
    Route::resource('tags','TagsController');
    Route::get('trashed-post','PostsController@trashed')->name('trashed-posts.index');
    Route::put('restore-post/{post}','PostsController@restore')->name('restore-post');

});



Route::middleware(['auth','admin'])->group(function (){

    Route::get('user/profile','UsersController@edit')->name('users.edit-profile');

    Route::put('user/profile','UsersController@update')->name('users.update-profile');

    Route::get('users','UsersController@index')->name('users.index');

    Route::post('users/{user}/make-admin','UsersController@makeAdmin')->name('user.make-admin');
});
