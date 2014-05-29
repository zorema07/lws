<?php

class Post extends Eloquent{
	protected $table = "post";


public function category()
	{
		return $this->belongsTo('PostCategory','post_categories_id');
	}

}