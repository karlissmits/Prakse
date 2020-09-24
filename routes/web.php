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

Route::get('/', 'PageController@index');
Route::get('/about', 'PageController@about');
Route::get('/services', 'PageController@services');
Route::resource('/service', 'PagesController@services');
Route::resource('posts', 'PostController');

Route::get('/hello', function () {
    return 'Hello World';
});

Route::get('/users/{id}/{name}', function ($id, $name) {
    return 'This ir user  ' .$name.' with an id of ' .$id;
});


Route::get('/admin', 'AdminController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

Route::get('edit-records','AdminController@index');
Route::get('edit/{id}','AdminController@show');

Route::post('edit/{id}','AdminController@edit');

Auth::routes();

Route::get('delete/{id}','AdminController@destroy');

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/add', 'AdminController@show2');
Route::post('/add', 'AdminController@add');


//Route::get('/admin','SearchController@index');
Route::get('/search','AdminController@search');
