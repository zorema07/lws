@extends('layout.admin')

@section('content')
<div class="row align-center">
	<div class="col-md-12">
		<div class="panel panel-default" >
			<div class="panel-heading" ><h4>Users <span class="pull-right">
						<a href="{{route('user.create')}}" class="btn btn-success pull-right glyphicon glyphicon-user "> Add</a></span></h4>
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
								<th class="col-md-3">Full Name</th>
								<th class="col-md-2">Username</th>
								<th class="col-md-2">Email</th>
								<th calss="col-md-2">Created at</th>
								<th class="col-md-2"></th>
							</tr>
						</thead>
						<tbody>
							<?php $i=0; ?>
							@foreach($users as $user)
							<tr >
							<td>{{++$i}}</td>
							<td>{{$user->fullname}}</td>
							<td>{{$user->username}}</td>
							<td>{{$user->email}}</td>
							<td>{{date('dS F, Y h:iA', strtotime($user->created_at))}}</td>
							<td>
								{{Form::open(array('url'=>route('user.destroy', array($user->id)),'method'=>'delete'))}}
									<a href="{{route('user.edit', array($user->id))}}" class="btn btn-xs btn-success tooltip-top" title="Edit User"><i class="glyphicon glyphicon-edit"></i></a>
									<button type="submit" onclick="return confirm 'Are you sure'" name="id" class="btn btn-xs btn-danger tooltip-top" title="Remove user" value="{{$user->id}}"><i class="glyphicon glyphicon-remove"></i></button>
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