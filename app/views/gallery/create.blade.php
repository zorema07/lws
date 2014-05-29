@extends('layout.admin')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading"><h4>Upload Image </h4></div>
    <div class="panel-body">
    	<div class="col-md-2"></div>
    	<div class="col-md-8">
	       {{ Form::open(array('route'=>'gallery.store','class'=>'form-horizontal','files'=>true)) }}
	       		<div class="form-group">
	            	<div class="col-sm-4">{{ Form::label('Categories') }}</div>
	                <div class="col-sm-8">

	                    {{ Form::select('categories_id',array(''=>'Select Category')+$categories,'',array('class'=>'form-control input-sm','required')) }}
	                </div>
	            </div>
	            <div class="form-group">
	            	<div class="col-sm-4">{{ Form::label('Caption') }}</div>
	                <div class="col-sm-8">
	                    {{ Form::text('caption','',array('class'=>'form-control input-sm','required')) }}
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="col-sm-4">{{ Form::label('Photo')}}</div>
	                <div class="col-sm-8">
	                    {{ Form::file('path[]',array('class'=>'form-control input-sm','multiple')) }}
	                </div>
	            </div>
	            <div class="form-group">
	            	<div class="col-sm-4"></div>
	                <div class="col-sm-8">
	            	   {{ Form::submit('Save',array('class'=>'btn btn-success btn-sm')) }}
	                </div>
	            </div>
	      {{Form::close()}}
      </div>
      <div class="col-md-2"></div>
    </div>
</div>
@stop