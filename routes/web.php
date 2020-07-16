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

Route::get('/', ['uses' => 'PagesController@getIndex', 'as' => 'pages.index']);
Route::get('about', ['uses' => 'PagesController@getAbout','as'=>'pages.about']);
Route::get('services', ['uses' => 'PagesController@getServices','as'=>'pages.services']);
Route::get('contact', ['uses' => 'PagesController@getContact','as'=>'pages.contact']);
Route::post('contact', 'PagesController@postContact');

Route::get('posts', ['uses' => 'PostsController@index', 'as' => 'posts.index']);
Route::resource('posts', 'PostsController');

Auth::routes();

Route::get('dashboard', 'DashboardController@index');

//Route::get('/', function () {
//    return view('welcome');
//});
//
//Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

// Categories
Route::resource('categories', 'CategoryController', ['except' => ['create']]);
Route::resource('tags', 'TagController', ['except' => ['create']]);

// Comments
Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);
Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
Route::put('comments/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);
Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);

Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);

