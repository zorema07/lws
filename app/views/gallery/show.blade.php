@extends('layout.admin')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading"><h4>GALLERY </h4></div>
    <div class="panel-body">
	  	@foreach($gallery as $photo)
	    <div class="col-xs-3">
	        	<div class="thumbnail">
	            	{{ HTML::image($photo->path,$photo->caption,array('data-toggle'=>'modal', 'data-target'=>'.logo'))}}
	            	<div class="caption">
	                	{{ $photo->caption}}
	                	{{Form::open(array('url'=>route('gallery.destroy',array($photo->id)),'method'=>'delete','onsubmit'=>"return confirm('Are You Sure?');"))}}
	                		<a href="{{URL::route('gallery.edit',$photo->id)}}" class="btn btn-xs btn-success glyphicon glyphicon-edit"></a>
	                		<button type="submit" class="btn btn-xs btn-danger glyphicon glyphicon-remove"></botton>
	                	{{Form::close()}}
	            	</div>
	        	</div>
	    </div>
    @endforeach
    </div>
</div>
@stop