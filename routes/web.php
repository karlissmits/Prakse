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

Route::get('/home', 'HomeController@index')
          ->name('home')
          ->middleware('auth');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

Route::get('edit-records','AdminController@index');
Route::get('edit/{id}','AdminController@show');

Route::post('edit/{id}','AdminController@edit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/add', 'AdminController@show2');
Route::post('/add', 'AdminController@add');


//Route::get('/admin','SearchController@index');
Route::get('/search','AdminController@search');

Route::get('data','DataController@index')->name('data');
Route::post('data','DataController@store')->name('csv-store');
Route::get('/datasearch','DataController@search');

Route::post('/contact', 'FooterController@store');

Route::get('/messages', 'MessageController@index');
Route::get('delete/{id}','MessageController@destroy');

Route::get('/lietvardi', 'LietvardiController@index');
Route::get('/lietvardi/pievienot','LietvardiController@show');
Route::post('/lietvardi/pievienot','LietvardiController@add');
Route::post('/lietvardi/rediget/{id}','LietvardiController@edit');
Route::get('/lietvardi/rediget/{id}','LietvardiController@show2');
Route::get('/jaunie/delete/{id}','LietvardiController@destroy');

Route::get('/jaunie','LietvardiController@show3');
Route::get('/jaunie/apstiprinat/{id}','LietvardiController@apstiprinat');
Route::get('/lietvsearch','LietvardiController@search');
Route::get('/sort','LietvardiController@status');


Route::get('/darbibasvardi', 'DarbibasvController@index');
Route::get('/darbibasvardi/pievienot','DarbibasvController@show');
Route::post('/darbibasvardi/pievienot','DarbibasvController@add');
Route::post('/darbibasvardi/rediget/{id}','DarbibasvController@edit');
Route::get('/darbibasvardi/rediget/{id}','DarbibasvController@show2');
Route::get('/darbibasvardi/delete/{id}','DarbibasvController@destroy');

Route::get('/jauniedv','DarbibasvController@show3');
Route::get('/jauniedv/apstiprinat/{id}','DarbibasvController@apstiprinat');
Route::get('/lietvsearch','LietvardiController@search');
