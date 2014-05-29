@extends('layout.admin')

@section('content')
<div class="row align-center">
	<div class="col-md-12">
		<div class="panel panel-default" >
			<div class="panel-heading" ><h4>Gallery Categories <span class="pull-right">
						<a href="{{route('post-categories.create')}}" class="btn btn-success pull-right glyphicon glyphicon-pencil ">Create</a></span></h4>
			</div>
				
				@if(Session::has('delete'))
				<div class="alert alert-danger">
					{{Session::get('delete')}}	
				</div>
				@endif
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th class="col-md-1">#</th>
							<th class="col-md-8">Post Category</th>
							<th class="col-md-3"></th>
						</tr>
					</thead>
					<tbody>
						<?php $i=0; ?>
						@foreach($categories as $category)
						<tr >
							<td>{{++$i}}</td>
							<td>{{$category->post_categories_name}}</td>
							<td>
								{{Form::open(array('url'=>route('post-categories.destroy', array($category->id)),'method'=>'delete','onsubmit'=>"return confirm('Are You Sure?')"))}}
									<a href="{{route('post-categories.edit', array($category->id))}}" class="btn btn-xs btn-success tooltip-top" title="Edit Category"><i class="glyphicon glyphicon-edit"></i></a>
									<button type="submit" name="id" class="btn btn-xs btn-danger tooltip-top" title="Remove Post" value="{{$category->id}}"><i class="glyphicon glyphicon-remove"></i></button>
								{{Form::close()}}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				
		</div>
	</div>
</div>
@stop