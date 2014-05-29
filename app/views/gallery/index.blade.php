@extends('layout.admin')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading"><h4>GALLERY <span class="pull-right"><a href="{{ URL::route('gallery.create')}}" class="btn btn-success glyphicon glyphicon-upload">UPLOAD</a></span></h4></div>
    <div class="panel-body">
	<?php $slno = 1; ?>
	  	@foreach($categories as $category)
	    <div class="col-xs-3">
	    	<a href="{{ route('gallery.show',array($category->id))}}">
	        	<div class="thumbnail" >
	            	<img src="{{ $category->cover }}">
	            	<div class="caption">
	                	{{ $category->category_name}}<br>
	            	</div>
	        	</div>
	    	</a>
	    </div>
	<?php $slno++; ?>
    @endforeach
    </div>
</div>
@stop