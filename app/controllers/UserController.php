<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::orderBy('id','asc')->paginate();

		return View::make('user.index')
			->with(array(
				'users' => $users
				));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('user.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'fullname' 	=> 	'required',
			'username'		=>	'required',
			'email'		=>	'required|email',
			'password'	=> 'required'
			);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator -> fails()) {
			return Redirect::reoute('user.create')
				->withErrors($validator)
				->withInput(Input::all());
		}
		else{
			$user = new User;
			$user->fullname	= 	Input::get('fullname');
			$user->username	= 	Input::get('username');
			$user->email 	= 	Input::get('email');
			$user->password =	Hash::make(Input::get('password'));
			$user->save();

			Session::flash('message', _('Successfully added'));
			return Redirect::route('user.index');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);
		return View::make('user.edit')
			->with(array(
				'user' => $user
				));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
			'fullname' 	=> 	'required',
			'username'		=>	'required',
			'email'		=>	'required|email',
			);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator -> fails()) {
			return Redirect::route('user.edit',$id)
				->withErrors($validator)
				->withInput(Input::all());
		}
		else{
			$user = User::find($id);
			$user->fullname	= 	Input::get('fullname');
			$user->username	= 	Input::get('username');
			$user->email 	= 	Input::get('email');
			 if(strlen(trim(Input::get('password'))) > 0)
	    		$user->password = Hash::make(Input::get('password'));
			$user->save();

			Session::flash('message', _('Successfully added'));
			return Redirect::route('user.index');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);

		Session::flash('message', 'User Deleted');
		return Redirect::route('user.index');
	}


}
