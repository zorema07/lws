@extends('layout.admin')

@section('content')
  <!-- center left--> 
  <div class="col-md-6">
    
    
    <div class="btn-group btn-group-justified">
      <a href="{{URL::route('post.create')}}" class="btn btn-primary col-sm-3">
        <i class="glyphicon glyphicon-file"></i><br>
        Add Post
      </a>
      <a href="{{URL::route('gallery-categories.create')}}" class="btn btn-primary col-sm-3">
        <i class="glyphicon glyphicon-plus"></i><br>
        Add Album
      </a>
      <a href="{{URL::route('gallery.create')}}" class="btn btn-primary col-sm-3">
        <i class="glyphicon glyphicon-th-large"></i><br>
        Add Gallery
      </a>
      <a href="{{URL::route('user.index')}}" class="btn btn-primary col-sm-3">
        <i class="glyphicon glyphicon-user"></i><br>
        Account
      </a>
    </div>
    
    <hr>
    
    <div class="panel panel-default">
        <div class="panel-heading"><h4>Reports</h4></div>
        <div class="panel-body">
          
          <small>Success</small>
          <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%">
              <span class="sr-only">72% Complete</span>
            </div>
          </div>
          <small>Info</small>
          <div class="progress">
            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
              <span class="sr-only">20% Complete</span>
            </div>
          </div>
          <small>Warning</small>
          <div class="progress">
            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
              <span class="sr-only">60% Complete (warning)</span>
            </div>
          </div>
          <small>Danger</small>
          <div class="progress">
            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
              <span class="sr-only">80% Complete</span>
            </div>
          </div>

        </div><!--/panel-body-->
    </div><!--/panel-->

  </div><!--/col-->
  <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading"><h4>Notices</h4></div>
        <div class="panel-body">
          
        <div class="alert alert-info">
          <button type="button" class="close" data-dismiss="alert">×</button>
          This is a dismissable alert.. just sayin'.
        </div>

        This is a dashboard-style layout that uses Bootstrap 3. You can use this template as a starting point to create something more unique.
        <br><br>
        Visit the Bootstrap Playground at <a href="http://bootply.com">Bootply</a> to tweak this layout or discover more useful code snippets.
        </div>
      </div>    
      </div><!--/panel-->
    
  </div><!--/col-span-6-->
  
@stop