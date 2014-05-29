@extends('layout.admin')

@section('content')
<div class="row align-center">
	<div class="col-md-12">
		<div class="panel panel-default" >
			<div class="panel-heading" ><h4><span class="pull right">Create Categories</h4></span></div>
				<div class="panel-body">
					<div class="col-md-3"></div>
					{{ Form::model($categoriesById, array('route' => array('gallery-categories.update', $categoriesById->id),'class' => 'form-horizontal','files' => 'true' ,'method' => 'PUT')) }}
					@if(Session::has('message'))
						<div class="alert alert-success">
							{{Session::get('message')}}	
						</div>
					@endif

					<div class="col-md-6">
						<div class="form-group">
						{{Form::label('category', 'Select category', array('class'=>'control-label'))}}
						{{Form::select('parent_id', array('0'=>'No Parent')+$categories, $categoriesById->parent_id, array('class' => 'input-sm form-control','style' => 'width:200px'))}}
						@if($errors->has('parent_id'))
							<p class="help-block"><span class="text-danger">{{$errors->first('parent_id')}}</span></p>
						@endif
					</div>	
					<div class="form-group">
						{{Form::label('title', 'Category', array('class'=>'control-label'))}}
						{{Form::text('category_name', Input::old('category_name'),  array('class' => 'input-sm form-control', 'placeholder'=>'Category Name'))}}
						@if($errors->has('category_name'))
						<p class="help-block"><span class="text-danger">{{$errors->first('category_name')}}</span></p>
						@endif
					</div>
					<div class="form-group">
						{{Form::label('title', 'Cover', array('class'=>'control-label'))}}
						{{Form::file('cover', '',  array('class' => 'input-sm form-control'))}}
						@if($errors->has('category_name'))
							<p class="help-block"><span class="text-danger">{{$errors->first('category_name')}}</span></p>
						@endif
					</div>
					<div class="form-group text-right">
						<div class="col-md-4">
							<div class="thumbnail" >
								{{HTML::image($categoriesById->cover)}}
							</div>
						</div>
						<button type="submit" class="btn btn-sm btn-primary">Save</button>
					</div>
					<div class="col-md-3"></div>
				</div>
		</div>
	</div>
</div>
@stop
