<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



///XSS Protection for public routes
Route::group(['middleware' => ['web']], function () {
    Route::get('/', ['as' => 'home', 'uses'=>'HomeController@index']);
    Route::get('/post/{id}', ['as' => 'post', 'uses'=>'HomeController@show']);
    Route::get('/login', ['as' => 'login', 'uses'=>'HomeController@login']);
    Route::post('/login', ['as' => 'login-process', 'uses'=>'HomeController@login']);
    Route::get('/logout', ['as' => 'logout', 'uses'=>'HomeController@logout']);
    Route::get('/search', ['as' => 'search', 'uses'=>'HomeController@search']);
});

/////XSS protection and Authentification routes
Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/admin', ['as' => 'admin', 'uses'=>'AdminController@index']);
    Route::get('/admin-post', ['as' => 'insert-post-form', 'uses'=>'AdminController@store']);
    Route::post('/admin-post', ['as' => 'insert-post', 'uses'=>'AdminController@store']);
    Route::get('/admin-post/{id?}', ['as' => 'edit-post-form', 'uses'=>'AdminController@update']);
    Route::put('/admin-post', ['as' => 'edit-post', 'uses'=>'AdminController@update']);
    Route::delete('/admin', ['as' => 'delete-post', 'uses'=>'AdminController@delete']);
});

