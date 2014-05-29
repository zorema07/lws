<?php

class GalleryController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = GalleryCategories::orderBy('category_name','asc')->paginate();
		return View::make('gallery.index',array(
						'categories'=>$categories
						));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = GalleryCategories::orderBy('category_name','asc')->lists('category_name','id');
		return View::make('gallery.create',array('categories'=>$categories));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if(Input::hasFile('path')){
			foreach (Input::file('path') as $path) {
				$gallery = new Gallery;
				$gallery->caption = Input::get('caption');
				$gallery->categories_id = Input::get('categories_id');

				$destinationPath = "uploads/";
				$extension = $path->getClientOriginalExtension();
				$filename = uniqid().".".$extension;
				$uploads = $path->move($destinationPath,$filename);
				$gallery->path = $destinationPath.$filename;

				$gallery->save();
			}
		}
		
		return Redirect::to("gallery")->with('message','Successfully Added!');
		
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$gallery = Gallery::where('categories_id','=',$id)->orderBy('caption','asc')->paginate();
		return View::make('gallery.show',array(
						'gallery'=>$gallery
						));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$gallery = Gallery::find($id);
		$categories = GalleryCategories::orderBy('category_name','asc')->lists('category_name','id');
		return View::make('gallery.edit',array(
									'gallery'=>$gallery,
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
		$gallery = Gallery::find($id);
		$gallery->caption = Input::get('caption');
		$gallery->categories_id = Input::get('categories_id');
		$gallery->save();

		return Redirect::route("gallery.show",$gallery->categories_id)->with('message','Successfully Updated!');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$gallery = Gallery::find($id);
		Gallery::destroy($id);
		return Redirect::route("gallery.show",$gallery->categories_id)->with('message','Successfully Deleted!');
	}


}
