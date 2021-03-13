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

// INDEX FETCH
Route::get('/posts/results', 'PostsController@result')->name('home');
Route::get('/users/results', 'UserController@result')->name('home');
Route::get('/comments/results', 'CommentsController@result')->name('home');
Route::get('/albums/results', 'AlbumsController@result')->name('home');
Route::get('/photos/results', 'PhotosController@result')->name('home');
Route::get('/todos/results', 'TodosController@result')->name('home');

// 
Route::get('/users/{id}/posts', 'UserController@posts')->name('home');

// MIGRATION
Route::get('/posts/fetch', 'PostsController@migration')->name('home');
Route::get('/users/fetch', 'UserController@migration')->name('home');
Route::get('/comments/fetch', 'CommentsController@migration')->name('home');
Route::get('/albums/fetch', 'AlbumsController@migration')->name('home');
Route::get('/photos/fetch', 'PhotosController@migration')->name('home');
Route::get('/todos/fetch', 'TodosController@migration')->name('home');
