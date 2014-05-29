@extends('layout.admin')

@section('content')
<div class="row align-center">
	<div class="col-md-12">
		<div class="panel panel-default" >
			<div class="panel-heading" ><h4>Gallery Categories <span class="pull-right">
						<a href="{{route('gallery-categories.create')}}" class="btn btn-success pull-right glyphicon glyphicon-pencil ">Create</a></span></h4>
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
							<th class="col-md-3">Parent</th>
							<th class="col-md-3">Gallery Category</th>
							<th class="col-md-3">Cover</th>
							<th class="col-md-2"></th>
						</tr>
					</thead>
					<tbody>
						<?php $i=0; ?>
						@foreach($categories as $category)
						<tr >
							<td>{{++$i}}</td>
							<td>{{$category->parent_id}}</td>
							<td>{{$category->category_name}}</td>
							<td>{{$category->cover}}</td>
							<td>
								{{Form::open(array('url'=>route('gallery-categories.destroy', array($category->id)),'method'=>'delete','onsubmit'=>"return confirm('Are You Sure?')"))}}
									<a href="{{route('gallery-categories.edit', array($category->id))}}" class="btn btn-xs btn-success tooltip-top" title="Edit Damage"><i class="glyphicon glyphicon-edit"></i></a>
									<button type="submit" onclick="return confirm 'Are you sure'" name="id" class="btn btn-xs btn-danger tooltip-top" title="Remove Post" value="{{$category->id}}"><i class="glyphicon glyphicon-remove"></i></button>
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