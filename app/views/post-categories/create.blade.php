@extends('layout.admin')

@section('content')
<div class="row align-center">
	<div class="col-md-12">
		<div class="panel panel-default" >
			<div class="panel-heading" ><h4><span class="pull right">Create Categories</h4></span></div>
				<div class="panel-body">
					<div class="col-md-3"></div>
					{{Form::open(array('url'=>route('post-categories.store'),'method'=>'post','class'=>'form-horizontal','files'=>true))}}
					@if(Session::has('message'))
						<div class="alert alert-success">
							{{Session::get('message')}}	
						</div>
					@endif

				<div class="col-md-6">
						
						<div class="form-group">
							{{Form::label('title', 'Post Title', array('class'=>'control-label'))}}
							{{Form::text('category_name', '',  array('class' => 'input-sm form-control', 'placeholder'=>'Category Name'))}}
							@if($errors->has('category_name'))
							<p class="help-block"><span class="text-danger">{{$errors->first('category_name')}}</span></p>
							@endif
						</div>
						<div class="form-group text-right">
							<button type="submit" class="btn btn-sm btn-primary">Save</button>
						</div>
					<div class="col-md-3"></div>
				</div>
		</div>
	</div>
</div>
@stop
