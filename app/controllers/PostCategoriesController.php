<?php

class PostCategoriesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = PostCategories::orderBy('post_categories_name','asc')->paginate();
		return View::make('post-categories.index',array('categories'=>$categories));

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('post-categories.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
			$post = new PostCategories;
			$post->post_categories_name	= 	Input::get('category_name');
			$post->save();

			Session::flash('message', _('Successfully added'));
			return Redirect::route('post-categories.index');
		
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
		$current_id = PostCategories::find($id);
		return View::make('post-categories.edit')
			->with(array(
				'current_id' => $current_id
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
			$post = PostCategories::find($id);
			$post->post_categories_name	= 	Input::get('category_name');
			$post->save();

			Session::flash('message', 'Successfully Updated');
			return Redirect::route('post-categories.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		PostCategories::destroy($id);

		Session::flash('message','Category Deleted');
		return Redirect::route('post-categories.index');

	}


}
