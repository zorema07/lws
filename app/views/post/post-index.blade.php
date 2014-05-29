@extends('layout.admin')

@section('content')
<div class="row align-center">
	<div class="col-md-12">
		<div class="panel panel-default" >
			<div class="panel-heading" ><h4>Post <span class="pull-right">
						<a href="{{route('post.create')}}" class="btn btn-success pull-right glyphicon glyphicon-pencil ">Create</a></span></h4>
			</div>
				<div class="panel-body">
					@if(Session::has('delete'))
					<div class="alert alert-danger">
						{{Session::get('delete')}}	
					</div>
					@endif
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th class="col-md-1">#</th>
								<th class="col-md-3">Post Category</th>
								<th class="col-md-3">Title</th>
								<th class="col-md-3">Created at</th>
								<th class="col-md-2"></th>
							</tr>
						</thead>
						<tbody>
							<?php $i=0; ?>
							@foreach($posts as $post)
							<tr >
								<td>{{++$i}}</td>
								<td>{{$post->category->post_categories_name}}</td>
								<td>{{$post->post_title}}</td>
								<td>{{date('dS F, Y h:iA', strtotime($post->created_at))}}</td>
								<td>
									{{Form::open(array('url'=>route('post.destroy', array($post->id)),'method'=>'delete'))}}
										<a href="{{route('post.edit', array($post->id))}}" class="btn btn-xs btn-success tooltip-top" title="Edit Damage"><i class="glyphicon glyphicon-edit"></i></a>
										<button type="submit" onclick="return confirm 'Are you sure'" name="id" class="btn btn-xs btn-danger tooltip-top" title="Remove Post" value="{{$post->id}}"><i class="glyphicon glyphicon-remove"></i></button>
									{{Form::close()}}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
		</div>
	</div>
</div>
@stop