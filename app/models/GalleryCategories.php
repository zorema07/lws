<?php

class GalleryCategories extends Eloquent {
	protected $table = "gallery_categories";

	public function parent(){
		return $this->belongsTo('GalleryCategories','parent_id');
	}
}