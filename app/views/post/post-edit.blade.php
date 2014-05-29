@extends('layout.admin')

@section('content')
<div class="row align-center">
	<div class="col-md-12">
		<div class="panel panel-default" >
			<div class="panel-heading" ><h4><span class="pull right">Post Edit</h4></span></div>
				<div class="panel-body">
					{{Form::open(array('url'=>route('post.update',array($current_post->id)),'method'=>'put','class'=>'form-horizontal'))}}
					@if(Session::has('message'))
						<div class="alert alert-success">
							{{Session::get('message')}}	
						</div>
					@endif
					<div class="col-md-10">
						<div class="form-group">
						{{Form::label('category', 'Select category', array('class'=>'control-label'))}}
						{{Form::select('category', $post,$current_post->post_categories_id, array('class' => 'input-sm form-control','style' => 'width:200px'))}}
						@if($errors->has('category'))
						<p class="help-block"><span class="text-danger">{{$errors->first('category')}}</span></p>
						@endif
						</div>	
					

					<div class="form-group">
						{{Form::label('title', 'Post Title', array('class'=>'control-label'))}}
						{{Form::text('title', Input::old('title', $current_post->post_title),  array('class' => 'input-sm form-control', 'placeholder'=>'Please enter a title for your post'))}}
						@if($errors->has('title'))
						<p class="help-block"><span class="text-danger">{{$errors->first('title')}}</span></p>
						@endif
					</div>

					<div class="form-group">
						{{Form::label('body', 'Post Body', array('class'=>'control-label'))}}
						{{Form::textarea('body', Input::old('body', $current_post->post_body),  array('class' => 'input-sm form-control','id' =>'editor'))}}
						@if($errors->has('body'))
						<p class="help-block"><span class="text-danger">{{$errors->first('body')}}</span></p>
						@endif
					</div>
					<div class="form-group text-right">
						<button type="submit" class="btn btn-sm btn-primary">Update</button>
					</div>
				</div>
		</div>
	</div>
</div>
<script >
$(function(){
	$('#editor').redactor({
		focus: true,
		minHeight: 200,
	});
});
</script>
@stop
