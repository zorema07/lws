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
Route::get('/', function()
{
	return View::make('content.index');
	
});

Route::get('login',function(){
	return View::make('login');
/*	echo "<form method='post' action='" . URL::to('login')."'>";
	echo "<Input type='text' name='userName' placeholder='Username'><br>";
	echo "<Input type='password' name='userPass' placeholder='Password'><br>";
	echo "<Input type='submit' name='login'>";
	echo "</form>";*/
});

Route::post('login', function(){
	$credentials = array(
		'username'=>Input::get('username'),
		'password'=>Input::get('password')
	);

	//dd($credentials);

	if(Auth::attempt( array('username'=>Input::get('username'),'password'=>Input::get('password')))){
		return Redirect::to('/administrator');
	} else {
		return Redirect::to('login');
	}
});

Route::get('logout', function(){
	Auth::logout();
	return Redirect::to('login');
});

Route::group(array('before'=>'auth'),function(){
	Route::resource('administrator', 'AdministratorController');
	Route::resource('gallery-categories', 'GalleryCategoriesController');
	Route::resource('gallery', 'GalleryController');
	Route::resource('post-categories', 'PostCategoriesController');
	Route::resource('post', 'PostController');
	Route::resource('user', 'UserController');
});

