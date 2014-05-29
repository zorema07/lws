<?php

class GalleryCategoriesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = GalleryCategories::orderBy('category_name')->get();
		return View::make('gallery-categories.index',array('categories'=>$categories));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = GalleryCategories::orderBy('category_name')->lists('category_name','id');
		return View::make('gallery-categories.create',array('categories'=>$categories));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$categories = new GalleryCategories;
		if(Input::hasFile('cover')){
			$cover = Input::file('cover');
			$destinationPath = "uploads/";
			$extension = $cover->getClientOriginalExtension();
			$filename = uniqid().".".$extension;
			$uploads = $cover->move($destinationPath,$filename);
			$categories->cover = $destinationPath.$filename;
		}
		$categories->category_name = Input::get('category_name');
		$categories->parent_id = Input::get('parent_id');
		$categories->save();

		return Redirect::to("gallery-categories")->with('message','Successfully Added!');
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
		$categoriesById = GalleryCategories::find($id);
		$categories = GalleryCategories::orderBy('category_name','asc')->lists('category_name','id');
		return View::make('gallery-categories.edit',array(
									'categoriesById'=>$categoriesById,
									'categories'=>$categories
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
		$categories = GalleryCategories::find($id);
		if(Input::hasFile('cover')){
			$cover = Input::file('cover');
			$destinationPath = "uploads/";
			$extension = $cover->getClientOriginalExtension();
			$filename = uniqid().".".$extension;
			$uploads = $cover->move($destinationPath,$filename);
			$categories->cover = $destinationPath.$filename;
		}
		$categories->category_name = Input::get('category_name');
		$categories->parent_id = Input::get('parent_id');
		$categories->save();

		return Redirect::to("gallery-categories")->with('message','Successfully Updated!');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		GalleryCategories::destroy($id);
		return Redirect::route("gallery-categories.index")->with('message','Successfully Deleted!');
	}


}
