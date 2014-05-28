<?php

class PostController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$post = PostCategory::orderBy('id','asc')
			->lists('post_categories_name','id');
			
		return View::make('post.post')
			->with(array(
				'post'  => $post
				));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'category' 	=> 	'required',
			'title'		=>	'required',
			'body'		=>	'required',
			);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator -> fails()) {
			return Redirect::to('post')
				->withErrors($validator)
				->withInput(Input::all());
		}
		else{
			$post = new Post;
			$post->post_categories_id	= 	Input::get('category');
			$post->post_title	= 	Input::get('title');
			$post->post_body 	= 	Input::get('body');
			$post->save();

			Session::flash('message', _('Successfully added'));
			return Redirect::to('post');
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
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
