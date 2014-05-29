<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::resource('administrator', 'AdministratorController');
Route::resource('gallery-categories', 'GalleryCategoriesController');
Route::resource('gallery', 'GalleryController');
Route::resource('post-categories', 'PostCategoriesController');
Route::resource('post', 'PostController');
Route::resource('user', 'UserController');
Route::get('/', function()
{
	return View::make('content.index');
	
});

