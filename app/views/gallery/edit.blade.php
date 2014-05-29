@extends('layout.admin')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading"><h4>Upload Image </h4></div>
    <div class="panel-body">
    	<div class="col-md-2"></div>
    	<div class="col-md-8">
	       {{ Form::model($gallery, array('route' => array('gallery.update', $gallery->id),'class' => 'form-horizontal','files' => 'true' ,'method' => 'PUT')) }}
	       		<div class="form-group">
	            	<div class="col-sm-4">{{ Form::label('Categories') }}</div>
	                <div class="col-sm-8">
	                    {{ Form::select('categories_id',$categories,Input::old($gallery->categories_id),array('class'=>'form-control input-sm','required')) }}
	                </div>
	            </div>
	            <div class="form-group">
	            	<div class="col-sm-4">{{ Form::label('Caption') }}</div>
	                <div class="col-sm-8">
	                    {{ Form::text('caption',Input::old('caption'),array('class'=>'form-control input-sm','required')) }}
	                </div>
	            </div>
	            <div class="form-group">
	            	<div class="col-sm-4"></div>
	                <div class="col-sm-8">
	            	   {{ Form::submit('Update',array('class'=>'btn btn-success btn-sm')) }}
	                </div>
	            </div>
	      {{Form::close()}}
      </div>
      <div class="col-md-2"></div>
    </div>
</div>
@stop