@extends('layout.admin')

@section('content')
<div class="row align-scenter">
		<div class="col-md-12">
			<div class="panel panel-default" >
				<div class="panel-heading" ><h5 class="text-center">Post</h5></div>
					<div class="panel-body">
						{{Form::open(array('url'=>route('post.store'),'method'=>'post','class'=>'form-horizontal'))}}

						<div class="col-md-10">
							<div class="form-group">
							{{Form::label('category', 'Select category', array('class'=>'control-label'))}}
							{{Form::select('category', array('default'=>'Select Category')+$post, '', array('class' => 'input-sm form-control','style' => 'width:200px'))}}
							@if($errors->has('category'))
							<p class="help-block"><span class="text-danger">{{$errors->first('category')}}</span></p>
							@endif
							</div>	
						

						<div class="form-group">
							{{Form::label('title', 'Post Title', array('class'=>'control-label'))}}
							{{Form::text('title', '',  array('class' => 'input-sm form-control', 'placeholder'=>'Please enter a title for your post'))}}
							@if($errors->has('title'))
							<p class="help-block"><span class="text-danger">{{$errors->first('title')}}</span></p>
							@endif
						</div>

						<div class="form-group">
							{{Form::label('body', 'Post Body', array('class'=>'control-label'))}}
							{{Form::textarea('body', '',  array('class' => 'input-sm form-control','id' =>'editor'))}}
							@if($errors->has('body'))
							<p class="help-block"><span class="text-danger">{{$errors->first('body')}}</span></p>
							@endif
						</div>
						<div class="form-group text-right">
							<button type="submit" class="btn btn-sm btn-primary">Submit</button>
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
