@extends('layout.admin')

@section('content')
<div class="row align-center">
	<div class="col-md-8">
		<div class="panel panel-default" >
			<div class="panel-heading" ><h4><span class="pull right">Edit User</h4></span></div>
				<div class="panel-body">
			       {{ Form::model($user, array('route' => array('user.update', $user->id),'class' => 'form-horizontal','files' => 'true' ,'method' => 'put')) }}
					
					@if(Session::has('message'))
						<div class="alert alert-success">
							{{Session::get('message')}}	
						</div>
					@endif

					<div class="form-group">
						{{Form::label('fullname', 'Full Name', array('class'=>'control-label'))}}
						{{Form::text('fullname', Input::old('fullname', $user->fullname),  array('class' => 'input-sm form-control', 'placeholder'=>'Please enter your Full Name'))}}
						@if($errors->has('fullname'))
						<p class="help-block"><span class="text-danger">{{$errors->first('fullname')}}</span></p>
						@endif
					</div>

					<div class="form-group">
						{{Form::label('username', 'Username', array('class'=>'control-label'))}}
						{{Form::text('username', Input::old('username', $user->username),  array('class' => 'input-sm form-control', 'placeholder'=>'Please enter your desire username'))}}
						@if($errors->has('username'))
						<p class="help-block"><span class="text-danger">{{$errors->first('username')}}</span></p>
						@endif
					</div>
					<div class="form-group">
						{{Form::label('email', 'Email Address', array('class'=>'control-label'))}}
						{{Form::text('email', Input::old('email', $user->email),  array('class' => 'input-sm form-control', 'placeholder'=>'Please enter your email address'))}}
						@if($errors->has('email'))
						<p class="help-block"><span class="text-danger">{{$errors->first('email')}}</span></p>
						@endif
					</div>

					<div class="form-group">
						{{Form::label('password', 'Password', array('class'=>'control-label'))}}
						{{Form::password('password', array('class'=>'input-sm form-control'))}}
						<p class="help-block">Leave blank to retain current password.</p>
						@if($errors->has('password'))
						<p class="help-block"><span class="text-danger">{{$errors->first('password')}}</span></p>
						@endif
					</div>

					<div class="form-group text-right">
						<button type="submit" class="btn btn-sm btn-primary">Update</button>
					</div>
				</div>
		</div>
	</div>
</div>
@stop
